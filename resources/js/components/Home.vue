<template>
  <div>
    <div class="content-link" v-show="!isSuccess">
      <a-row type="flex" justify="center" align="middle">
        <a-col :span="12" class="title">
          <h1>Encurtar link</h1>
        </a-col> </a-row
      ><a-form-model ref="ruleForm" :model="form" :rules="rules">
        <a-row type="flex" justify="center" align="middle">
          <a-col :span="6">
            <a-form-model-item prop="url">
              <a-input-search
                v-model="form.url"
                placeholder="https://..."
                size="large"
                @search="onSubmit('ruleForm')"
                :loading="loading"
              >
                <a-button type="primary" slot="enterButton">
                  Encurtar
                </a-button>
              </a-input-search>
            </a-form-model-item>
          </a-col>
        </a-row>
        <a-row
          type="flex"
          justify="center"
          align="middle"
          style="margin-top: 0.1vh"
        >
          <a-col :span="6" class="validate">
            <a-form-model-item prop="validateAt">
              <a-tooltip placement="right">
                <template slot="title"> Validade do link em dias </template>
                <a-input-number :min="1" :max="7" v-model="form.validateAt" />
              </a-tooltip>
            </a-form-model-item>
          </a-col>
        </a-row>
      </a-form-model>
    </div>
    <div class="content-link" v-show="isSuccess">
      <a-row type="flex" justify="center" align="middle">
        <a-col :span="12" class="title">
          <h1>Tudo certo! <a-icon type="smile" theme="twoTone"></a-icon></h1>
        </a-col>
      </a-row>
      <a-row type="flex" justify="center" align="middle">
        <a-col :span="5" class="title">
          <a-input-search
            v-model="this.result"
            size="large"
            @search="onCopy()"
            style="
              color: #a4f3df !important;
              background-color: #282d44 !important;
              cursor: not-allowed;
              opacity: 1;
            "
          >
            <a-button class="ant-btn-success" slot="enterButton">
              Copiar
            </a-button>
          </a-input-search>
        </a-col>
      </a-row>
      <a-row
        type="flex"
        justify="center"
        align="middle"
        style="margin-top: 3vh"
      >
        <a-col :span="5" class="title">
          <a-button type="dashed" @click="backHome()"> Voltar </a-button>
        </a-col>
      </a-row>
    </div>
  </div>
</template>

<script>
import isURL from "validator/lib/isURL";
import { message } from "ant-design-vue";

export default {
  data() {
    let checkURL = (rule, value, callback) => {
      if (value !== "" && !isURL(value)) {
        callback(new Error("Informe uma URL valida!"));
      } else {
        callback();
      }
    };
    return {
      formLayout: "horizontal",
      form: this.$form.createForm(this, { name: "coordinated" }),
      isSuccess: false,
      form: {
        url: "",
        validateAt: 2,
      },
      rules: {
        url: [{ validator: checkURL, trigger: "blur" }],
      },
      loading: false,
      result: "http://127.0.0.1:8000/EMmBVc",
      resultCopy: "",
      resultCopyVisible: false,
    };
  },
  methods: {
    getCurrentStyle(current, today) {
      const style = {};
      if (current.date() === 1) {
        style.border = "1px solid #1890ff";
        style.borderRadius = "50%";
      }
      return style;
    },
    backHome() {
      this.isSuccess = !this.isSuccess;
      this.$refs.ruleForm.resetFields();
    },
    onCopy() {
      this.$copyText(this.result).then(
        function (e) {
          message.success("Copiado link com sucesso!");
        },
        function (e) {
          message.error("Erro ao copiar link!");
        }
      );
    },
    onSubmit(formName) {
      this.$refs[formName].validate((valid) => {
        if (valid && this.form.url !== "") {
          this.loading = true;
          axios
            .post("generate", {
              link: this.form.url,
              validateAt: this.form.validateAt,
            })
            .then((res) => {
              this.form.url = "";
              let { code } = res.data;
              this.result = window.location.origin + "/" + code;
              this.loading = false;
              this.isSuccess = true;
            })
            .catch((err) => {
              this.loading = false;
              this.isSuccess = false;
              alert("Oops! Isto não era para ocorrer!");
              console.log(err);
            });
        } else {
          return false;
        }
      });
      //   if (!isURL(this.url)) {
      //     alert("Não é uma URL valida");
      //   } else {

      //   }
    },
  },
};
</script>

<template>
  <div>
    <div class="content-link" v-show="!isSuccess">
      <a-row type="flex" justify="center" align="middle">
        <a-col :span="12" class="title">
          <h1>Encurtador de links</h1>
        </a-col>
      </a-row>
      <a-row type="flex" justify="center" align="middle">
        <a-col :span="6">
          <a-form-model ref="ruleForm" :model="form" :rules="rules">
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
          </a-form-model>
        </a-col>
      </a-row>
    </div>
    <div class="content-link" v-show="isSuccess">
      <a-row type="flex" justify="center" align="middle">
        <a-col :span="12" class="title">
          <h1>
            Seu link foi encurtado
            <a-icon type="smile" theme="twoTone"></a-icon>
          </h1>
        </a-col>
      </a-row>
      <a-row type="flex" justify="center" align="middle">
        <a-col :span="5" class="title">
          <a-input-search
            v-model="this.result"
            size="large"
            @search="onCopy()"
            :readonly="true"
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
        style="margin-top: 5vh"
      >
        <a-col :span="7" class="title">
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
      if (value === "") {
        callback(new Error("Obrigatório preenchimento da URL!"));
      } else if (!isURL(value)) {
        callback(new Error("Informa uma URL valida!"));
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
        if (valid) {
          this.loading = true;
          axios
            .post("generate", { link: this.form.url })
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

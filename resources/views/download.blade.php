<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EvoluTI - Baixar arquivos</title>
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans:400,600" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
	<script src="https://unpkg.com/animejs@3.0.1/lib/anime.min.js"></script>
    {{-- <script src="https://unpkg.com/scrollreveal@4.0.0/scrollreveal.min.js"></script> --}}
</head>
<body class="is-boxed has-animations">
    <div class="body-wrap">
        <main>
            <section class="hero">
                <div class="container">
                    <div class="hero-inner">
						<div class="hero-copy">
	                        <h1 class="hero-title mt-0">Aqui está seu arquivo!</h1>
	                        <p class="hero-paragraph">Escolha se deseja baixar o arquivo diretamente ou se precisa visualizar ele no navegador antes.</p>
                            <p class="hero-paragraph">{{ $file['name'] }}</p>
	                        <div class="hero-cta"><a class="button button-primary" href="/force-download/{{ $file['name'] }}">Baixar</a><a class="button" href="{{ $file['url'] }}">Visualizar</a></div>
						</div>
						<div class="hero-figure anime-element">
							<svg class="placeholder" width="528" height="396" viewBox="0 0 528 396">
								<rect width="528" height="396" style="fill:transparent;" />
							</svg>
							<div class="hero-figure-box hero-figure-box-01" data-rotation="45deg"></div>
							<div class="hero-figure-box hero-figure-box-02" data-rotation="-45deg"></div>
							<div class="hero-figure-box hero-figure-box-03" data-rotation="0deg"></div>
							<div class="hero-figure-box hero-figure-box-04" data-rotation="-135deg"></div>
							<div class="hero-figure-box hero-figure-box-05"></div>
							<div class="hero-figure-box hero-figure-box-06"></div>
							<div class="hero-figure-box hero-figure-box-07"></div>
							<div class="hero-figure-box hero-figure-box-08" data-rotation="-22deg"></div>
							<div class="hero-figure-box hero-figure-box-09" data-rotation="-52deg"></div>
							<div class="hero-figure-box hero-figure-box-10" data-rotation="-50deg"></div>
						</div>
                    </div>
                </div>
            </section>
            <section class="pricing section">
                <div class="container-sm" style="height: 20vh">
                </div>
            </section>
            <section class="pricing section">
                <div class="container-sm">
                    <div class="pricing-inner section-inner">
                        <div class="pricing-header text-center">
                            <h2 class="section-title mt-0">EvoluTI - Sistema de Gestão</h2>
                            <p class="section-paragraph mb-0">Venha junto conosco e participe da nossa evolução!</p>
                        </div>
						<div class="pricing-tables-wrap">
                            <div class="pricing-table">
                                <div class="pricing-table-inner is-revealing">
                                    <div class="pricing-table-main">
                                        {{-- <div class="pricing-table-header pb-24">
                                            <div class="pricing-table-price"><span class="pricing-table-price-currency h2">R$</span>
                                                <span class="pricing-table-price-amount h1">59,99</span><span class="text-xs">/mês </span></div>
                                        </div> --}}
										<div class="pricing-table-features-title text-xs pt-24 pb-24">Funcionalidades do sistema</div>
                                        <ul class="pricing-table-features list-reset text-xs">
                                            <li>
                                                <span>Nota Fiscal Eletrônica</span>
                                            </li>
                                            <li>
                                                <span>Nota Fiscal Consumidor Eletrônica</span>
                                            </li>
                                            <li>
                                                <span>Fluxo de Caixa</span>
                                            </li>
											<li>
												<span>Controle de Estoque</span>
											</li>
                                            <li>
												<span>Contas a Pagar</span>
											</li>
                                            <li>
												<span>Contas a Receber</span>
											</li>
                                            <li>
												<span>Ordem de Serviço</span>
											</li>
                                            <li>
												<span>Pedido de Venda</span>
											</li>
                                            <li>
												<span>Nota de Compra</span>
											</li>
                                            <li>
												<span>Relatórios</span>
											</li>
                                        </ul>
                                    </div>
                                    <div class="pricing-table-cta mb-8">
                                        <a class="button button-primary button-shadow button-block" target="_blank" href="http://api.whatsapp.com/send?text=Ola,%0Aestou%20interessado%20no%20sistema%20EvoluTI&phone=555591194370">Estou interessado</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <footer class="site-footer">
            <div class="container">
                <div class="site-footer-inner">
                    <div class="brand footer-brand">
						<a href="https://evoluti.info">
							EvoluTI
						</a>
                    </div>
                    <div class="footer-links footer-copyright">&copy; 2018 EvoluTI, all rights reserved</div>
                </div>
            </div>
        </footer>
    </div>
    <script src="https://unpkg.com/scrollreveal@3.3.2/dist/scrollreveal.min.js"></script>
    <script src="{{ asset('js/main.min.js') }}"></script>
</body>
</html>

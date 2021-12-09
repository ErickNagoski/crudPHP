<?php
/*include_once("../util/verifica_session.php");
include_once("../../model/ControleNiveis.class");
include_once("../../model/Usuario.class");
include_once("../../model/PessoaEmpresa.class");

$retorno = ControleNiveis::verifica("ordens", $user_object->get("nivel"));

if ($retorno === false)
	header("Location: ../../logout.php");

if ($user_object->get("nivel") == 1) {
	$vet = transformaArray(Usuario::getComCondicao(" WHERE tipo = 3", true));
	// usuarios
	$options_usuarios = "<option value='" . $user_object->get("id") . "'>Minhas ordens</option>";
	foreach ($vet as $key => $value) {
		if ($value['id'] != $user_object->get("id")) {
			$options_usuarios .= "<option value = '" . $value['id'] . "'>" . $value['nome'] . "</option>";
		}
	}
}*/
?>

<!DOCTYPE html>
<html class="sidebar_minimize">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Sistema Suporte </title>
	<?php //include("../util/start.php"); ?>
	<link rel="stylesheet" type="text/css" href="../css/sumo-select.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/filtros.css">
</head>

<body>
	<div class="wrapper">
		<?php //include_once("../util/menu.php"); ?>
		<div class="main-panel">
			<div class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<section class="section-data padding-10px-tb">
										<div class="row">
											<div class="col">
												<span class="badge badge-count margin-5px-top"> Consulta ordens </span>
											</div>
											<div class="col-md-3 col ml-auto nav-search text-right">
												<div class="input-group bg-white">
													<input type="text" id="campoFiltro" class="form-control form-control-sm" placeholder="Pesquisar">
													<div class="input-group-append">
														<button type="button" class="btn btn-search">
															<i class="la la-search"></i>
														</button>
													</div>
												</div>
											</div>
										</div>
									</section>
								</div>
								<div class="card-body margin-10px-top">
									<div class="table-responsive" style="min-height: 316px">
										<table class="table table-hover dataTables-example table-ordens orders-table table-striped " cellpadding="0">
											<div class="pull-right ibox-tools margin-15px-right new-os-desktop">
												<a href="../ordem_servico/cadastrar_ordem.php"><button class="btn btn-primary btn-sm new-os"> Nova OS </button></a>
											</div>
											<div class="pull-right margin-20px-bottom">
												<select multiple="multiple" name="filtros_status" placeholder="Status" class="min-width-200px form-control testSelAll2">
													<option value="Registrado" class="padrao">Registrado</option>
													<option value="Em análise" class="padrao">Em análise</option>
													<option value="Aguardando cliente" class="padrao">Aguardando cliente</option>
													<option value="Aguardando peça" class="padrao">Aguardando peça</option>
													<option value="Em atendimento" class="padrao">Em atendimento</option>
													<option value="Aguardando retirada" class="padrao">Aguardando retirada</option>
													<option value="Finalizado">Finalizado</option>
												</select>
											</div>
											<div class="pull-right margin-20px-bottom">
												<select multiple="multiple" name="filtros_usuarios" placeholder="Responsáveis" class="form-control testSelAll2">
													<option value="Jonatan">Jonatan</option>
													<option value="Cristian">Cristian</option>
													<option value="Erick">Erick</option>
												</select>
											</div>
											<div class="col-auto pull-right">
												<div class="form-check form-check-inline padding-5px-top filtros-check">
													<div class='custom-control custom-checkbox margin-5px-right'>
														<input type='checkbox' class='filtro-check custom-control-input' id='filtro1' value="reprovado">
														<label class='custom-control-label' for='filtro1'>Reprovado</label>
													</div>
													<div class='custom-control custom-checkbox margin-5px-right'>
														<input type='checkbox' class='filtro-check custom-control-input' id='filtro2' value="pendente">
														<label class='custom-control-label' for='filtro2'>Pendente</label>
													</div>
													<div class='custom-control custom-checkbox margin-20px-right'>
														<input type='checkbox' class='filtro-check custom-control-input' id='filtro3' value="aprovado">
														<label class='custom-control-label' for='filtro3'>Aprovado</label>
													</div>
												</div>
											</div>

											<div class="situacao-mobile pull-left">
												<div class="option-situacao-mobile border-5px-tl border-5px-bl" name="situacao-mobile-reprovado">
													<i class='la la-times'></i>
												</div>
												<div class="option-situacao-mobile" name="situacao-mobile-pendente">
													<i class='la la-circle'></i>
												</div>
												<div class="option-situacao-mobile border-5px-tr border-5px-br" name="situacao-mobile-aprovado">
													<i class='la la-check'></i>
												</div>
											</div>

											<div class="pull-right ibox-tools margin-35px-left new-os-mobile">
												<a href="../ordem_servico/cadastrar_ordem.php"><button class="btn btn-primary btn-sm new-os"> Nova OS </button></a>
											</div>
											<div class="pull-right" name="divOrdens">
												<div class="padding-5px-top">
													<p href="#" class="text-danger font-weight-600 show-late" id="ordensUrgentes">Urgentes (0)</p>
												</div>
											</div>

											<div class="pull-left margin-10px-bottom">
												<?php
												if ($_SESSION['nivel'] == 1) {
													?>
													<button class="btn btn-gray btn-border btn-xs btn-delete" type="button" data-toggle='tooltip' data-placement='bottom' data-original-title='Excluir' id="deleteAll" style="padding: 6px; padding-left: 8px; padding-right: 8px;">
														<i class="la la-trash font-size-17"></i>
													</button>
												<?php } ?>
											</div>
											<thead>
												<tr class="text-center table-headers">
													<th style="width: 16px!important;">
														<div class='custom-control custom-checkbox no-margin-right' style="padding-left: 0em!important; width: 17px!important;">
															<input id="checkbox0" type='checkbox' class="selectavelAll custom-control-input">
															<label class='custom-control-label' for='checkbox0'></label>
														</div>
													</th>
													<th style="width: 3%">N° </th>
													<th style="width: 23%">TÍTULO</th>
													<th style="width: 7%">BANCADA</th>
													<th style="width: 10%!important"> CLIENTE </th>
													<th style="width: 8%"> ENTRADA </th>
													<th style="width: 8%"> ENTREGA </th>
													<th style="width: 12%"> RESPONSÁVEL </th>
													<th style="width: 8%"> SITUAÇÃO </th>
													<th class="width-10 text-center" style="width: 120px!important"> STATUS </th>
												</tr>
											</thead>
											<tbody>
												<?php
												include_once("../../controller/ordem_servico/getOrdensServico.php");
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

            </div>
            












































<!--
			<?php include("../util/footer.php") ?>
		</div>
		<ul class="menu menu-table menu-table-lg off">
			<li class="menu-item" id="novo-link-table"><a class="la la-files-o"></a>Abrir em uma nova guia</li>
			<li class="menu-item" id="exportar-pdf" name="#"><a class="la la-download"></a>Exportar PDF</li>
			<div class="dropdown-divider"></div>
			<li class="menu-item-nohover" id="equipamento" name="#"><a class="la la-desktop"></a>Equipamento</li>
			<li class="menu-item-nohover" id="empresa" name="#"><a class="la la-building"></a>Empresa</li>
			<li class="menu-item-nohover" id="prioridade" name="#"><a class="la la-exclamation-circle"></a>Prioridade</li>
            
            
             <li class="dropright" id="dropright-ordens">
				<div class="menu-item dropdown-toggle" data-toggle="dropdown" id="prioridade" name="#">
					<a class="la la-exclamation-circle"></a>Prioridade
				</div>
				<div class="dropdown-menu" id="dropdown-menu-ordens">
					<a class='dropdown-item'>Baixa</a>
					<a class='dropdown-item'>Normal</a>
					<a class='dropdown-item'>Alta</a>
					<a class='dropdown-item'>Urgente</a>
				</div>
			</li> -->
		</ul>
		<!-- barra da direita -->
		<?php include_once("../util/aba_direita.php"); ?>
    </div>
                                        

	<!-- confirmação da exclusão -->
	<?php include_once("../modais/confirmar_exclusao.php"); ?>

	<?php include("../util/end.php"); ?>

	<script src="../../assets/js/plugin/datatables/datatables.min.js"></script>
	<script src="../../assets/js/plugin/sumo_select/jquery-sumo-select.min.js"></script>
	<script src="../../assets/js/controller/ordemServicoController.js"></script>

	<script src="../../assets/js/right-click-table.js"></script>
	<script src="../../assets/js/col_resize_datatable.js"></script>

	<script>
		var table;
		var filtros_status = ['Registrado', 'Em análise', 'Aguardando cliente', 'Aguardando peça', 'Em atendimento'];
		var filtros_tipo = [];

		var filtros_usuarios = [];
		var numeroUrgentes = 0;

		var situacoes = $(".table-ordens .situacoes");
		var situacao = "";

		for (var c = 0; c < situacoes.length; c++) {
			situacao = $(situacoes[c]).data("value");
			id = $(situacoes[c]).parents("tr").attr("id");
			document.getElementById(situacao + "" + id).checked = true;
		}

		for (var i = 0; i < ordens.length; i++) {
			if (ordens[i].nivel_prioridade == "Urgente" && ordens[i].status != "Finalizado" && ordens[i].status != "Aguardando retirada") {
				numeroUrgentes++;
			}
		}

		carregaInformacoesSelect();

		var status_ordens = $(".status-ordem");

		for (var z = 0; z < status_ordens.length; z++) {
			var valor = $(status_ordens[z]).find("select").val();

			var valores = defineStatus(valor);

			var element = $(status_ordens[z]).find("span.badge");
			//$(element).removeClass();
			$(element).addClass("alt-font badge " + valores[0]);
		}

		if (parseInt(Usuario.nivel) == 1) {

			$(".table-ordens .situacoes input[type=radio]").change(function() {
				if ($(this).val() == "on") {
					OrdemServico.alterarSituacao($(this).data("id-ordem"), $(this).data("type"));
					getOrdem($(this).data("id-ordem")).situacao = $(this).data("type");
				}
			});

			var previous;

			$(".table-ordens .select-status").on("focus", function() {
				previous = $(this).val();
			}).change(function() {
				OrdemServico.alterarStatus($(this).data("id-ordem"), $(this).val());
				getOrdem($(this).data("id-ordem")).status = $(this).val();

				if (getOrdem($(this).data("id-ordem")).nivel_prioridade == "Urgente" && ($(this).val() == "Finalizado" || $(this).val() == "Aguardando retirada")) {
					$(this).parents("tr").removeClass("bg-lightred");
					numeroUrgentes--;
				} else if (getOrdem($(this).data("id-ordem")).nivel_prioridade == "Urgente") {
					if ($(this).val() != "Finalizado" && $(this).val() != "Aguardando retirada" && (previous == "Finalizado" || previous == "Aguardando retirada")) {
						$(this).parents("tr").addClass("bg-lightred");
						numeroUrgentes++;
					}
				}

				if (numeroUrgentes != 0) {
					$("[name=divOrdens]").show();
					$("#ordensUrgentes").text("Urgentes(" + numeroUrgentes + ")");
				} else {
					$("[name=divOrdens]").hide();
				}
			});

		} else {
			$(".table-ordens .situacoes input[type=radio]").prop("disabled", true);
			$(".table-ordens .select-status").prop("disabled", true);
		}

		var table;

		

		function carregaFuncoesStatus() {
			if (parseInt(Usuario.nivel) < 3) {
				$(".status-ordem").on("click", function() {
					var select = $(this).find('select');
					$(this).find('span').hide();
					select.fadeIn("slow");
					select.focus();
				});

				$('.status-ordem select').on('change blur', function() {
					var valor = $(this).val();
					var valores = defineStatus(valor);
					$(this).hide();
					$(this).prev().removeClass();
					$(this).prev().addClass("status-width badge " + valores[0]);
					$(this).prev().html(valores[1] + '<i class="la la-angle-down margin-5px-left"></i>');
					$(this).prev().fadeIn(400);
					var id = $(this).parents('tr').data("id");

					$.post("../../controller/ordem_servico/alteraOrdem.php", {
						id: id,
						status: valor
					}, function(retorno) {
						if (retorno.includes("error"))
							alert("Erro ao mudar status.")
					});
				});
			}
		}

		function filtrarTable(texto, condicao) {

			var filtro_selected = filtros_status;

			if (texto == "Reprovado" || texto == "Aprovado" || texto == "Pendente") {
				filtro_selected = filtros_tipo;
			}
			if (condicao == true) {
				filtro_selected.push(texto.toLowerCase());
			} else {
				filtro_selected.splice(filtro_selected.indexOf(texto.toLowerCase()), 1);
			}

			if (filtros_status.length > 0 || filtros_tipo.length > 0) {
				filtrar(false, "filtro");
			} else {
				filtrar(true, "");
			}
		}


		function tiraEspacos(str) {
			if (str != null) {
				while (str.includes(" ")) {
					str = str.replace(" ", "");
				}
				return str;
			} else {
				return null;
			}
		}

		function getOrdem(id) {
			for (var i in ordens) {
				if (ordens[i].id == id) {
					return ordens[i];
				}
			}
			return null;
		}

		
		$(document).ready(function() {
			var senha = '<?php echo $senha ?>';
			var ordensSelecionadas = 0;

			mudouTecnico();

			excluir('.table-ordens');
			linhaClicavel();

			ajustaDataEntrega();

			$("#deleteAll").on("click", function() {
				$(this).blur();
			});

			// $("#dropright-ordens").hover(function() {
			// 	$("#dropdown-menu-ordens").show();
			// });
			// $("#dropright-ordens").mouseout(function() {
			// 	$("#dropdown-menu-ordens").hide();
			// });

			$(".filtro-check").change(function() {
				var filter = $(".filtro-check:checked");
				filtros_tipo = [];
				for (var i = 0; i < filter.length; i++) {
					filtros_tipo.push($(filter[i]).val());
				}

				filtrarTable($(this).val(), $(this).prop("checked"));
				$(".table-ordens").DataTable().draw();
			});

			$(".btn-excluir").click(function() {
				if ($("#modal-confirmacao input[name=senha]").val() == senha) {
					removerTodos();
					$("#modal-confirmacao input[name=senha]").val("");
				} else {
					notificacao({
						tipo: 0,
						mensagem: "Senha incorreta"
					});
				}
			});

			$(".status-item").click(function() {
				var elemento = $(this);
				if (elemento.text() != "") {
					alteraStatus(elemento, elemento.hasClass("active"));
				} else {
					alert("erro");
				}
			});

			$(".selectavelAll").checked = false;
			table = $('.dataTables-example').DataTable({
				"info": true,
				"deferRender": true,
				"autoWidth": true,
				"lengthChange": true,
				"processing": true,
				"stateSave": false,
				"searching": true,
				"pageLength": 50,
				colReorder: true,
				"pagingType": "simple_numbers",
				dom: '<"html5buttons pull-left"B>flTgt<"padding-10px-tb"<"pull-left"i>p>',
				order: [
					[1, 'desc']
				],
				"columns": [{
					"orderable": false
				}, null, null, {
					"orderDataType": "dom-text",
					type: 'string'
				}, null, null, null, {
					type: 'string'
				}, {
					type: 'string'
				}, null],
				buttons: [{
					extend: 'pdf',
					text: 'Save current page',
					exportOptions: {
						modifier: {
							page: 'current'
						}
					}
				}]	
			});

			$("#DataTables_Table_0").dataTable.ext.search.push(
				function(settings, data, dataIndex) {
					var value = $("#campoFiltro").val();
					var includes = false;
					var valor;
					value = tiraEspacos(value);
					value = retira_acentos(value.toLowerCase());
					for (var c = 0; c < data.length; c++) {
						valor = tiraEspacos(data[c].toLowerCase());
						valor = retira_acentos(valor);
						if (valor.includes(value)) {
							includes = true;
							c = data.length;
						}
					}

					var ordem = getOrdem(data[1]);
					// alert(ordem.nivel_prioridade);

					var status = ordem.status.toLowerCase();
					var situacao = ordem.situacao.toLowerCase();

					if (Usuario.nivel == 1) {
						var ordem_obj = getOrdem(data[1]);
						var pessoas = ordem_obj.tecnico_responsavel;
					} else {
						var ordem_obj = getOrdem(data[0]);
						var pessoas = data[2];
					}

					if (pessoas == null) {
						pessoas = "";
					}

					var includes_filtro = verificaTrFiltro(ordem, pessoas);
					if (value != "") {
						// alert(ordem_obj.id + " - " +includes_filtro + " - " + includes);
					}

					if (includes_filtro == true) {
						if (includes == true || value == "") {
							return true;
						} else if (includes == false && value != "") {
							return false;
						} else {
							return false;
						}
					} else {
						return false;
					}
				}
			);

			verificaPrioridade();

			$('#campoFiltro').on('keyup', function() {
				filtrar(this.value);
			});
			$("#campoFiltro").val($("#DataTables_Table_0_filter > label > input").val());
			$("#DataTables_Table_0_filter").hide();
			$("td").css("vertical-align", "middle");
			$("#DataTables_Table_0").css("width", "100%");

			carregaFuncoesStatus();
			configuraFiltros();

			$("#ordensUrgentes").click(function() {
				$(this).toggleClass("underline");
				if ($(this).hasClass("underline")) {
					table.rows(".bg-lightred").every(function(index) {
						var node = this.node();
						$(this.id()).remove();
						$("table.table-ordens").prepend(node);
					});
				} else {
					table.order([1, 'desc']).draw();
				}
			});

			if (numeroUrgentes != 0) {
				$("#ordensUrgentes").text("Urgentes(" + numeroUrgentes + ")");
			} else {
				$("[name=divOrdens]").hide();
			}

			$(".edit-bancada").on("click", function() {
				this.select();
			});

			$('.edit-bancada').keypress(function(event) {
				var keycode = (event.keyCode ? event.keyCode : event.which);
				if (keycode == '13') {
					$(this).blur();
				}
			});

			$(".edit-bancada").blur(function() {
				salvarBancada($(this).closest("tr").attr("id"), $(this).val());
			});

			$("select[name=DataTables_Table_0_length]").css("border-color", "#ebedf2");

			if ($(document).width() < 576) {
				$(".btn-delete").hide();
				setInterval(function() {
					$("table tbody .custom-checkbox").parent().hide();
				}, 1);
				$(".selectavelAll").closest("th").hide();

				$(".filtros-check").hide();
				$(".new-os").addClass("margin-30px-bottom");

				$(".new-os-desktop").hide();
				$(".new-os-mobile").show();
				$("[name=filtros_usuarios]").parent().parent().removeClass("pull-right").addClass("pull-left");

				if ($(document).width() < 411 && $(document).width() > 375) {
					$(".div-table").css("transform", "translateX(20px)");
				}
			} else {
				$(".new-os-desktop").show();
				$(".new-os-mobile").hide();
				$(".situacao-mobile").hide();
			}

			$("[name=situacao-mobile-reprovado").on("click", function() {
				$(this).toggleClass("bg-lightgray-mobile");
				$("input[value=reprovado]").trigger("click");
			});
			$("[name=situacao-mobile-pendente").on("click", function() {
				$(this).toggleClass("bg-lightgray-mobile");
				$("input[value=pendente]").trigger("click");
			});
			$("[name=situacao-mobile-aprovado").on("click", function() {
				$(this).toggleClass("bg-lightgray-mobile");
				$("input[value=aprovado]").trigger("click");
			});
		});
	</script>
</body>

</html>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Abrir Ordem de Serviço</h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content ">
      <form method="POST" action="<?php BASE_URL ?>abrir">
        <div class="form-row">
          <div class="form-group col-md-7">
            <label for="inputEmail4">Resumo</label>
            <input type="text" class="form-control" name="resumo" placeholder="Resumo da OS" required>
          </div>
          <div class="form-group col-md-5">
            <label for="inputPassword4">Equipamento</label>
            <div class="input-group mb-3">
              <input type="text" class="form-control" required name="equipamento" id="inputEquipamento" readonly placeholder="Selecione o equipamento..." aria-label="Recipient's username" aria-describedby="basic-addon2">
              <input type="text" class="form-control" hidden id="idEquipamento" name="idEquipamento" placeholder="Resumo da OS" >               
              <div class="input-group-append">
                <button class="btn btn-outline-secondary" data-toggle="modal" data-target="#modalPesquisarEquipamento" type="button">Pesquisar</button>
              </div>
            </div>
          </div>
        </div>
        <div class="form-row">

          <div class="form-group col-md-3">
            <label for="inputAddress">Tipo da Manutenção</label>
            <select name="tipoManutencao" class="form-control" required>
            <option selected></option>
              <option>Preventiva</option>
              <option>Preditiva</option>
              <option>Corretiva</option>
            </select>
          </div>
          <div class="form-group col-md-3">
            <label for="inputAddress2">Estado do Equipamento</label>
            <select name="estadoEquipamento" class="form-control" required>
              <option selected></option>
              <option >Ativo</option>
              <option>Parado</option>
              <option>Descartado</option>
            </select>
          </div>
          <div class="form-group col-md-2">
            <label for="inputState">Prioridade</label>
            <select name="prioridade" id="selectPrioridade" class="form-control" required>
              <option selected></option>
              <option >Muito Baixa</option>
              <option >Baixa</option>
              <option >Média</option>
              <option >Alta</option>
              <option >Muito Alta</option>
            </select>
          </div>
          <div class="form-group col-md-2">
            <label for="inputState">Equipe Técnica</label>
            <select name="setor" class="form-control" required>
              <option selected></option>
              <?php foreach($viewData['setor'] as $setor) {?>
                <option value="<?php echo $setor['id'] ?>"><?php echo $setor['nome'] ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="form-group col-md-2">
            <label for="inputState">Prazo da O.S</label>
            <input type="text" hidden id="inputDataFinal" name="dataFinal" required>
            <h4 id="dataFinal" ></h4>
        </div>
        <div class="form-group col-md-2">
          <label for="inputZip">Descrição</label>
          <textarea name="descricao" cols="100" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
      </form>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



  <!-- Modal Detalhes OS -->
  <div class="modal fade bd-example-modal-lg" id="modalPesquisarEquipamento" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Pesquisar Equipamento</h3>
            <div class="card-tools">
              <div class="input-group input-group-sm" style="width: 200px;">
                <input type="text" name="table_search" class="form-control float-right" placeholder="Pesquisar" id="buscaEquipamento">
                <div class="input-group-append">
                  <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0" style="overflow: auto; ">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th style="width: 10px">Cód.</th>
                  <th>Nome</th>
                  <th>Modelo</th>
                  <th style="width: 40px">Equipamento</th>
                </tr>
              </thead>
              <tbody id="resultado">
                <?php foreach ($viewData['equipamentos'] as $data) { ?>
                  <tr>
                    <td> <?php echo $data['idEquipamento'] ?> </td>
                    <td data-nome="<?php echo $data['nome'] ?>" data-id="<?php echo $data['idEquipamento'] ?>" > <?php echo $data['nome'] ?> </td>
                    <td> <?php echo $data['modelo'] ?> </td>
                    <td>
                      <div class="btn-group" role="group" aria-label="Exemplo básico">
                        <button type="button"  class="btn btn-success btn-sm btnSelecionarEquipamento" >Selecionar</button>
                      </div>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
      </div>
    </div>
  </div>
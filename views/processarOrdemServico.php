  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ordem de Serviço - <?php echo $viewData[0] ?></h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content ">
      <form method="POST" action="<?php BASE_URL ?>salvarProcessamento">
        <div class="form-row">

          <div class="form-group col-md-7">
            <label for="inputEmail4">Resumo</label>
            <input type="text" class="form-control" value="<?php echo $viewData['resumo'] ?>" name="resumo" readonly placeholder="Resumo da OS">
            <input type="text" class="form-control" value="<?php echo $viewData[0] ?>" name="idOrdemServico" hidden>

          </div>
          <div class="form-group col-md-5">
            <label for="inputPassword4">Equipamento</label>
            <input type="text" class="form-control" value="<?php echo $viewData['nome'] ?>" name="equipamento" readonly placeholder="Resumo da OS">
          </div>
        </div>
        <div class="form-row">

          <div class="form-group col-md-3">
            <label for="inputAddress">Tipo da Manutenção</label>
            <input type="text" class="form-control" value="<?php echo $viewData['tipoManutencao'] ?>" name="tipoManutencao" id="tipoManutencao" readonly>
          </div>
          <div class="form-group col-md-3">
            <label for="inputAddress2">Estado do Equipamento</label>
            <input type="email" class="form-control" value="<?php echo $viewData['estado'] ?>" name="estado" id="estado" placeholder="Resumo da OS" readonly>
          </div>
          <div class="form-group col-md-2">
            <label for="inputState">Prioridade</label>
            <input type="email" class="form-control" value="<?php echo $viewData['prioridade'] ?>" name="prioridade" id="prioridade" placeholder="Resumo da OS" readonly>
          </div>
          <div class="form-group col-md-2">
            <label for="inputState">Setor</label>
            <input type="email" class="form-control" value="<?php echo $viewData['13'] ?>" name="Setor" id="Setor" readonly>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-3">
            <label for="inputEmail4">Analista</label>
            <input type="text" class="form-control" value="<?php echo $viewData['usuario'] ?>" name="resumo" readonly placeholder="Resumo da OS">
          </div>
          <div class="form-group col-md-3">
            <label for="inputAddress">Técnico</label>
            <input type="text" class="form-control" name="tecnico" value="<?php echo $_SESSION['nome'] ?>" readonly>
            <input type="text" class="form-control" name="idTecnico" value="<?php echo $_SESSION['cLogin'] ?>" hidden readonly>

          </div>
          <div class="form-group col-md-3">
            <label for="inputAddress2">Ação</label>
            <select name="status" class="form-control">
              <?php foreach ($viewData['acoes'] as $data) { ?>
                <option><?php echo $data ?></option>
              <?php } ?>
            </select>
          </div>
        </div>

        <?php foreach($viewData['descricao'] as $d){ ?>
          <div class="card col-md-8" >
            <div class="card-header">
             <?php echo $d['nome'].' - '.$d['data'] ?>
            </div>
            <div class="card-body">
              <p class="card-text"><?php print_r($d['descricao']) ?></p>
            </div>
          </div>
        <?php } ?>


        <div class="form-group col-md-2">
          <label for="inputZip">Descrição</label>
          <textarea name="descricao" cols="100" rows="5"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
      </form>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
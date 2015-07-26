<?php
$pregunta = new encuesta($data);
$result = $pregunta->get();

if ($result != false && $result->rowCount() > 0) {
    $data['action'] = 'update';
    $row = $result->fetch(PDO::FETCH_OBJ);
} else {
    $data['action'] = 'insert';
}
?>
<?php if ($data['action'] == 'update') { ?>
    <h3>Editar pregunta</h3>
<?php } else { ?>
    <h3>Introducir una nueva pregunta</h3>
<?php } ?>
<a href="index.php" style="float: right;">Nueva pregunta</a>
<form action="index.php" method="POST">
    <input type="hidden" name="action" value="<?php echo $data['action']; ?>"/>
    <select name="navegador">
        <?php if ($data['action'] == 'update') { ?>
            <option value="<?php echo @$row->navegador; ?>"><?php echo @$row->navegador; ?></option>
        <?php } ?>
        <option value="navegador">Mozilla</option>
        <option value="explorer">Internet Explorer</option>
        <option value="opera">Opera</option>
    </select>
    <input type="text" name="pregunta" value="<?php echo @$row->pregunta; ?>" placeholder="introduce la pregunta" style="width: 100%;"/>
    <textarea placeholder="introduce respuestas" style="width: 100%; height: 100px;" name="respuesta"><?php echo @$row->respuesta; ?></textarea>
    <?php if ($data['action'] == 'update') { ?>
        <button>Editar pregunta</button>
        <input type="hidden" name="id" value="<?php echo @$row->Id; ?>"/>
    <?php } else { ?>
        <button>Enviar nueva pregunta</button>
    <?php } ?>
</form>
<h3>Editar preguntas</h3>
<div id="list">
    <?php
    $result = $pregunta->find();
    if ($result) {
        while ($row = $result->fetch(PDO::FETCH_OBJ)) {
            ?>
            <div>
                <span>(<?= $row->Id; ?>) <?= $row->pregunta; ?> </span><a href="index.php?id=<?= $row->Id; ?>">Editar</a> | <a onclick="_delete(this)" id="<?= $row->Id; ?>" href="#">Borrar</a>
            </div>
            <?php
        }
    }
    ?>
</div>
<script>
    function _delete(data) {
        var confirm = window.confirm("Borrar?");
        if (confirm == true) {
            window.location.href = 'index.php?action=delete&id=' + data.id;
        }

    }
</script>

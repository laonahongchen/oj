<?php
$title = 'All Problems';
include(__DIR__ . '/../layout/header.php');
?>
<form method="GET" action="<?php echo SITE_BASE; ?>/problems" class="pull-right form-search">
  <input type="number" class="input-small search-query" placeholder="ID" name="id" maxlength="20">
  <input type="text" class="input-medium search-query" placeholder="Title" name="title" maxlength="100" value="<?php echo $this->title; ?>">
  <input type="text" class="input-medium search-query" placeholder="Author" name="author" maxlength="100" value="<?php echo $this->author; ?>">
  <button type="submit" class="btn btn-primary">Filter</button>
  <?php if (strlen($this->title) or strlen($this->author)): ?>
    <a class="btn" href="<?php echo SITE_BASE; ?>/problems">Cancel</a>
  <?php endif; ?>
</form>
<h1>All Problems</h1>
<?php include(__DIR__ . '/_pagination.php'); ?>
<table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>Title</th>
      <th>Author</th>
      <th>Ratio (AC/submit)</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($this->problems as $p): ?>
      <tr>
        <td><?php echo $p->getId(); ?></td>
        <td><a href="<?php echo SITE_BASE; ?>/problem/<?php echo $p->getId(); ?>"><?php echo $p->getTitle(); ?></a></td>
        <td><?php echo $p->getAuthor(); ?></td>
        <td><?php echo $p->getRatio(); ?>% (<?php echo $p->getAcceptCount(); ?>/<?php echo $p->getSubmitCount(); ?>)</td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php
include(__DIR__ . '/_pagination.php');
include(__DIR__ . '/../layout/footer.php');

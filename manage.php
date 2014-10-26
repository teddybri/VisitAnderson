<?php
include('includes/header.php');

?>

<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <br><br>
            <legend>
                <a href="<?php echo $page.'?add' ?>">
                    <button class="pull-right btn btn-green btn-sm">
                        <i class="fa fa-plus"></i> Add Table
                    </button>
                </a>
                <h3>
                <?php if ($currentTable != 'add'): ?>
                    Manage <?php echo ucwords($currentTable); ?> Table
                <?php else: ?>
                    Add a Table
                <?php endif; ?>
                </h3>
            </legend>
            <div class="row">
                <div class="col-lg-12">
                    <?php if ($currentTable == 'add'): ?>
                        <!-- add a table -->
                        <form class="form-horizontal">
                            
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

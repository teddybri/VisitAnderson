<?php
include('includes/header.php');

/* database calls */
if ($currentTable == 'visitor') { // visitor table
    if (isset($_GET['pageno'])) {
        $pageno = $_GET['pageno'];
    } else {
        $pageno = 1;
    }
    
    $query = "SELECT count(*) FROM table WHERE ...";
    $result = mysql_query($query, visitor) or trigger_error("SQL", E_USER_ERROR);
    $query_data = mysql_fetch_row($result);
    $numrows = $query_data[0];
    $rows_per_page = 200;
    
    $lastpage = ceil($numrows/$rows_per_page);
    $pageno = (int)$pageno;
    if ($pageno > $lastpage) {
        $pageno = $lastpage;
    } // if
    if ($pageno < 1) {
        $pageno = 1;
    }
    $limit = 'LIMIT ' .($pageno - 1) * $rows_per_page .',' .$rows_per_page;
    $query = "SELECT * FROM table $limit";
    $result = mysql_query($query, $db) or trigger_error("SQL", E_USER_ERROR);
    if ($pageno == 1) {
        echo " FIRST PREV ";
    } else {
        echo " <a href='{$_SERVER['PHP_SELF']}?pageno=1'>FIRST</a> ";
        $prevpage = $pageno-1;
        echo " <a href='{$_SERVER['PHP_SELF']}?pageno=$prevpage'>PREV</a> ";
    }
    echo " ( Page $pageno of $lastpage ) ";
    if ($pageno == $lastpage) {
        echo " NEXT LAST ";
    } else {
        $nextpage = $pageno+1;
        echo " <a href='{$_SERVER['PHP_SELF']}?pageno=$nextpage'>NEXT</a> ";
        echo " <a href='{$_SERVER['PHP_SELF']}?pageno=$lastpage'>LAST</a> ";
    }
}
elseif ($currentTable == 'visiting') { // visiting table
    /* get from mapping table then join visitor and visiting table */
    $sql = 'SELECT visitor.first_name, visitor.last_name, visitor.email, visitor.id,
                   visiting.reason, visiting.visit_date, visiting.updated_at 
            FROM mapping 
            INNER JOIN visitor ON mapping.person_id = visitor.id
            INNER JOIN visiting ON mapping.table_id = visiting.id';
}
elseif ($currentTable == 'intrests') {
    $sql = 'SELECT * FROM intrests';
}
$queryResult = mysqli_query($con, $sql);

?>

<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <br><br>
            <!-- success and error messages -->
            <?php if (isset($_GET['error']) == 1): ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <strong>ERROR:</strong> First Name, Last Name, and Email cannot all be blank
                </div>
            <?php elseif (isset($_GET['success']) && $_GET['success'] == "add"): ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <strong>Success!</strong> The person was successfully added.
                </div>
            <?php elseif (isset($_GET['success']) && $_GET['success'] == "edit"): ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <strong>Success!</strong> The person was successfully edited.
                </div>
            <?php endif; ?>

            <a id="top"></a>

            <!-- page title -->
            <legend>
                <button class="pull-right btn btn-green btn-sm" id="add-row">
                    <i class="fa fa-plus"></i> Add
                </button>
                <button class="pull-right btn btn-default btn-sm" style="margin-right: 10px;">
                    <i class="fa fa-file"></i> Add From File
                </button>
                <input type="hidden" id="table-name" value="<?php echo $currentTable; ?>">
                <h3><?php echo ucwords($currentTable); ?> Table</h3>
            </legend>

            <!-- page data -->
            <div class="row">
                <div class="col-lg-12">
                    <?php if (sizeof($explode) > 1): ?>
                        <!-- a table is chosen in url -->
                        <?php
                        include('includes/tables.php');
                        $table = new TableClass(); // instance of the table class
                        /* get the right table */
                        switch ($currentTable) {
                            case 'visitor':
                                $table->visitorTable($queryResult);
                                break;
                            case 'visiting':
                                $table->visitingTable($queryResult);
                                break;
                            case 'intrests':
                                $table->intrestsTable($queryResult);
                                break;
                        }
                        ?>
                    <?php else: ?>
                        <!-- no table provided in url -->
                        <table class="table table-striped table-condensed table-hover">
                            <?php foreach ($tables as $table) {
                                echo '
                                    <tr>
                                        <td>
                                            <a href="'.$page.'?'.$table.'">
                                                '.ucwords($table).'
                                            </a>
                                        </td>
                                    </tr>';
                            } ?>
                        </table>
                    <?php endif; ?>
                </div>
            </div>
            
        </div>
    </div>
</div>

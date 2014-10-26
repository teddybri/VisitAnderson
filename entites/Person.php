<?php

include("../includes/config.php");

$person = new Person();

/* call the right function */
if ($_POST['actionType'] == 'edit') {
    $person->edit();
} else {
    $person->add($con);
}

/**
 * Person Class
 */
class Person
{
    /**
     * Edit an existing person
     */
    public function edit()
    {
        echo time();
        die();
    }

    /**
     * Add a new person
     */
    public function add($con)
    {
        /* deny if fname, lname, and email are null */
        if ($_POST['first_name'] == "" && $_POST['last_name'] == "" && $_POST['email'] == "") {
            header("location: ../index.php/?person&error=1");
        }
        else {
            $sql = 'INSERT INTO person (
                `first_name`,
                `last_name`,
                `address`,
                `city`,
                `state`,
                `zip`,
                `country`,
                `home_phone`,
                `mobile_phone`,
                `work_phone`,
                `email`,
                `age`,
                `children`,
                `num_of_children`,
                `children_age`,
                `created_at`,
                `updated_at`
            ) VALUES (
                "'.$_POST['first_name'].'",
                "'.$_POST['last_name'].'",
                "'.$_POST['address'].'",
                "'.$_POST['city'].'",
                "'.$_POST['state'].'",
                "'.$_POST['zip'].'",
                "US",
                "'.$_POST['home_phone'].'",
                "'.$_POST['mobile_phone'].'",
                "'.$_POST['work_phone'].'",
                "'.$_POST['email'].'",
                "'.$_POST['age'].'",
                "'.$_POST['children'].'",
                "'.$_POST['num_of_children'].'",
                "'.$_POST['children_age'].'",
                "'.time().'",
                "'.time().'"
            )';
            mysqli_query($con, $sql);

            /* redirect */
            header("location: ../index.php/?person&success=add");
        }
    }
}

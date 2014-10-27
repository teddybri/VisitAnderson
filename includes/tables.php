<?php

/**
* Table data
*/
class TableClass
{
    public function visitorTable($query)
    {
        /* check for id in url */
        if (isset($_GET['id']) != null) {
            include('config.php');
            $sql = 'SELECT * FROM visitor WHERE `id` = "'.$_GET['id'].'"';
            $visitor = mysqli_query($con, $sql);
            $visitor = $visitor->fetch_assoc();
            //die(var_dump($person));
        }
        ?>
        <!-- add/edit form -->
        <div class="well" id="person-form" style="<?php if(isset($_GET['id']) == null){echo 'display: none';} ?>">
            <div class="row">
                <form method="POST" action="entites/Person.php">
                <input type="hidden" id="actionType" name="actionType" value="add">
                <input type="hidden" id="person-id" name="personId" value="">
                <div class="col-lg-4">
                    <label class="form-label">First Name</label>
                    <input class="form-control input-sm" id="form-fname" name="first_name" value="">
                    <label class="form-label">Last Name</label>
                    <input class="form-control input-sm" id="form-lname" name="last_name" value="">
                    <label class="form-label">Email</label>
                    <input class="form-control input-sm" id="form-email" name="email" value="">
                </div>
                <div class="col-lg-4">
                    <label class="form-label">Mobile Phone</label>
                    <input class="form-control input-sm" id="form-mobile" name="mobile_phone" value="">
                    <label class="form-label">Home Phone</label>
                    <input class="form-control input-sm" id="form-home" name="home_phone" value="">
                    <label class="form-label">Work Phone</label>
                    <input class="form-control input-sm" id="form-work" name="work_phone" value="">
                </div>
                <div class="col-lg-4">
                    <label class="form-label">Address</label>
                    <input class="form-control input-sm" id="form-address" name="address" value="">
                    <label class="form-label">City</label>
                    <input class="form-control input-sm" id="form-city" name="city" value="">
                    <div class="row">
                        <div class="col-lg-8">
                            <label class="form-label">State</label>
                            <select name="state" class="form-control" id="form-state">
                                <option value="">Select</option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                                <option value="AZ">Arizona</option>
                                <option value="AR">Arkansas</option>
                                <option value="CA">California</option>
                                <option value="CO">Colorado</option>
                                <option value="CT">Connecticut</option>
                                <option value="DE">Delaware</option>
                                <option value="DC">District Of Columbia</option>
                                <option value="FL">Florida</option>
                                <option value="GA">Georgia</option>
                                <option value="HI">Hawaii</option>
                                <option value="ID">Idaho</option>
                                <option value="IL">Illinois</option>
                                <option value="IN">Indiana</option>
                                <option value="IA">Iowa</option>
                                <option value="KS">Kansas</option>
                                <option value="KY">Kentucky</option>
                                <option value="LA">Louisiana</option>
                                <option value="ME">Maine</option>
                                <option value="MD">Maryland</option>
                                <option value="MA">Massachusetts</option>
                                <option value="MI">Michigan</option>
                                <option value="MN">Minnesota</option>
                                <option value="MS">Mississippi</option>
                                <option value="MO">Missouri</option>
                                <option value="MT">Montana</option>
                                <option value="NE">Nebraska</option>
                                <option value="NV">Nevada</option>
                                <option value="NH">New Hampshire</option>
                                <option value="NJ">New Jersey</option>
                                <option value="NM">New Mexico</option>
                                <option value="NY">New York</option>
                                <option value="NC">North Carolina</option>
                                <option value="ND">North Dakota</option>
                                <option value="OH">Ohio</option>
                                <option value="OK">Oklahoma</option>
                                <option value="OR">Oregon</option>
                                <option value="PA">Pennsylvania</option>
                                <option value="RI">Rhode Island</option>
                                <option value="SC">South Carolina</option>
                                <option value="SD">South Dakota</option>
                                <option value="TN">Tennessee</option>
                                <option value="TX">Texas</option>
                                <option value="UT">Utah</option>
                                <option value="VT">Vermont</option>
                                <option value="VA">Virginia</option>
                                <option value="WA">Washington</option>
                                <option value="WV">West Virginia</option>
                                <option value="WI">Wisconsin</option>
                                <option value="WY">Wyoming</option>
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <label class="form-label">Zip</label>
                            <input class="form-control input-sm" id="form-zip" name="zip" value="">
                        </div>
                    </div>
                    <br>
                    <button class="pull-right btn btn-green btn-sm" type="submit">
                        <i class="fa fa-check"></i> Save
                    </button>
                    <button class="pull-right btn btn-default btn-sm" type="button" id="close-row" style="margin-right: 10px;">
                        <i class="fa fa-close"></i> Close
                    </button>
                </div>
                </form>
            </div>
        </div>

        <!-- content table -->
        <table class="table table-striped table-condensed table-hover table-bordered">
            <thead>
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone(s)</th>
                <th>Last Updated</th>
                <th style="width: 65px;"></th>
            </thead>
            <tbody>
                
                <?php foreach ($query as $counter => $result): ?>
                    <tr class="edit-row-tr" id="<?php echo $result['id']; ?>">
                        <td><?php echo $counter + 1; ?></td>
                        <td id="person-fname-<?php echo $result['id']; ?>">
                            <?php echo ucwords($result['first_name']); ?>
                        </td>
                        <td id="person-lname-<?php echo $result['id']; ?>">
                            <?php echo ucwords($result['last_name']); ?>
                        </td>
                        <td id="person-email-<?php echo $result['id']; ?>">
                            <?php echo $result['email']; ?>
                        </td>
                        <td>
                            <span id="person-mobile-<?php echo $result['id']; ?>">
                                <?php echo $result['mobile_phone']; ?> 
                            </span>
                            <span id="person-home-<?php echo $result['id']; ?>">
                                <?php echo $result['home_phone']; ?>
                            </span>
                            <span id="person-work-<?php echo $result['id']; ?>">
                                <?php echo $result['work_phone']; ?>
                            </span>
                        </td>
                        <td>
                            <?php echo date('m/d/y h:ia', $result['updated_at']); ?>
                        </td>
                        <td>
                            <button class="btn btn-danger btn-xs">
                                <i class="fa fa-remove"></i>
                            </button>
                            <button class="btn btn-default btn-xs edit-row" value="<?php echo $result['id']; ?>">
                                <i class="fa fa-edit"></i>
                            </button>
                        </td>
                        <!-- hidden fields for edit -->
                        <input type="hidden" id="person-address-<?php echo $result['id']; ?>" value="<?php echo $result['address']; ?>">
                        <input type="hidden" id="person-city-<?php echo $result['id']; ?>" value="<?php echo $result['city']; ?>">
                        <input type="hidden" id="person-state-<?php echo $result['id']; ?>" value="<?php echo $result['state']; ?>">
                        <input type="hidden" id="person-zip-<?php echo $result['id']; ?>" value="<?php echo $result['zip']; ?>">
                    </tr>
                <?php endforeach; ?>
                
            </tbody>
        </table>
        <?php
    }

    public function visitingTable($query)
    {
        ?>
        <!-- add/edit form -->
        <div class="well" id="visiting-form" style="display: none;">
            <form>
            <div class="row">
                <div class="col-lg-3">
                    <label class="form-label">First Name</label>
                    <input class="form-control input-sm" name="first_name" value="">
                    <label class="form-label">Last Name</label>
                    <input class="form-control input-sm" name="last_name" value="">
                    <label class="form-label">Email</label>
                    <input class="form-control input-sm" name="email" value="">
                </div>
                <div class="col-lg-3">
                    <label class="form-label">Mobile Phone</label>
                    <input class="form-control input-sm" name="mobile_phone" value="">
                    <label class="form-label">Home Phone</label>
                    <input class="form-control input-sm" name="home_phone" value="">
                    <label class="form-label">Work Phone</label>
                    <input class="form-control input-sm" name="work_phone" value="">
                </div>
                <div class="col-lg-3">
                    <label class="form-label">Address</label>
                    <input class="form-control input-sm" name="address" value="">
                    <label class="form-label">City</label>
                    <input class="form-control input-sm" name="city" value="">
                    <div class="row">
                        <div class="col-lg-8">
                            <label class="form-label">State</label>
                            <select class="form-control">
                                <option value="">Select</option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                                <option value="AZ">Arizona</option>
                                <option value="AR">Arkansas</option>
                                <option value="CA">California</option>
                                <option value="CO">Colorado</option>
                                <option value="CT">Connecticut</option>
                                <option value="DE">Delaware</option>
                                <option value="DC">District Of Columbia</option>
                                <option value="FL">Florida</option>
                                <option value="GA">Georgia</option>
                                <option value="HI">Hawaii</option>
                                <option value="ID">Idaho</option>
                                <option value="IL">Illinois</option>
                                <option value="IN">Indiana</option>
                                <option value="IA">Iowa</option>
                                <option value="KS">Kansas</option>
                                <option value="KY">Kentucky</option>
                                <option value="LA">Louisiana</option>
                                <option value="ME">Maine</option>
                                <option value="MD">Maryland</option>
                                <option value="MA">Massachusetts</option>
                                <option value="MI">Michigan</option>
                                <option value="MN">Minnesota</option>
                                <option value="MS">Mississippi</option>
                                <option value="MO">Missouri</option>
                                <option value="MT">Montana</option>
                                <option value="NE">Nebraska</option>
                                <option value="NV">Nevada</option>
                                <option value="NH">New Hampshire</option>
                                <option value="NJ">New Jersey</option>
                                <option value="NM">New Mexico</option>
                                <option value="NY">New York</option>
                                <option value="NC">North Carolina</option>
                                <option value="ND">North Dakota</option>
                                <option value="OH">Ohio</option>
                                <option value="OK">Oklahoma</option>
                                <option value="OR">Oregon</option>
                                <option value="PA">Pennsylvania</option>
                                <option value="RI">Rhode Island</option>
                                <option value="SC">South Carolina</option>
                                <option value="SD">South Dakota</option>
                                <option value="TN">Tennessee</option>
                                <option value="TX">Texas</option>
                                <option value="UT">Utah</option>
                                <option value="VT">Vermont</option>
                                <option value="VA">Virginia</option>
                                <option value="WA">Washington</option>
                                <option value="WV">West Virginia</option>
                                <option value="WI">Wisconsin</option>
                                <option value="WY">Wyoming</option>
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <label class="form-label">Zip</label>
                            <input class="form-control input-sm" name="zip" value="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <label class="form-label">Age</label>
                    <input class="form-control input-sm" name="age" value="">
                    <div class="row">
                        <div class="col-lg-6">
                            <label class="form-label">Children</label>
                            <input class="form-control input-sm" name="children" value="">
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label">Number</label>
                            <input class="form-control input-sm" name="num_of_children" value="">
                        </div>
                    </div>
                    <label class="form-label">Children Age</label>
                    <input class="form-control input-sm" name="children_age" value="">
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-3">
                    <label class="form-label">Reason</label>
                    <select class="form-control" name="reason">
                        <option value="">Select</option>
                        <option value="business">Business</option>
                        <option value="vacation">Vacation</option>
                        <option value="area_resident">Area Resident</option>
                        <option value="convention_atendee">Convention Atendee</option>
                        <option value="looking_at_/_attending_area_school">Looking at / Attending area school</option>
                        <option value="relocation">Relocation</option>
                        <option value="weekend_getaway">Weekend Getaway</option>
                    </select>
                </div>
                <div class="col-lg-2">
                    <label class="form-label">Visit Month</label>
                    <select class="form-control" name="visit_date">
                        <option value="">Select</option>
                        <option value="january">January</option>
                        <option value="february">February</option>
                        <option value="march">March</option>
                        <option value="april">April</option>
                        <option value="may">May</option>
                        <option value="june">June</option>
                        <option value="july">July</option>
                        <option value="august">August</option>
                        <option value="september">September</option>
                        <option value="october">October</option>
                        <option value="november">November</option>
                        <option value="december">December</option>
                    </select>
                </div>
                <div class="col-lg-5">
                    <div class="col-lg-6">
                        <label class="form-label">Visit Start</label>
                        <div id="datetimepicker1" class="input-group">
                            <input data-format="MM/dd/yyyy" name="visit_date_start" class="form-control">
                            <span class="input-group-addon add-on">
                                <i class="fa fa-calendar"></i>
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label class="form-label">Visit End</label>
                        <div id="datetimepicker2" class="input-group">
                            <input data-format="MM/dd/yyyy" name="visit_date_end" class="form-control">
                            <span class="input-group-addon add-on">
                                <i class="fa fa-calendar"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <br>
                    <button class="pull-right btn btn-green btn-sm" type="submit">
                        <i class="fa fa-check"></i> Save
                    </button>
                    <button class="pull-right btn btn-default btn-sm" type="button" id="close-row" style="margin-right: 10px;">
                        <i class="fa fa-close"></i> Close
                    </button>
                </div>
            </div>
            </form>
        </div>

        <!-- content table -->
        <table class="table table-striped table-condensed table-hover table-bordered">
            <thead>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Reason</th>
                <th>Visiting Date</th>
                <th>Last Updated</th>
                <th style="width: 65px;"></th>
            </thead>
            <tbody>
                
                <?php foreach ($query as $counter => $result): ?>
                    <tr>
                        <td><?php echo $counter + 1; ?></td>
                        <td>
                            <a href="index.php/?person&id=<?php echo $result['id']; ?>">
                                <?php echo ucwords($result['first_name']).' '.ucwords($result['last_name']); ?>
                            </a>
                        </td>
                        <td><?php echo $result['email']; ?></td>
                        <td><?php echo ucwords(str_replace("_", " ", $result['reason'])); ?></td>
                        <td><?php echo ucwords($result['visit_date']); ?></td>
                        <td><?php echo date('m/d/y h:ia', $result['updated_at']); ?></td>
                        <td>
                            <button class="btn btn-danger btn-xs"><i class="fa fa-remove"></i></button>
                            <button class="btn btn-default btn-xs"><i class="fa fa-edit"></i></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                
            </tbody>
        </table>
        <?php
    }

    public function intrestsTable($query)
    {
        ?>
            <!-- content table -->
        <table class="table table-striped table-condensed table-hover table-bordered">
            <thead>
                <th>#</th>
                <th>Intrest</th>
                <th style="width: 65px;"></th>
            </thead>
            <tbody>
                
                <?php foreach ($query as $counter => $result): ?>
                    <tr>
                        <td><?php echo $counter + 1; ?></td>
                        <td><?php echo $result['name']; ?></td>
                        <td>
                            <button class="btn btn-danger btn-xs"><i class="fa fa-remove"></i></button>
                            <button class="btn btn-default btn-xs"><i class="fa fa-edit"></i></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                
            </tbody>
        </table>
        <?php
    }
}

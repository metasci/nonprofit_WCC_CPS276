
<!--

filter by:

first_name
last_name
family_id
user_id
gender
city
birth_date (year, month, day) ex. show me all kids born in december || born in 2009

-->

<style>
    .browse-users-title{
        display: inline-block;
        text-align: center;
        width: 100%;
    }
</style>

<div class="panel panel-info">
    <div class="panel-heading">
        <div class="dropdown">

            <div class="browse-users-title">
                <h2>Browse Users</h2>

            </div>

            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Filter Results
                <span class="caret"></span>
            </button>

                <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <?php echo form_open() ?> <!-- route to user_model function that displays all users before loading this page in the first place -->
                        <div class="row">


                            <div class="form-group col-lg-2 col-md-2 col-sm-6 col-xs-12">
                                <label for="first_name">First Name</label><br>
                                <input type="text" class="form-control" name="first_name">
                            <!--</div>
                            <div class="form-group">-->
                                <label for="last_name">Last Name</label>
                                <input type="text" class="form-control" name="last_name">
                            </div>


                            <div class="form-group col-lg-2 col-md-3 col-sm-6 col-xs-12">
                                <label for="family_id">Family ID</label>
                                <input type="number" class="form-control" name="family_id">

                                <label for="user_id">User ID</label>
                                <input type="number" class="form-control" name="user_id">
                            </div>


                            <div class="form-group col-lg-2 col-md-3 col-sm-6 col-xs-12">
                                <label for="city">City</label>
                                <input type="text" class="form-control" name="city">

                                <label for="birth_date">Birth Date</label>
                                <input type="date" class="form-control" name="birth_date">
                            </div>


                            <div class="form-group col-lg-2 col-md-3 col-sm-6 col-xs-12">
                                <label for="birth_month">Birth Month #: (1 - 12)</label> <!-- good for finding who has birthdays this month -->
                                <input type="number" class="form-control" name="birth_Month" min="1" max="12">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="gender" value="0">
                                        Male
                                    </label>
                                    <label>
                                        <input type="checkbox" name="gender" value="1">
                                        Female
                                    </label>
                                </div>
                            </div>

                            
                            <div class="form-group col-lg-1 col-md-1 col-sm-2 col-xs-3">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="user_type" value="admin">
                                        Admin
                                    </label>
                                    <label>
                                        <input type="checkbox" name="user_type" value="teacher">
                                        Teacher
                                    </label>
                                    <label>
                                        <input type="checkbox" name="user_type" value="parent">
                                        Parent
                                    </label>
                                    <label>
                                        <input type="checkbox" name="user_type" value="student">
                                        Student
                                    </label>
                                </div>
                            </div>
                            
                            <div class="form-group col-lg-1 col-md-1 col-sm-2 col-xs-3">
                                <input type="submit" class="btn btn-primary" value="Filter Users">
                            </div>
                        </div>
                    <?php echo form_close() ?>
                </div>
            </div>    
        </div><!-- panel-heading -->


    <div class="panel-body">

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Status</th> <!-- admin, teacher, parent, student -->
                    <th>Gender</th>
                    <th>City</th>
                </tr>
            </thead>
            <tbody>
                <!-- loop through results -->
                <tr>
                    <td>User ID</td>
                    <td>First Name</td>
                    <td>Last Name</td>
                    <td>Status</td> <!-- admin, teacher, parent, student -->
                    <td>Gender</td>
                    <td>City</td>
                </tr>
            </tbody>
        </table>


    </div><!-- panel-body -->
</div>

    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo 'Hello, '.$first_name.' '.$middle_initial.' '.$last_name ?></h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class=" col-md-9 col-lg-9 ">
                    <table class="table table-user-information">
                        <tbody>
                        <tr>
                            <td>Gender:</td>
                            <td><?php echo $gender? 'Female':'Male'; ?></td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td><?php echo $email ?></td>
                        </tr>
                        <tr>
                            <td>Date of Birth</td>
                            <td><?php echo date_format(date_create($birth_date), 'M d, Y') ?></td>
                        </tr>

                        <tr>
                        <tr>
                            <td>Address</td>
                            <td><?php echo $street.', '.$city.', '.$state.' '.$zip ?></td>
                        </tr>
                        <tr>
                        <td>Phone Number 1<br><br>Phone Number 2</td>
                        <td><?php echo $phone_number_1 ?><br><br><?php echo $phone_number_2 ?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <form action="./index.php/account_settings" method="post">
            <div class="panel-footer">
                <button class="btn btn-info">My Info</button>
            </div>
        </form>
    </div>
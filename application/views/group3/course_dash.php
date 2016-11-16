
<!-- it would be great if this could be filtered (grade, teacher, course_name, etc..)-->

<div class="mainContent">

    <h1>Courses</h1>

    
    <!-- show add class button only if user is admin -->
    <?php if($user_permission[0]): ?>
        <a class="btn btn-success" href='add-class'>Add Course</a>
    <?php endif; ?>

    

    <br/>

    

        <table class="table table-striped">

        

        <thead>



            <tr>

                <td>Grade Level</td>

                <td>Course Name</td>

                <td>Teacher</td>

                <td>Category</td>

                <td>Time Start</td>

                <td>Time End</td>

                <td colspan='2'></td>

            </tr>
            
        </thead>

        <tbody>

<?php

// this could use some cleaning up
// i did a little but the logic here is awkward

foreach($course_info as $row){	

	

echo "<tr>";

echo "<td>";

echo $row['min_gradelevel'];

echo "</td>";

echo "<td>";

echo $row['course_name'];		

echo "</td>";

echo "<td>";

echo $row['teacher'];

echo "</td>";

echo "<td>"; 

echo $row['category'];

echo "</td>"; 

echo "<td>";

echo $row['time1start'];

echo "</td>";

echo "<td>";

echo $row['time1end'];

echo "</td>";


// make these individual forms and tie them to routes************
echo "<td><a class=\"btn btn-info\" href='details.php?id=".$row['id']."'>details</a></td>";

echo "<td><a class=\"btn btn-danger\" href='delete-class.php?id=".$row['id']."'>delete</a></td></tr>";
// **********


}

echo"</table>";





?>


            

            





            

            

        </tbody>

    

</div>

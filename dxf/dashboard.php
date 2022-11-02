<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>

    <div class="card">
        <div class="appointments">
            <h3>Appointments</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">User Id</th>
                        <th scope="col">Property Id</th>
                        <th scope="col">Landlord Id id </th>
                        <th scope="col">Appointment Date</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $userid = $_SESSION['user_id'];
                    $sql = "SELECT * FROM appointments WHERE u_id = $userid LIMIT 5";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['ap_id'];
                        $name = $row['u_id'];
                        $email = $row['pr_id'];
                        $phone = $row['ld_id'];
                        $date = $row['ap_date'];
                        $status = $row['ap_status'];

                        if ($status == 1) {
                            $status = "Pending";
                        } else if ($status == 2) {
                            $status = "Complete";
                        } else if ($status == 0) {
                            $status = "Cancelled";
                        }
                        echo "<tr>
                        <td>$id</td>
                        <td>$name</td>
                        <td>$email</td>
                        <td>$phone</td>
                        <td>$date</td>
                        <td>$status</td>
                        <td><a href='index.php?delete=$id'><button class='btn btn-danger'>Delete</button></a></td>
                    </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
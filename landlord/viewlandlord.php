<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<?php
include 'includes/connect.php';

$id  = $_GET['id'];

$query = "SELECT * FROM landlords WHERE ld_id = $id";
$run = mysqli_query($conn, $query);



if (mysqli_num_rows($run) > 0) {
    while ($row = mysqli_fetch_array($run)) {

        $get_landlord = "SELECT ld_firstname, ld_lastname FROM landlords WHERE ld_id = " . $id;
        $run_landlord = mysqli_query($conn, $get_landlord);
        $landlord = mysqli_fetch_array($run_landlord);
        

        $name = $row['ld_firstname'] . ' ' . $row['ld_lastname'];
        $email = $row['ld_email'];
        $phone = $row['ld_phonenumber'];
        $address = $row['ld_address'];
        $dob = $row['ld_dob'];
        $gender = $row['ld_gender'];
        $image = $row['ld_image'];
        $bank = $row['ld_bankaccountno'];
?>
<style>
    body {
        background: #272075;
    }

    .card {
        margin-left: 25vw;
        margin-right: 25vw;
        margin-top: 2em;
        padding: 4em;
    }
</style>

<body>
    <div class="card">
        <form action="" method="post">
            <div class="form-group">
                <label for="user">Landlord Id</label>
                <input type="text" class="form-control" name="user" value="<?php echo $id; ?>" disabled>
            </div>
            <div class="form-group">
                <label for=username>Name</label>
                <input type="text" class="form-control" name="username" value=<?php echo $name;?> disabled>
            </div>
            <div class="form-group">
                <label for="Email">Email</label>
                <input type="text" class="form-control" name="Email" id="property" value="<?php echo $email; ?>"
                    disabled>
            </div>
            <label for="phone">Phone number</label>
            <input type="text" class="form-control" name="phone" id="property" value="<?php echo $phone; ?>" disabled>

            <div class="form-group">
                <div class="form-group">
                    <label for="date">Date of Birth</label>
                    <input type="date" class="form-control" name="date" id="date" value="<?php echo $dob ?>" disabled>
                </div>
                <label for="Gender">Gender</label>
                <input type="text" class="form-control" name="Gender" id="property" value="<?php echo $gender; ?>"
                    disabled>
            </div>
            <label for="bank">Account number</label>
            <input type="text" class="form-control" name="bank" id="property" value="<?php echo $bank; ?>" disabled>
            <label for="address">Address</label>
            <input type="text" class="form-control" name="address" id="property" value="<?php echo $address; ?>"
                disabled>
            <div class="form-group" style="margin-top: 1em;">
                <button type="submit" name="submit" class="btn btn-primary">Back</button>
            </div>

        </form>
    </div>
</body>

<?php
    }
}

if (isset($_POST['submit'])) {
    header('Location: index.php?landlord');
}

?>
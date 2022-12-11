<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>oop crud</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Courier New', Courier, monospace;
        }

        header {
            width: 100%;
            text-align: center;
            background-color: aliceblue;
            color: dodgerblue;
            padding: 12px;
            font-size: 22px;
        }

        .serchandaddbtn {
            display: flex;
            margin-top: 10px;
            justify-content: space-around;
        }

        input {
            outline: none;
            padding: 5px 12px;
            font-size: 16px;
        }

        button {
            padding: 4px 8px;
            outline: none;
            border: none;
            cursor: pointer;
        }

        .addbtn {
            background-color: dodgerblue;
            border: none;
            color: aliceblue;
        }

        .content {
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            /* border: 1px solid rgb(68, 68, 68); */
        }

        tr,
        td,
        th {
            border: 1px solid rgb(134, 134, 134);
            text-align: center;
            padding: 4px;
        }

        th {
            background-color: dodgerblue;
            color: aliceblue;
        }

        h3 {
            text-align: center;
            color: dodgerblue;
        }

        .edit {
            background-color: lightgreen;
            color: white;
            font-size: 16px;
        }

        .delete {
            background-color: rgb(255, 61, 61);
            color: white;
            font-size: 16px;

        }

        .action {
            display: flex;
            border: none;
            justify-content: space-around;
        }

        .cancel {
            background-color: rgb(253, 42, 42);
            color: aliceblue;
            text-align: center;
            padding: 4px;
            margin-bottom: 3px;
            cursor: pointer;
        }

        .button button {
            font-size: 18px;
        }

        .insert {
            background-color: aquamarine;
        }

        .popup {
            background-color: rgba(0, 0, 255, 0.2);
            width: 100%;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
        }

        .popup_content {
            position: absolute;
            background-color: azure;
            max-width: 500px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            border-radius: 10px;
        }

        label {
            width: 100%;

        }

        label input {
            width: 100%;
            margin-bottom: 10px;
        }

        .addmodel {
            display: none;
        }

        .upmodel {
            display: none;
        }

        .add,
        .update {
            background-color: dodgerblue;
            color: rgb(255, 255, 255);
        }

        .cancel {
            display: none;
        }

        input[type="submit"] {
            border: none;
            cursor: pointer;
        }

        .pagi {
            width: 100%;
            display: flex;
            justify-content: center;
        }

        ul {
            /* width: 100%; */
            display: flex;
            list-style: none;
            margin-top: 50px;
            margin-left: auto;
        }
        li{
            padding: 5px 8px;
            background-color:dodgerblue;
            color: whitesmoke;
            margin: 0px 3px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <header>
        <h2>OOP CRUD</h2>
        <div class="serchandaddbtn">
            <input type="search" id="search" placeholder="Search by user name">
            <button class="addbtn">Add User</button>
        </div>
    </header>

    <div class="content">
        <h3>All Users</h3>
        <div class="cancel">
            <h4>Cancel</h4>
        </div>
        <table>
            <tr>
                <th>SI</th>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
            <tbody class="tbody">

            </tbody>

        </table>
        <div class="popup addmodel">
            <div class="popup_content">
                <h3>Fill out the form</h3>
                <form id='aform' action="" method="post">
                    <label for="name">Name
                        <input type="text" name="name" id="name">
                    </label>
                    <label for="email">Email
                        <input type="email" name="email" id="email">
                    </label>
                    <label for="address">Address
                        <input type="text" name="addr" id="address">
                    </label>
                    <div class="button">
                        <input class="can" value="cancel" type="button" />
                        <input type="submit" class="insert" value="add">

                    </div>
                </form>
            </div>
        </div>
        <div class="popup upmodel">

        </div>
    </div>

    <script src="main.js"></script>
</body>

</html>
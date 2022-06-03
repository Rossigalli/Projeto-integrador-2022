<head>
    <link rel="stylesheet" href="css/users.css">
</head>

<table id="users-table">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th id="th_new-user"><i id="btn_new-user" class="fa-solid fa-plus" onclick="showFormNewUser()"></i></th>
    </tr>
    <?php
    for ($i = 0; $i < count($this->content); $i++) {
        echo '
        <tr>
            <td class="user_id">' . $this->content[$i]["id"] . '</td>
            <td>' . $this->content[$i]["full_name"] . '</td>
            <td>' . $this->content[$i]['email'] . '</td>
            <td class="table_actions">
                <a href=""><div class="table_btn btn_edit"><i class="fa-solid fa-pencil"></i></div>
                <a onclick="confirmAction(' . $this->content[$i]["id"] . ')"><div class="table_btn btn_delete"><i class="fa-solid fa-trash-can"></i></div>
            </td>
        </tr>';
    }
    ?>
</table>
<div id="card_new-user">
    <form action="users/addNewUser" method="post" id="form_new-user">
        <i onclick="showFormNewUser()" class="card_close-btn fa-solid fa-xmark"></i>
        <input class="input_new-user" type="text" name="name" placeholder="Nome" autofocus></input>
        <input class="input_new-user" type="email" name="email" placeholder="Email"></input>
        <input class="input_new-user" type="password" name="pass" placeholder="Senha"></input>
        <input type="submit" class="input_btn"></input>
    </form>
</div>
<script src="js/users.js"></script>
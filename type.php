<?php
    include "header.php";
    require_once(ROOT_PATH . '/Controller/TypeController.php');
    
    $typeController = new TypeController();
    if(isset($_GET["newtype"]) && $_GET["newtype"]=='true')
    {
?>
<h1>Types</h1>
<form method="POST" action ="">
    <label for="group">Group:</label>
    <select name="group" id="group" onchange="showData()" required>
        <option value="1">Készülék üzemben van</option>
        <option value="2">SIM-kártya üzemben van</option>
    </select>      
    <label for="name">Name:</label>
    <select name="name" id="nameSelect" required>
        <option value="raktáron van">Raktáron van</option>
        <option value="kiszállítás folyamatban">Kiszállítás folyamatban</option>
        <option value="partnernél van, de még nincs üzemben">Partnernél van, de még nincs üzemben</option>';
        <option value="szervizben van">Szervizben van</option>
        <option value="ellopták">Ellopták</option>
        <option value="elveszett">Elveszett</option>
        <option value="üzemben van">Üzemben van</option>
    </select>   
    <label for="comment">Comment:</label>
    <input type="text" name="comment" id="comment" maxlength="255">
    <input type="submit" name="add" value="Add New Type">
</form>
<a href="type.php" class="pageButton">Back</a>
<script>
    function showData() {
        var value = document.getElementById("group").value;
        var html = '';

        if(value == 1) {
            html = html + '<option value="raktáron van">Raktáron van</option>';
            html = html + '<option value="kiszállítás folyamatban">Kiszállítás folyamatban</option>';
            html = html + '<option value="partnernél van, de még nincs üzemben">Partnernél van, de még nincs üzemben</option>';
            html = html + '<option value="szervizben van">Szervizben van</option>';
            html = html + '<option value="ellopták">Ellopták</option>';
            html = html + '<option value="elveszett">Elveszett</option>';
            html = html + '<option value="üzemben van">Üzemben van</option>';            
        } else  if(value == 2) {
            html = html + '<option value="megvették, de még nincs üzemben">Megvették, de még nincs üzemben</option>';
            html = html + '<option value="készülékben van">Készülékben van</option>';
        }         
        nameSelect.innerHTML = (html);
    }
</script>

<?php
    } else {
        $types = $typeController->getAllType();
        echo '<h1>Types</h1>
        <div class="tableHolder">
        <table id="contentTable">';
        echo '<tr>
            <th>ID</th>
            <th>Group</th>
            <th>Name</th>
            <th>Comment</th>
            <th>Created</th>
            <th>Updated</th>
            </tr>';
        foreach($types as $type) 
        {
            echo '<tr>';
            echo '<td>'.$type->getId().'</td>';
            echo '<td>'.$type->getGroup().'</td>';
            echo '<td>'.$type->getName().'</td>';
            echo '<td>'.$type->getComment().'</td>';
            echo '<td>'.date('Y-m-d H:i:s', strtotime($type->getCreated())).'</td>';
            echo '<td>'.date('Y-m-d H:i:s', strtotime($type->getUpdated())).'</td>';
            echo '</tr>';
        }
        echo '</table></div>';
        echo '<a href="type.php?newtype=true" class="pageButton">Add New Type</a>';
    }
    if(isset($_POST["add"])) {
        echo '<div class="msg">'.
            $typeController->addNewType($_POST["group"], $_POST["name"], $_POST["comment"])
            .'</div>';               
    }

    include "footer.php";
?>
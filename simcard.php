<?php
    include "header.php";
    require_once(ROOT_PATH . '/Controller/SimCardController.php');

    $simCardController = new SimCardController();
    $phones = $simCardController->getAllPhone();
    $carriers = $simCardController->getAllCarrier();
    $types = $simCardController->getAllType();

    if(isset($_GET["newsim"]) && $_GET["newsim"] == true) {
?>
<h1>SIM Cards</h1>
<form method="POST" action="">
    <label for="phone">Phone:</label>
    <select name="phone" id="phone" required>
        <?php
            foreach($phones as $phone)
            {
                echo '<option value="'.$phone->getId().'">'.$phone->getFirId().'</option>';
            }
        ?>
    </select>
    <label for="slot">Slot:</label>
    <input type="number" name="slot" id="slot" maxlength="4" min="-128" max="127" required>
    <label for="mobileNumber">Mobile Number:</label>
    <input type="text" name="mobileNumber" id="mobileNumber" maxlength="20" required>
    <label for="imsi">IMSI:</label>
    <input type="text" name="imsi" id="imsi" maxlength="100" required>
    <label for="expiration">Expiration:</label>
    <input type="date" name="expiration" id="expiration" required>
    <label for="mobilnetExpiration">Mobilnet Expiration:</label>
    <input type="date" name="mobilnetExpiration" id="mobilnetExpiration" required>
    <label for="mobilnetDataLimit">Mobilenet Data Limit:</label>
    <input type="number" name="mobilnetDataLimit" id="mobilnetDataLimit" required>
    <label for="mobilnetIP">Mobilnet IP:</label>
    <input type="text" name="mobilnetIP" id="mobilnetIP" maxlength="100" required>
    <label for="carrier">Carrier:</label>
    <select name="carrier" id="carrier" required>
        <?php
            foreach($carriers as $carrier)
            {
                echo '<option value="'.$carrier->getId().'">'.$carrier->getName().'</option>';
            }
        ?>
    </select>
    <label for="package">Package:</label>
    <input type="text" name="package" id="package" maxlength="100" required>
    <label for="type">Type:</label>
    <select name="type" id="type" required>
        <?php
            foreach($types as $type)
            {
                echo '<option value="'.$type->getId().'">'.$type->getName().'</option>';
            }
        ?>
    </select>
    <label for="activated">Activated:</label>
    <input type="number" name="activated" id="activated" maxlength="4" min="-128" max="127" required>
    <label for="comment">Comment:</label>
    <input type="text" name="comment" id="comment" maxlength="255">
    <input type="submit" name="add" value="Add New SIM">
</form>
<a href="simcard.php" class="pageButton">Back</a>

<?php
    } else {
        $simCards = $simCardController->getAllSimCard();
        echo '<h1>SIM Cards</h1>
        <div class="tableHolder">
        <table id="contentTable">';
        echo '<tr>
            <th>ID</th>
            <th>PhoneID</th>
            <th>Slot</th>
            <th>MobileNumber</th>
            <th>IMSI</th>
            <th>Expiration</th>
            <th>MobilnetExpiration</th>
            <th>MobilnetDataLimit</th>
            <th>MobilnetIP</th>
            <th>CarrierID</th>
            <th>Package</th>
            <th>TypeID</th>
            <th>Activated</th>
            <th>Comment</th>
            <th>Creator</th>
            <th>Created</th>
            <th>Updater</th>
            <th>Updated</th>
        </tr>';
        foreach($simCards as $simCard) 
        {
            echo '<tr>';
            echo '<td>'.$simCard->getId().'</td>';
            echo '<td>'.$simCard->getPhoneID().'</td>';
            echo '<td>'.$simCard->getSlot().'</td>';
            echo '<td>'.$simCard->getMobileNumber().'</td>';
            echo '<td>'.$simCard->getIMSI().'</td>';
            echo '<td>'.$simCard->getExpiration().'</td>';
            echo '<td>'.$simCard->getMobilnetExpiration().'</td>';
            echo '<td>'.$simCard->getMobilnetDataLimit().'</td>';
            echo '<td>'.$simCard->getMobilnetIP().'</td>';
            echo '<td>'.$simCard->getCarrierID().'</td>';
            echo '<td>'.$simCard->getPackage().'</td>';
            echo '<td>'.$simCard->getTypeID().'</td>';
            echo '<td>'.$simCard->getActivated().'</td>';
            echo '<td>'.$simCard->getComment().'</td>';
            echo '<td>'.$simCard->getCreator().'</td>';
            echo '<td>'.date('Y-m-d H:i:s', strtotime($simCard->getCreated())).'</td>';
            echo '<td>'.$simCard->getUpdater().'</td>';
            echo '<td>'.date('Y-m-d H:i:s', strtotime($simCard->getUpdated())).'</td>';
            echo '</tr>';
        }
        echo '</table></div>';
        echo '<a href="simcard.php?newsim=true" class="pageButton">Add New Sim Card</a>';
    }
    
    if(isset($_POST["add"])) {
        echo '<div class="msg">'.
        $simCardController->addNewSim($_POST["phone"], $_POST["slot"], $_POST["mobileNumber"], $_POST["imsi"], $_POST["expiration"], 
        $_POST["mobilnetExpiration"], $_POST["mobilnetDataLimit"], $_POST["mobilnetIP"], $_POST["carrier"], $_POST["package"], $_POST["type"],
        $_POST["activated"], $_POST["comment"])
        .'</div>';
    }

    include "footer.php";
?>
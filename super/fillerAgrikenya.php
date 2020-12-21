<?php
require '_cred_agrikenya.php';
if(isset($_GET['selected'])){
    $filler = $_GET['selected'];
    $sql ="SELECT * FROM products WHERE id ='$filler'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $kg="";
            $punnet="";
            $piece="";
            $bundle="";
            $packet="";
            $per2="";
            $small="";
            $big="";
            switch($row['unit']){
                case 'kg':$kg="selected";break;
                case 'punnet':$punnet="selected";break;
                case 'pc':$piece="selected";break;
                case 'bundle':$bundle="";break;
                case 'pkt':$packet="selected";break;
                case 'per 2':$per2="selected";break;
                case 'small tin 250g':$small="selected";break;
                case 'big tin 500g':$big="selected";break;
            }

        echo ' <div class="form-group"><label>Item Unit:</label>
                                            <select class="form-control" name="item_unit">
                                            <option value="kg" '.$kg.'>KG</option>
                                            <option value="punnet" '.$punnet.'>Punnet</option>
                                            <option value="pc" '.$piece.'>Piece</option>
                                            <option value="bundle" '.$bundle.'>Bundle</option>
                                            <option value="pkt" '.$packet.'>Pkt</option>
                                                <option value="per 2" '.$per2.'>Per 2 (pair)</option>
                                            <option value="small tin 250g" '.$small.'>Small Tin - 250g</option>
                                            <option value="big tin 500g" '.$big.'>Big Tin - 500g</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Price</label>
                                        <input type="text" name="item_price" value="'.$row['price'].'" class="form-control" placeholder="Price per unit">
                                    </div>
                                    <div class="form-group">
                                        <label>Deal Price</label>
                                        <input type="text" name="deal-price" value="'.$row['deal_price'].'" class="form-control" value="Deal Price">
                                    </div>
                                    <div class="form-group form-check custom-control custom-checkbox small">
    <input type="checkbox" class="custom-control-input form-check-input" id="availablecheck"  name="availability_check" '.($row['availability']=='1' ? "checked":"").'>
    <label class="custom-control-label form-check-label" for="availablecheck">Available</label>
  </div>
   <div class="form-group form-check custom-control custom-checkbox small">
    <input type="checkbox" class="custom-control-input form-check-input" id="dealpricecheck" name="deal_check" '.($row['deal']=='1' ? 'checked':'').'>
    <label class="custom-control-label form-check-label" for="dealpricecheck">Deal Price</label>
  </div>
                                   
                                    <div class="form-group"><button class="btn btn-primary" type="submit" name="submit">Update Item</button></div>';
        }
    }
}

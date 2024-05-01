<?php
    include("conn.php");

    if (!class_exists('Item')) {
        class Item
        {
            public $itemId;
            public $itemName;
            public $itemPrice;
            public $itemCusine;
            public $itemDietary;
            public $itemService;
            public $itemImage;
            public $cartId;
            public $username;
        
            
            //functions
        
            //Adding items to the menu table
            public function addItem(){
                try {
                    $query = "INSERT INTO `menu` 
                    (`name`, `cusine_type`, `dietary`, `service_type`, `price`)
                    VALUES (:itemName, :itemCusine, :itemDietary, :itemService, :itemPrice)";
                    $conn = Conn::GetConnection();
                    $st = $conn->prepare($query);
                    $st->bindValue(":itemName", $this->itemName, PDO::PARAM_STR);
                    $st->bindValue(":itemCusine", $this->itemCusine, PDO::PARAM_STR);
                    $st->bindValue(":itemDietary", $this->itemDietary, PDO::PARAM_STR);
                    $st->bindValue(":itemService", $this->itemService, PDO::PARAM_STR);
                    $st->bindValue(":itemPrice", $this->itemPrice, PDO::PARAM_INT);
                    $st->execute();
                    return $conn->lastInsertId();
        
                } catch(Exception $e){
                    echo 'Error: ' . $e->getMessage();
                    return false;
                }
            }
        
            //Adding image path to menu table
            public function addImage(){
                try{
                    $query = "UPDATE `menu` SET `image` = :itemImage WHERE `item_id` = :itemId";
                    $conn = Conn::GetConnection();
                    $st = $conn->prepare($query);
                    $st->bindValue(":itemImage",$this->itemImage,PDO::PARAM_STR);
                    $st->bindValue(":itemId",$this->itemId,PDO::PARAM_INT);
                    $st->execute();
        
                } catch (Exception $e) {
                    echo 'Error: ' . $e->getMessage();
                }
            }
        
            //Updating details in the menu table
            public function updateItem()
            {
                $query = "UPDATE `menu` SET `name`=:itemName,`cusine_type`=:itemCusine,
                        `dietary`=:itemDietary,`service_type`= :itemService,`price`= :itemPrice,
                        `image`=:itemImage WHERE item_id = :itemId";
                $conn = Conn::GetConnection();
                $st = $conn->prepare($query);
                $st->bindValue(":itemName",$this->itemName,PDO::PARAM_STR);
                $st->bindValue(":itemCusine",$this->itemCusine,PDO::PARAM_STR);
                $st->bindValue(":itemDietary",$this->itemDietary,PDO::PARAM_STR);
                $st->bindValue(":itemService",$this->itemService,PDO::PARAM_STR);
                $st->bindValue(":itemPrice",$this->itemPrice,PDO::PARAM_INT);
                $st->bindValue(":itemImage",$this->itemImage,PDO::PARAM_STR);
                $st->bindValue(":itemId",$this->itemId,PDO::PARAM_INT);
                $st->execute();
        
                echo "Item updated in the database.";
            }
        
            //Deleting item from menu table
            public function deleteItem($itemId) {
                try {
                    $query = "DELETE FROM `menu` WHERE item_id = :itemId";
                    $conn = Conn::GetConnection();
                    $st = $conn->prepare($query);
                    $st->bindValue(":itemId", $itemId, PDO::PARAM_INT);
                    $st->execute();
            
                    echo "Item deleted from the database.";
                } catch (Exception $e) {
                    echo 'Error: ' . $e->getMessage();
                }
            }
            
        
            //Getting item details as an array for website use
            public static function getItem() {
                try {
                    $query = "SELECT `item_id`, `name`, `cusine_type`, `dietary`, 
                        `service_type`, `price`, `image` FROM `menu`";
                    $conn = Conn::GetConnection();
                    $items = array();
                    $result = $conn->query($query);
        
                    foreach($result as $r) {
                        $item = new Item();
                        $item->itemId = $r[0];
                        $item->itemName = $r[1];
                        $item->itemCusine = $r[2];
                        $item->itemDietary = $r[3];
                        $item->itemService = $r[4];
                        $item->itemPrice = $r[5];
                        $item->itemImage = $r[6];       
                        array_push($items,$item);
                    }
                    return $items;
                } catch (Exception $e) {
                    echo 'Error: ' . $e->getMessage();
                }          
            }
        
            //Getting item details by providing item id
            public static function getItemById($itemId) {
                try {
                    $query = "SELECT `item_id`, `name`, `cusine_type`, `dietary`, 
                        `service_type`, `price`, `image` FROM `menu` WHERE `item_id` = :itemId";
                    $conn = Conn::GetConnection();
                    $st = $conn->prepare($query);
                    $st->bindValue(":itemId", $itemId, PDO::PARAM_INT);
                    $st->execute();           
                    $result = $st->fetch(PDO::FETCH_ASSOC);
            
                    if ($result) {
                        $item = new Item();
                        $item->itemId = $result['item_id'];
                        $item->itemName = $result['name'];
                        $item->itemCusine = $result['cusine_type'];
                        $item->itemDietary = $result['dietary'];
                        $item->itemService = $result['service_type'];
                        $item->itemPrice = $result['price'];
                        $item->itemImage = $result['image'];                  
                        return $item;
                    }
                } catch (Exception $e) {
                    echo 'Error: ' . $e->getMessage();
                    return null;
                }
            }
        
            //Getting price of item by providing the name
            public static function getItemPriceByName($itemName) {
                try {
                    $query = "SELECT `price` FROM `menu` WHERE `name` = :itemName";
                    $conn = Conn::GetConnection();
                    $st = $conn->prepare($query);
                    $st->bindValue(":itemName", $itemName, PDO::PARAM_STR);
                    $st->execute();
            
                    $result = $st->fetch(PDO::FETCH_ASSOC);
            
                    if ($result) {
                        return floatval($result['price']);
                    }
        
                } catch (Exception $e) {
                    echo 'Error: ' . $e->getMessage();
                    return null;
                }
            }

        
            //Adding Feedback to the feedback table
            public function addFeedback($name, $email, $subject, $message)
            {
                try {
                    $query = "INSERT INTO `feedback` (`name`, `email`, `subject`, `message`)
                            VALUES (:name, :email, :subject, :message)";
                    $conn = Conn::GetConnection();
                    $st = $conn->prepare($query);
                    $st->bindValue(":name", $name, PDO::PARAM_STR);
                    $st->bindValue(":email", $email, PDO::PARAM_STR);
                    $st->bindValue(":subject", $subject, PDO::PARAM_STR);
                    $st->bindValue(":message", $message, PDO::PARAM_STR);
                    $st->execute();
                    return $conn->lastInsertId();
                } catch (Exception $e) {
                    echo 'Error: ' . $e->getMessage();
                    return false;
                }
            }

            //Getting all order details from orders table
            public static function getOrders() {
                try {
                    $conn = Conn::GetConnection();
                    $query = "SELECT * FROM orders";
                    $result = $conn->query($query);
        
                    return $result->fetchAll(PDO::FETCH_ASSOC);
                } catch (Exception $e) {
                    echo 'Error: ' . $e->getMessage();
                    return [];
                }
            }  

            //Getting all reservtaion details from reservaion table
            public static function getReservations() {
                try {
                    $conn = Conn::GetConnection();
                    $query = "SELECT * FROM reservations";
                    $result = $conn->query($query);
        
                    return $result->fetchAll(PDO::FETCH_ASSOC);
                } catch (Exception $e) {
                    echo 'Error: ' . $e->getMessage();
                    return [];
                }
            }

            //Adding an order to the orders table
            public static function addOrder($name, $orderDate, $service, $totalPrice, $address) {
                try {
                    $query = "INSERT INTO `orders`(`name`, `order_date`, `service`, `total_price`, `address`) 
                            VALUES (:name, :orderDate, :service, :totalPrice, :address)";
                    
                    $conn = Conn::GetConnection();
                    $st = $conn->prepare($query);
                    $st->bindValue(":name", $name, PDO::PARAM_STR);
                    $st->bindValue(":orderDate", $orderDate, PDO::PARAM_STR);
                    $st->bindValue(":service", $service, PDO::PARAM_STR);
                    $st->bindValue(":totalPrice", $totalPrice, PDO::PARAM_STR);
                    $st->bindValue(":address", $address, PDO::PARAM_STR);
                    $st->execute();
            
                    echo "Order added successfully.";
                } catch (Exception $e) {
                    echo 'Error: ' . $e->getMessage();
                }
            }                       
        }        
    }
?>
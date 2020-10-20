<?php


    class Admin extends DBconnection
    {
        //Sign up Admin
        public function add($email,$password,$name,$address)
        {
            try
            {
                //email	password	name	address
                $queryAdd = "INSERT INTO Admin(email,password,name,address) VALUES(:email,:password,:name,:address)";
                
                $this->query($queryAdd);
                $this->bind(':email',$email);
                $this->bind(':password',$password);
                $this->bind(':name',$name);
                $this->bind(':address',$address);

                $this->execute();


            }catch(Exception $e)
            {
                echo $e;
            }
        }
        

        //Sign in Admin
        public function readByEmail($email)
        {
            try
            {
                $queryReadByName = "SELECT * FROM Admin WHERE email=:email";
                $this->query($queryReadByName);
                $this->bind(':email',$email);
                $row=$this->single();
                return $row;

            }catch(Exception $e)
            {
                echo $e;
            }
        }

        //Create f
        public function addFood($adminId,$name,$price,$type,$desc)
        {  
            try{
                
                $queryAddFood= "INSERT INTO Food (AdminID, foodName, foodDesc, foodPrice, foodType)
                        VALUES (:AdminID, :foodName, :foodDesc, :foodPrice, :foodType)";
                $this->query($queryAddFood);
                $this->bind(':AdminID',$adminId);
                $this->bind(':foodName',$name);
                $this->bind(':foodDesc',$desc);
                $this->bind(':foodPrice',$price);
                $this->bind(':foodType',$type);
                $this->execute();


            }catch(Exception $e)
            {
                echo $e->getMessage();
            }
        }

        
        // Read food 
        public function printFood($adminID)
        {
            try
            {
                $query="SELECT * FROM Food WHERE AdminID=:AdminID";
                $this->query($query);
                $this->bind(':AdminID',$adminID);
                $i=0;
                while($row=$this->resultset())
                {
                    if($i<count($row))
                    {
                        yield $row[$i];
                        $i++;
                    }
                    else
                    {
                        return count($row);

                    }
                }

            }
            catch(Throwable $e)
            {
                echo $e->getMessage();
            }
        }
        // Get single food entry 
        public function getFood($id)
        {
            try
            {
                $query="SELECT * FROM Food WHERE FoodID=:FoodID";
                $this->query($query);
                $this->bind(':FoodID',$id);
                $row=$this->single();
                return $row;
            }
            catch(Throwable $e)
            {
                echo $e->getMessage();
            }
        }

        // Update food
        public function editFood($adminId,$name,$price,$type,$desc,$FoodID)
        {  
            try{
               

                $queryEditFood ="UPDATE Food SET foodName=:foodName, foodDesc=:foodDesc, foodPrice=:foodPrice, foodType=:foodType 
                WHERE AdminID=:AdminID AND FoodID=:FoodID";
                $this->query($queryEditFood);
                $this->bind(':AdminID',$adminId);
                $this->bind(':FoodID',$FoodID);
                $this->bind(':foodName',$name);
                $this->bind(':foodDesc',$desc);
                $this->bind(':foodPrice',$price);
                $this->bind(':foodType',$type);
                $this->execute();


            }catch(Exception $e)
            {
                echo $e->getMessage();
            }
        }


        // Delete food
        public function deleteFood($FoodID,$adminID)
        {  
            try{
               

                $queryDeleteFood ="DELETE FROM Food 
                WHERE AdminID=:AdminID AND FoodID=:FoodID";
                
                $this->query($queryDeleteFood);
                $this->bind(':AdminID',$adminID);
                $this->bind(':FoodID',$FoodID);
                $this->execute();


            }catch(Exception $e)
            {
                echo $e->getMessage();
            }
        }

        //Order 
        public function foodOrder($foodId,$userId,$adminId)
        {
            try
            {
                $queryAddFoodOrder= "INSERT INTO Orders (userId, foodId,adminId)
                        VALUES (:userId, :foodId, :adminId)";
                $this->query($queryAddFoodOrder);
                $this->bind(':userId',$userId);
                $this->bind(':foodId',$foodId);
                $this->bind(':adminId',$adminId);
                $this->execute();


            }catch(Exception $e)
            {
                echo $e->getMessage();
            }
        }

        public function getFoodOrders($adminId)
        {
            try
            {
                $query = "SELECT Food.foodName, Food.foodDesc, Food.FoodID, Food.foodPrice , Food.foodType ,Orders.userId FROM Orders 
                          RIGHT JOIN 
                          Food ON Food.FoodID = Orders.foodId WhERE Orders.adminId = :adminId";
                            
                
                $this->query($query);
                $this->bind(':adminId',$adminId);
                $i=0;
                while($row=$this->resultset())
                {
                    if($i<count($row))
                    {
                        yield $row[$i];
                        $i++;
                    }
                    else
                    {
                        return count($row);

                    }
                }

            }catch(Exception $e)
            {
                echo $e;
            }
                
        }
        
        public function readById($id)
        {
            try
            {
                $queryReadById = "SELECT * FROM Food WHERE FoodID=:FoodID";
                $this->query($queryReadById);
                $this->bind(':FoodID',$id);
                $row=$this->single();
                return $row;

            }catch(Exception $e)
            {
                echo $e;
            }
        }
   
   
   
   
   
    }

    


?>
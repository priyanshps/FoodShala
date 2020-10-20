<?php

    class User extends DBconnection
    {
        //Sign up user
        public function add($email,$password,$name,$address,$food)
        {
            try
            {
                //email	password	name	address
                $queryAdd = "INSERT INTO User(email,password,name,address,food) VALUES(:email,:password,:name,:address,:food)";
                
                $this->query($queryAdd);
                $this->bind(':email',$email);
                $this->bind(':password',$password);
                $this->bind(':name',$name);
                $this->bind(':address',$address);
                $this->bind(':food',$food);

                $this->execute();


            }catch(Exception $e)
            {
                echo $e;
            }
        }

        //login user
        public function readByEmail($email)
        {
            try
            {
                $queryReadByName = "SELECT * FROM User WHERE email=:email";
                $this->query($queryReadByName);
                $this->bind(':email',$email);
                $row=$this->single();
                return $row;

            }catch(Exception $e)
            {
                echo $e;
            }
        }
        public function readById($id)
        {
            try
            {
                $queryReadById = "SELECT * FROM User WHERE id=:id";
                $this->query($queryReadById);
                $this->bind(':id',$id);
                $row=$this->single();
                return $row;

            }catch(Exception $e)
            {
                echo $e;
            }
        }


        public function printFood()
        {
            try
            {
                $query="SELECT * FROM Food";
                $this->query($query);
            
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
                echo $e;
            }
        }

        

        //Add order 
    }

?>
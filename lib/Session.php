<!---This will work for login page in admin panel------>

<!----Sessions are a simple way to store data for individual users against a unique session ID.This can be used to persist state information between page requests. Session IDs are normally sent to the browser via session cookies and the ID is used to retrieve existing session data.------!--->

<?php

class Session
{
/// Session::init()//if you declare a static function you can initilize by scope resulation operator(::).directly with out creating object of class //---\\\
	public static function init()
	{
		session_start();
	}
	public static function set($key,$value)
	{
         $_SESSION[$key] = $value;//Here $value is assigned(catch the value) in side the $_SESSION[] global variable.//--\\\
	}
	///For using the value catched in $_SESSION[]

	public static function get($key)
	{
		if(isset($_SESSION[$key]))
		{
            return  $_SESSION[$key];
		}
		else
		{
               return false;
		}
	}
	//---\\\

	/// For checking that Login or not login 

	public static function checkSession()
	{
		self::init();///Calling the init() function by self key word because it is static method.//--\\\.();*//*This is used here for the starting this session function any where*/
        if(self::get("login") == false)
        {
              self::destroy();
              header("Location:login.php");
	}
        }
        ///For login in admin page
        public static function checkLogin()
       {
          self::init();//*This is used here for the starting this session function any where*/
       	if(self::get("login") == true)
       	{
             header("Location:index.php");
       	}
       }
       //--\\\*/
	
	///For destroying the session. For both font and back end
	public static function destroy()
	{
		/*self::init();*//*This is used here for the starting this session function any where*/
		session_destroy();
		if(Session::get("state") == '0') {
		header("Location:login.php");
	}
	else
	{
		header("Location:loginrenter.php");
	}
	}
	//--\\\
}
?>
<!------->

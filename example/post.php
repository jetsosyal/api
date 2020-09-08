<?php class Api
{
    public $api_url = 'https://panel.jetsosyal.com/api/v2'; // API URL

    public $api_key = ''; // API Key

	
	
    public function order($data) { // Create New Order
        $post = array_merge(array('key' => $this->api_key, 'action' => 'add'), $data);
        return json_decode($this->connect($post));
    }

    public function status($order_id) { // Check Order Status
        return json_decode($this->connect(array(
            'key' => $this->api_key,
            'action' => 'status',
            'order' => $order_id
        )));
    }

    public function services() { // Service List
        return json_decode($this->connect(array(
            'key' => $this->api_key,
            'action' => 'services'
        )));
    }

    public function balance() { // Check Balance
        return json_decode($this->connect(array(
            'key' => $this->api_key,
            'action' => 'balance'
        )));
    }


    private function connect($post) {
        $_post = Array();
        if (is_array($post)) {
            foreach ($post as $name => $value) {
                $_post[] = $name.'='.urlencode($value);
            }
        }

        $ch = curl_init($this->api_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        if (is_array($post)) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, join('&', $_post));
        }
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)');
        $result = curl_exec($ch);
        if (curl_errno($ch) != 0 && empty($result)) {
            $result = false;
        }
        curl_close($ch);
        return $result;
    }
}

// Examples

$api = new Api();

$services = $api->services(); # Services

$balance = $api->balance(); # Balance



// New Order

$order = $api->order(array('service' => 1, 'link' => $_POST["url"], 'quantity' => $_POST["adet"]));
?>

<!-- Interface Start -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<center><div class="card">
  <div class="card-header">
    Order Status <!-- Title -->
  </div>
  <script>
if ( window.history.replaceState ) {
window.history.replaceState( null, null, window.location.href );
}
</script>
  <div class="card-body">
    <h5 class="card-title">Your order created.</h5> <!-- Header Title -->
    <p class="card-text"><? echo $_POST["url"] ?> linkine <? echo $_POST["adet"] ?> adet takipçi siparişi oluşturulmuştur!</p> <!-- Link + Amount Text -->
    <p class="card-text"><code>Sayfayı yenilerseniz tekrar sipariş geçmez!</code></p> <!-- Warning Text -->


@foreach($a as $us)
  <?php
  $proof=$us->proof; ?>
  <img src="../../../ankitha/{{$proof }}" style="width:600px;height:800px;"/>
  @endforeach
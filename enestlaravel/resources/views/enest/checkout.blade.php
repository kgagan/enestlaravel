@include('enest/header')
		<div class="null">
			
		</div>
		<div class="main-categorious">
			<div class="footer">
			@include('enest/leftcommon')
				<div class="contact">
					<div class="contact-us">
						<p>Checkout</p>
					</div>
					<div class="dish-info">
						<div class="machine-info">
    <table class="tablepad" width="100%" border="2" align="center"  style="text-align:center;">
			      <tr> 
			        <th>ID</td>
			        <th>User name</td>
				    <th>Product name</td>
			        <th>Quantity</td>
			    </tr>
		@foreach($check as $c)
				<tr>
			     <td>{{$c->id}}</td>
				 <td>{{$c->fullname}}</td>
				 <td>{{$c->productname}}</td>
				 <td>{{$c->qty}}</td>
			  </tr>
		@endforeach
			  </table>
						
						</div>
					</div>
					
				</div>
				@include('enest/footer')
			</div>
		</div>
	</div>
    <style>
        .tablepad th{
            padding:15px;
        }
        .tablepad td{
            padding:10px;
        }
    </style>
</body>
</html>
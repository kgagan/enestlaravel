<div class="categorious">
	<div class="cate-heading">
	    <p>CATEGORIES</p>
	</div>
	<div class="items">
	    <ul>
          @foreach($category as $cat)
            <a href="{{url('/display-category/'.$cat->id)}}">
			<li>{{$cat->category_name}}</li>
            </a>
          @endforeach
		</ul>
    </div>
</div>
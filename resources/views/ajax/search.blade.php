@foreach ($items as $item)
			<li>
				<a href="{{ action('ProductController@show', $item->id) }}">
					<span class="name">{{ $item->name }}</span>
					<span class="price">{{ number_format($item->price) }} Đ</span>
				</a>
			</li>
@endforeach
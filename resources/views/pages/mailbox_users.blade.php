@foreach($conversations as $conversation_item)
<a href="{{ route('conversations.show', $conversation_item->id) }}">
	<div class="mail_content">
		<div class="advertisement_picture_container">
			<img src="{{ asset('img/advertisement.jpg') }}" alt="">
		</div>
		<div class="advertisement_content">
			<div class="seller_infos">
				<p>{{ $conversation_item->name }}</p>
				<img src="{{ asset('img/esf.png') }}" alt="">
			</div>
			<p class="title">
				{{ $conversation_item->name_ad }}
			</p>
			<p class="last_msg">{{ str_replace ( ':' , 'h' , substr($last_message->created_at, 11, -3)).' : '.$last_message->content}}</p>
		</div>
	</div>
</a>
	
@endforeach
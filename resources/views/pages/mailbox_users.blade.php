@foreach($conversations as $conversation_item)
<a href="{{ route('conversations.show', $conversation_item->id) }}">
	<div class="mail_content">
		<div class="advertisement_picture_container">
			<img src="{{ asset('img/advertisement.jpg') }}" alt="">
		</div>
		<div class="advertisement_content">
			<div class="seller_infos">
				<p>{{ $conversation_item->name }}
					@if(isset($unread[$conversation->to_id]))
						({{ $unread[$conversation->to_id] }})
					@endif
				</p>
				<img src="{{ asset('img/esf.png') }}" alt="">
			</div>
			<p class="title">Cours Snowboard / Courchevel 1850</p>
			<p class="last_msg">20h24 Vous : Oui bien sûr pas...</p>
		</div>
	</div>
</a>
	
@endforeach
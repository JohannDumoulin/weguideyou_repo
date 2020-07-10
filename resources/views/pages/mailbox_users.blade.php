@foreach($conversations as $conversation)

<a href="{{ route('conversations.show', $conversation->conv_id) }}">

	<div class="mail_content" id="{{ $conversation->conv_id }}">

		<div class="advertisement_content">
			<div class="seller_infos">
				{{-- <p>{{ $conversation->from_user_name }}</p> --}}
			</div>
			<p class="title">{{ $conversation->ad_name }}</p>

			@if($conversation->ad_salaire != null)
				<p class="price">{{ $conversation->ad_salaire }} €</p>
			@else
				<p class="price">{{ $conversation->ad_price }} €</p>
			@endif

			{{--
			<p class="last_msg">{{ str_replace ( ':' , 'h' , substr($last_message->created_at, 11, -3)).' : '.$last_message->content}}</p>
			--}}
		</div>
	</div>
</a>
	
@endforeach
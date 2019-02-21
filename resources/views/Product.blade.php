{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('type', 'Type:') !!}
			{!! Form::text('type') !!}
		</li>
		<li>
			{!! Form::label('name', 'Name:') !!}
			{!! Form::text('name') !!}
		</li>
		<li>
			{!! Form::label('provider_id', 'Provider_id:') !!}
			{!! Form::text('provider_id') !!}
		</li>
		<li>
			{!! Form::label('visibility', 'Visibility:') !!}
			{!! Form::text('visibility') !!}
		</li>
		<li>
			{!! Form::label('parent_id', 'Parent_id:') !!}
			{!! Form::text('parent_id') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}
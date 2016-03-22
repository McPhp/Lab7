<div class="row">

	{scheduleInfo}
	<div class="span12">
	{program}
	{year}
	{term}{set}
	</div>
	{/scheduleInfo}
	
	{courses}
	<div class = "span12">
		{name}{number}:
		{booking}
		<div class="span12">
		{type}
		{start} - {end}
		{room}		
		{building}
		
		{instructorLast}, {instructorFirst}
		</div>
		{/booking}
	</div>
	{/courses}
	
	
	{days}
	<div class = "span12">
	{day_of_the_week}
	{booking}
		<div class="span12">
		{course}:
		{type}
		{start}
		{end}
		{room}
		
		{building}
		
		{instructorLast}, {instructorFirst}
		</div>
	{/booking}
	</div>
	{/days}
	
	
	
	{timeslots}
	<div class = "span12">
	{start}
	{booking}
		<div class="span12">
		{course}:
		{type}
		{room}		
		{building}
		{instructorLast}, {instructorFirst}
		</div>
	{/booking}
	</div>
	{/timeslots}
	
</div>
    <div class="container" >
        <h3>Search
        <button id="dropDownBtn" onclick="changeSign()" type="button" data-toggle="collapse" data-target="#demo">-</button></h3>
        <form action="/welcome/search" method="post">
        <div id="demo" class="collapse in">
                <table class="table">
                    <tr>
                        <th>Day:</th>
                        <th>{alldays}</th>
                    </tr>
                    <tr>
                        <th>Time:</th>
                        <th>{alltimes}</th>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" name="submit" value="Search" />
                        </td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </form>
    </div>
    <div>
        <h4>{courseMsg}</h4>
        <h2>{bingo}</h2>
        <h6>{match}</h6>
    </div>


<div class="row">

	{scheduleInfo}
	<div>
            <h3>
	{program}
	{year}
	{term}{set}
            </h3>
	</div>
	{/scheduleInfo}
        
        {courses}
        <div class="container">
            <h2>Courses</h2>
            <h5>{name}{number}</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
						<th>Day</th>
                        <th>Type</th>
                        <th>Time</th>
                        <th>Room Number</th>
                        <th>Building</th>
                        <th>Teacher</th>
                    </tr>
                </thead>

                <tbody>
                
                {booking}
                    <tr>
			<td>{day}</td>
                        <td>{type}</td>
                        <td>{start} - {end}</td>
                        <td>{room}</td>
                        <td>{building}</td>
                        <td>{instructorLast}, {instructorFirst}</td>
                    </tr>
                </tbody>
                {/booking}
                
            </table>
        </div>
        {/courses}
        
        {days}
        <div class="container">
            <h2>Days</h2>
            <h5>{day_of_the_week}</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Course</th>
                        <th>Type</th>
                        <th>Time</th>
                        <th>Room</th>
                        <th>Building</th>
                        <th>Teacher</th>
                    </tr>
                </thead>

                <tbody>
                
                {booking}
                    <tr>
                        <td>{course}</td>
                        <td>{type}</td>
                        <td>{start} - {end}</td>
                        <td>{room}</td>
                        <td>{building}</td>
                        <td>{instructorLast}, {instructorFirst}</td>
                    </tr>
                </tbody>
                {/booking}
                
            </table>
        </div>
        {/days}      

        {timeslots}
        <div class="container">
            <h2>Time</h2>
            <h5>{start}</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Course</th>
			<th>Day</th>
                        <th>Type</th>
                        <th>Room</th>
                        <th>Building</th>
                        <th>Teacher</th>
                    </tr>
                </thead>

                <tbody>
                
                {booking}
                    <tr>
                        <td>{course}</td>
			<td>{day}</td>
                        <td>{type}</td>
                        <td>{room}</td>
                        <td>{building}</td>
                        <td>{instructorLast}, {instructorFirst}</td>
                    </tr>
                </tbody>
                {/booking}
                
            </table>
        </div>
        {/timeslots}	
</div>

<script>
function changeSign()
{
	var btn = document.getElementById("dropDownBtn");
	btn.innerHTML = btn.innerHTML == "-" ? "+" : "-";
}
</script>
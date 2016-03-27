    <div class="container" >
        <h3>Search
        <button type="button" data-toggle="collapse" data-target="#demo">-</button></h3>
        <form action="/welcome/search" method="post">
        <div id="demo" class="collapse in">
                <table class="table">
                    <tr>
                        <td>Day:</td>
                        <td>{alldays}</td>
                    </tr>
                    <tr>
                        <td>Time:</td>
                        <td>{alltimes}</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" name="submit" value="Search" />
                        </td>
                    </tr>
                </table>
            </div>
        </form>
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


<h1>This is simple Laravel Rest API example</h1>
<br/>
Database Schema is here: http://www.laravelsd.com/share/sCtwPh
<br/>
<h2>Goal:</h2>
The goal is to create a simple API that consists of three endpoints.

<br/>
<br/>
<p>1. A GET endpoint that returns the monthly price for broadband that:</p>
Accepts: Provider name, Product <br/>
Returns: Monthly price or failure message.<br/>
<br/>
<p>2. A GET endpoint for energy price that: </p>
Accepts:Provider name, Product, Product variation <br/>
Returns:Monthly price or failure message.<br/>
<br/>
<p>3. A PATCH endpoint that updates an energy price </p>
Accepts:Provider name, Product, Product variation, New Price <br/>
Returns:A success or failure message.<br/>
<br/>
<h2>API test case</h2>
<p>1. Get Broadband Price: http://localhost:8000/api/getBroadBandPrice (GET)</p>
<p>2. Get Energy Price: http://localhost:8000/api/getEnergyPrice (GET)</p>
<p>3. Update Energy Price: http://localhost:8000/api/saveEnergyPrice (PATCH)</p>

<h1>This is simple Laravel Rest API example</h1>
<br/>
Database Schema is here: http://www.laravelsd.com/share/sCtwPh
<br/>
<h2>Goal:</h2>
The goal is to create a simple API that consists of three endpoints.
<p>1. A GET endpoint that returns the monthly price for broadband that:</p>
Accepts:Provider name, Product Returns:Monthly price or failure message.<br/>
<p>2. A GET endpoint for energy price that: Accepts:Provider name, Product, Product variation Returns:Monthly price or failure message.</p>
<p>3. A PATCH endpoint that updates an energy price Accepts:Provider name, Product, Product variation, New Price Returns:A success or failure message.</p>

<h2>API test case</h2>
<p>1. Get Broadband Price: http://localhost:8000/api/getBroadBandPrice (GET)</p>
<p>2. Get Energy Price: http://localhost:8000/api/getEnergyPrice (GET)</p>
<p>3. Update Energy Price: http://localhost:8000/api/saveEnergyPrice (PATCH)</p>

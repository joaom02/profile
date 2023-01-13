<?php
require "../../utils/functions.php";
?>

<?=template_header('Create')?>

<script src="script.js"></script>

<body>
<label for="base_salary">Base Salary</label>
<input type="number" id="base_salary" placeholder="Enter Base Salary" required/>

<label for="meal_allowance">Meal Allowance</label>
<select name="meal_allowance" id="meal_allowance" required>
    <option value="no_allowance">No meal allowance</option>
    <option value="card">Meal Card</option>
    <option value="money">Money</option>
</select>

<label for="meal_allowance_amount">Meal Allowance Amount</label>
<input
        required
        type="number"
        id="meal_allowance_amount"
        placeholder="Enter Meal Allowance Amount"
        value="0"
        disabled
/>
<div>
    <label for="meal_days">How many days did you work?</label>
    <input
            required
            type="number"
            id="meal_days"
            placeholder="Enter Meal Days"
            value="0"
            disabled
    />
</div>

<button id="calculate">Calculate</button>

<p>Your gross salary is: <span id="gross_salary"></span></p>
<p>The taxes you pay are: <span id="taxes"></span></p>
<p>The ammout you receive as meal allowance: <span id="meal_allowance_value"></span></p>
<p>Meal allowance that is taxed: <span id="meal_allowance_taxed"></span></p>
<p>IRS tax: <span id="descontos_irs"></span></p>
<p>SS tax: <span id="descontos_ss"></span></p>
<p>Your net salary is: <span id="net_salary"></span></p>

<?=template_footer()?>

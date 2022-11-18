<div class="form-container">

<form class=" login-form"id="forma" action="" method="GET" >
    <h4 class="mb-3">Choose your options</h4>
    <div class="form-group mb-3">
        <label for="f2">City</label>

            <input type="text" name="address" class="fromto">
    </div>
    <div class="form-group">

        <label class="mb-2">House type</label>
        <div>
            <select class="form-select" name="type">
                <option disabled selected value="0">Type...</option>
                <option value="1">Flat</option>
                <option value="2">House</option>
            </select>
        </div>
    </div>
    <div class="form-group mb-3">
        <label class="mb-2">Room count</label>
        <div class="price-range">
            <label>From</label>
            <input type="number" name="from" class="fromto">
            <label>To</label>
            <input type="number" name="to" class="fromto">
        </div>
    </div>
    <div class="form-group mb-3">
        <label class="mb-2">Floor</label>
        <div class="price-range">
            <label>From</label>
            <input type="number" name="fromfloor" class="fromto">
            <label>To</label>
            <input type="number" name="tofloor" class="fromto">
        </div>
    </div>
    <div class="form-group">

        <label class="mb-2">Sort by</label>
        <div>
            <select class="form-select" name="sort">
                <option disabled selected value="0">Sort by...</option>
                <option value="1">Room count from lowest</option>
                <option value="2">Room count from highest</option>
                <option value="3">Name form a-z</option>
                <option value="4">Name from z-a</option>
            </select>
        </div>
    </div>

            <button type="submit" name="filter" class="btn-save mt-3 mb-3">Find</button>
        </form>

</div>

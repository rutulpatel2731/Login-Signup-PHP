$(document).ready(function () {
    $("#country").change(function () {
        var countryName = $(this).val()
        if (countryName == 'india') {
            $("#state").html(`
          <option value="" selected disabled>Please Select State</option>
          <option value="gujarat">Gujarat</option>
          <option value="rajasthan">Rajasthan</option>
          <option value="maharashtra">Maharashtra</option>
          <option value="uttarpradesh">Uttar Pradesh</option>
          `)
        } else if (countryName == 'usa') {
            $("#state").html(`
            <option value="" selected disabled>Please Select State</option>
            <option value="california">California</option>
            <option value="texas">Texas</option>
            <option value="georgia">Georgia</option>
            <option value="hawaii">Hawaii</option>
            `)
        }else{
            $("#state").html(`
            <option value="" selected disabled>Please Select State</option>`)
        }
        
        $("#city").html(`
            <option value="" selected disabled>Please Select City</option>`)
    })


    $("#state").change(function () {
        var stateName = $(this).val()
        console.log(stateName);
        if (stateName == 'gujarat') {
            $("#city").html(`<option value="" selected disabled>Please Select City</option>
               <option value="surat">Surat</option>
               <option value="ahmedabad">Ahmedabad</option>
               <option value="vadodara">Vadodara</option>
               <option value="rajkot">Rajkot</option>
               <option value="bhavnagar">Bhavnagar</option>
               <option value="jamnagar">Jamnagar</option>
               <option value="gandhinagar">Gandhinagar</option>
               <option value="junagadh">Junagadh</option>
               <option value="navsari">Navsari</option>
               <option value="bharuch">Bharuch</option>
             `)
        } else if (stateName == 'rajasthan') {
            $("#city").html(`
             <option value="" selected disabled>Please Select City</option>
               <option value="jaipur">Jaipur</option>
               <option value="jodhpur">Jodhpur</option>
               <option value="kota">Kota</option>
               <option value="bikaner">Bikaner</option>
               <option value="udaipur">Udaipur</option>
               <option value="ajmer	">Ajmer</option>
               <option value="bhilwara">Bhilwara</option>
               <option value="alwar">Alwar</option>
               <option value="sikar">Sikar</option>
               <option value="bharatpur	">Bharatpur</option>
             `)
        }else if(stateName == 'maharashtra'){
            $("#city").html(`
            <option value="" selected disabled>Please Select City</option>
              <option value="mumbai">Mumbai</option>
              <option value="pune">Pune</option>
              <option value="nagpur">Nagpur</option>
              <option value="thane">Thane</option>
              <option value="nashik">Nashik</option>
              <option value="kolhapur">Kolhapur</option>
              <option value="gondia">Gondia</option>
              <option value="hinganghat">Hinganghat</option>
            `)
        }else if(stateName == 'uttarpradesh'){
            $("#city").html(`
            <option value="" selected disabled>Please Select City</option>
              <option value="kanpur">Kanpur</option>
              <option value="lucknow">Lucknow</option>
              <option value="ghaziabad">Ghaziabad</option>
              <option value="agra">Agra</option>
              <option value="varanasi">Varanasi</option>
              <option value="prayagraj">Prayagraj</option>
              <option value="moradabad">Moradabad</option>
              <option value="saharanpur">Saharanpur</option>
            `)
        }else if(stateName == 'california'){
            $("#city").html(`
            <option value="" selected disabled>Please Select City</option>
            <option value="losangeles">Los Angeles</option>
            <option value="sandiego">San Diego</option>
            <option value="sanfrancisco">San Francisco</option>
            <option value="longbeach">Long Beach</option>
            `)
        }else if(stateName == 'texas'){
            $("#city").html(`
            <option value="" selected disabled>Please Select City</option>
            <option value="houston">Houston</option>
            <option value="sanantonio">San Antonio</option>
            <option value="lubbock">Lubbock</option>
            <option value="austin">Austin</option>
            `)
        }else if(stateName == 'georgia'){
            $("#city").html(`
            <option value="" selected disabled>Please Select City</option>
            <option value="atlanta">Atlanta</option>
            <option value="columbus">Columbus</option>
            <option value="lubbock">Lubbock</option>
            <option value="austin">Austin</option>
            `)
        }else if(stateName == 'hawaii'){
            $("#city").html(`
            <option value="" selected disabled>Please Select City</option>
            <option value="Waipahu">Waipahu</option>
            <option value="Kailua">Kailua</option>
            <option value="Kaneohe">Kaneohe</option>
            <option value="Kahului">Kahului</option>
            `)
        }
    })
})
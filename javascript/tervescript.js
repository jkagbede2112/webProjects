var vsqueuetype = "today";
var csqueuetype = "today";
var visitid;
var globalnewsvalue;
var rr = 0;
var os = 0;
var t = 0;
var sbp = 0;
var hr = 0;

var vsrok0 = "<span style='display:inline-block; padding:10px; background-color:#D0E9CF; text-align:left'>Encourage patient to remain calm enough to go through patient journey</span>";

var vsrok13 = "<span style='display:inline-block; padding:10px; background-color:#D0E9CF; text-align:left'>If Temp. parameter is >/= 38⁰C If there’s a \"Yes\" answered to any of the aforementioned symptom checklist;\n\
<ul><li>Conduct malaria test using RDT</li>\n\
<li>Conduct Widal test using RDT</li>\n\
<li>Registered nurse must assess the patient rapidly based on the positive symptoms recorded from the check list and document(Refer to head to toe nursing assessment below)</li>\n\
<li>Nurse positions patients in this category must be positioned by the nurse to see the doctor immediately after the patient in the consulting room is seen.</li></ul></span>";

var vsrok4 = "<div class='vsw' style='display:inline-block; padding:10px; text-align:left'>\n\
Requires immediate attention of the doctor (Nurse must ensure that patient is allowed to jump the waiting queue)<br>\n\
<b>NB: The doctor must set aside any current task to attend to this category of patients. For a PHC setting an urgent referral may be planned under way.</b>\n\
</div><input type='button' class='btn reset' value='Send to consultation immediately' onclick='sendpatientasap()'>";

var vsrok7 = "<div class='vsu' style='display:inline-block; padding:10px; text-align:left'>\n\
Requires immediate attention of the doctor (Nurse must ensure that patient is allowed to jump the waiting queue)<br>\n\
<b>NB: Emergency assessment by a clinical team with critical care competencies is required. For a PHC setting an urgent referral would be required.</b>\n\
</div><input type='button' class='btn reset' value='Send to consultation immediately' onclick='sendpatientasap()'>";

mailtoday();
maildailyreport();

function loadhomeUrl() {
    var win = window.open("http://tervecure.uberit.org", '_blank');
    win.focus();
}

function maildailyreport(){
    $.post("partials/senddr.php");
}

function mailtoday() {
    $.post("sendmailrn.php");
}

function getreportformodal(rType, rDate) {
    if (rType === "cir") {
        _v("modReportFDtitle").innerHTML = "<span style='font-size:20px'>Check-In Report</span><br>" + "<span style='font-size:12px'>" + rDate + "</span><br>";
        var action = "dashboardwaittimereport";
        var rDate = rDate;
        $.post("partials/wttracker.php", {action: action, rDate: rDate}).done(function (data) {
            _v("modReportFDBody").innerHTML = data;
        });
    }
}

function resetvitals() {
    _v("vssystolic").value = "";
    _v("vsdiastolic").value = "";
    _v("vsbp").innerHTML = "";
    _v("vsheight").value = "";
    _v("vsweight").value = "";
    _v("vsbmi").innerHTML = "";
    $("#vsbmi").removeClass("hwt");
    $("#vsbp").removeClass("hwt");
    _v("vsheartrate").value = "";
    _v("rep").innerHTML = "";
    _v("vstemperature").value = "";
    _v("vsoxygensat").value = "";
    _v("vsrespiration").value = "";
    resetnews();
}

function resetnews() {
    _v("rrneg3").innerHTML = "";
    _v("rrneg2").innerHTML = "";
    _v("rr0").innerHTML = "";
    _v("rr1").innerHTML = "";
    _v("rr2").innerHTML = "";
    _v("rr3").innerHTML = "";
    _v("osneg3").innerHTML = "";
    _v("osneg2").innerHTML = "";
    _v("osneg1").innerHTML = "";
    _v("os0").innerHTML = "";
    _v("tneg3").innerHTML = "";
    _v("tneg1").innerHTML = "";
    _v("t0").innerHTML = "";
    _v("t1").innerHTML = "";
    _v("t2").innerHTML = "";
    _v("sbpneg3").innerHTML = "";
    _v("sbpneg1").innerHTML = "";
    _v("sbp0").innerHTML = "";
    _v("sbp1").innerHTML = "";
    _v("sbp2").innerHTML = "";
    _v("hrneg3").innerHTML = "";
    _v("hrneg1").innerHTML = "";
    _v("hr0").innerHTML = "";
    _v("hr1").innerHTML = "";
    _v("hr2").innerHTML = "";
    //_v("vsu").innerHTML = "";
}

function newscalculator(field, value) {
    if (field === "rr") {
        _v("rrneg3").innerHTML = "";
        _v("rrneg2").innerHTML = "";
        _v("rr0").innerHTML = "";
        _v("rr1").innerHTML = "";
        _v("rr2").innerHTML = "";
        _v("rr3").innerHTML = "";
        if (value >= 25) {
            rr = 3;
            _v("rr3").innerHTML = value;
        }
        if (value >= 21 && value <= 24) {
            rr = 2;
            _v("rr2").innerHTML = value;
        }
        if (value >= 12 && value <= 20) {
            rr = 0;
            _v("rr0").innerHTML = value;
        }
        if (value >= 9 && value <= 11) {
            rr = 1;
            _v("rrneg1").innerHTML = value;
        }
        if (value <= 8) {
            rr = 3;
            _v("rrneg3").innerHTML = value;
        }
    }
    if (field === "os") {
        _v("osneg3").innerHTML = "";
        _v("osneg2").innerHTML = "";
        _v("osneg1").innerHTML = "";
        _v("os0").innerHTML = "";
        if (value >= 96) {
            os = 0;
            _v("os0").innerHTML = value;
        }
        if (value >= 94 && value <= 95) {
            os = 1;
            _v("osneg1").innerHTML = value;
        }
        if (value >= 92 && value <= 93) {
            os = 2;
            _v("osneg2").innerHTML = value;
        }
        if (value <= 91) {
            os = 3;
            _v("osneg3").innerHTML = value;
        }
    }
    if (field === "t") {
        _v("tneg3").innerHTML = "";
        _v("tneg1").innerHTML = "";
        _v("t0").innerHTML = "";
        _v("t1").innerHTML = "";
        _v("t2").innerHTML = "";
        if (value >= 39.1) {
            t = 2;
            _v("t2").innerHTML = value;
        }
        if (value >= 38.1 && value <= 39.0) {
            t = 1;
            _v("t1").innerHTML = value;
        }
        if (value >= 36.1 && value <= 38.0) {
            t = 0;
            _v("t0").innerHTML = value;
        }
        if (value >= 35.1 && value <= 36) {
            t = 1;
            _v("tneg1").innerHTML = value;
        }
        if (value <= 35) {
            t = 3;
            _v("tneg3").innerHTML = value;
        }
    }
    if (field === "sbp") {
        _v("sbpneg3").innerHTML = "";
        _v("sbpneg1").innerHTML = "";
        _v("sbp0").innerHTML = "";
        _v("sbp1").innerHTML = "";
        _v("sbp2").innerHTML = "";
        if (value >= 220) {
            sbp = 3;
            _v("sbpneg3").innerHTML = value;
        }
        if (value >= 111 && value <= 219) {
            sbp = 0;
            _v("sbp0").innerHTML = value;
        }
        if (value >= 101 && value <= 110) {
            sbp = 1;
            _v("sbp1").innerHTML = value;
        }
        if (value >= 91 && value <= 100) {
            sbp = 2;
            _v("sbp2").innerHTML = value;
        }
        if (value <= 90) {
            sbp = 3;
            _v("sbpneg3").innerHTML = value;
        }
    }
    if (field === "hr") {
        _v("hrneg3").innerHTML = "";
        _v("hrneg1").innerHTML = "";
        _v("hr0").innerHTML = "";
        _v("hr1").innerHTML = "";
        _v("hr2").innerHTML = "";
        if (value >= 131) {
            hr = 3;
            _v("hr3").innerHTML = value;
        }
        if (value >= 111 && value <= 130) {
            hr = 2;
            _v("hr2").innerHTML = value;
        }
        if (value >= 91 && value <= 110) {
            hr = 1;
            _v("hr1").innerHTML = value;
        }
        if (value >= 51 && value <= 90) {
            hr = 0;
            _v("hr0").innerHTML = value;
        }
        if (value >= 41 && value <= 50) {
            hr = 1;
            _v("hrneg1").innerHTML = value;
        }
        if (value <= 40) {
            hr = 3;
            _v("hrneg3").innerHTML = value;
        }
    }
    globalnewsvalue = hr + sbp + t + os + rr;
    _v("newsscore").innerHTML = globalnewsvalue;
    if (globalnewsvalue === 0) {
        _v("vitalsreporttable").innerHTML = vsrok0;
        $("#miniconsultbtn").show();
    }
    if (globalnewsvalue >= 1 && globalnewsvalue <= 3) {
        _v("vitalsreporttable").innerHTML = vsrok13;
        $("#miniconsultbtn").show();
    }
    if (globalnewsvalue >= 4 && globalnewsvalue <= 6) {
        _v("vitalsreporttable").innerHTML = vsrok4;
        $("#miniconsultbtn").hide();
    }
    if (globalnewsvalue >= 7) {
        _v("vitalsreporttable").innerHTML = vsrok7;
        $("#miniconsultbtn").hide();
    }
}

function checkvsvalues(a) {

}

function pullaveragewaittime() {
    var action = "averagewaittime";
    $.post("partials/wttracker.php", {action: action}).done(function (data) {
        _v("wttoday").innerHTML = data;
    });
}

function pullvsqueue(a) {
    vsqueuetype = a;
    var ds = "#pull" + a;
    $.post("partials/pullqueue.php", {queuetype: a, action: 'vitalsqueue'}).done(function (data) {
        _v("vsqueuet").innerHTML = data;
    });
    $(".bt").removeClass("bts");
    $(ds).addClass("bts");
}

function pullbillclient(a) {
    var action = "pullclients";
    var categoryid = a;
    $.post("partials/clientbilling.php", {action: action, categoryid: categoryid}).done(function (data) {
        _v("clientm").innerHTML = data;
    });
}

function pullscclient(a) {
    _v("scclientplan").innerHTML = "";
    var action = "pullclients";
    var categoryid = a;
    $.post("partials/clientbilling.php", {action: action, categoryid: categoryid}).done(function (data) {
        _v("scclient").innerHTML = data;
    });
}

function searchpatient(a, b) {
    var action = "search";
    var fieldname = a;
    var value = b;
    $.post("partials/patientregister.php", {action: action, fieldname: fieldname, value: value}).done(function (data) {
        _v("searchResult").innerHTML = data;
    });
}

function searchbillpatient(a, b) {
    var action = "search";
    var fieldname = a;
    var value = b;
    $.post("partials/billingprocessor.php", {action: action, fieldname: fieldname, value: value}).done(function (data) {
        _v("searchbillResult").innerHTML = data;
    });
}

function checkout(a) {
    var action = "checkout";
    $.post("partials/patientregister.php", {action: action, visitid: a}).done(function (data) {
        notifier(data, 5000);
    });
    waittimecheck();
}

function pullbillfor(a) {
    var action = "billspread";
    $.post("partials/billingprocessor.php", {action: action, hospitalid: a}).done(function (data) {
        _v("billingtable").innerHTML = data;
    });
}

function changepaymenu(a) {
    var menu = "#" + a + "s";
    $("#paymenttimelines").hide();
    $("#makepayments").hide();

    if (a === "paymenttimeline") {
        var visitid = _v("innervisitid").innerHTML;
        var action = "pullpayment";
        $.post("partials/billingprocessor.php", {action: action, visitid: visitid}).done(function (data) {
            _v("paymenttimelines").innerHTML = data;
        });
    }

    $(menu).show();
}

function makepayments(a, b, c) {
    var visitid = a;
    //var amounttopay = c;
    var amounttopay = _v("amtlefttopay").innerHTML;
    var amountpaying = b;
    //billamounttopay
    if (c.length < 1) {
        alert("Amount not entered");
        return;
    }
    var action = "savepayment";
    $.post("partials/billingprocessor.php", {action: action, visitid: visitid, amounttopay: amounttopay, amountpaying: amountpaying}).done(function (data) {
        alert(data);
    });
}

function pullextradetails(a) {
    var action = "pullfulldets";
    var hospitalid = a;
    $.post("partials/patientregister.php", {action: action, hospitalid: hospitalid}).done(function (data) {
        _v("checkindets").innerHTML = data;
    });
}

//pullextrabilldetails("1423/ad/3")

function pullextrabilldetails(a) {
    var action = "pullbilldets";
    var hospitalid = a;
    _v("billingtable").innerHTML = "";
    $.post("partials/billingprocessor.php", {action: action, hospitalid: hospitalid}).done(function (data) {
        _v("checkbilldets").innerHTML = data;
    });
}

function checkin(a) {
    var action = "checkin";
    var hospitalid = a;
    $.post("partials/patientregister.php", {action: action, hospitalid: hospitalid}).done(function (data) {
        _v("serverdump").innerHTML = data;
        waittimecheck();
    });
}

function waittimecheck() {
    var action = "pulltoday";
    $.post("partials/wttracker.php", {action: action}).done(function (data) {
        _v("waittimetable").innerHTML = data;
    });
}

function pullinputtype() {
    var servicename = _v("scservice");
    var servicetext = servicename.options[servicename.selectedIndex].text;
    _v("servicedets").innerHTML = servicetext;
}

function addbill() {
    var servicename = _v("scservice");
    var servicetext = servicename.options[servicename.selectedIndex].text;
    //scclientplan
    var plan = _v("scclientplan");
    var cplan = plan.options[plan.selectedIndex].text;

    if (cplan === "Private" && servicetext === "labinvestigation") {
        _v("servicedets").innerHTML = "Hi there.. We are pulling records from laboratory for private patients";
    }

    if (cplan === "corporate" && servicetext === "labinvestigation") {
        _v("servicedets").innerHTML = "Hi there.. We are pulling records from laboratory for corporate patients";
    } else {
        _v("servicedets").innerHTML = "Hi there. We cannot process this request" + cplan + " - " + servicetext;
    }



}

/*
 function pullscclient(a){
 var action = "pullplan";
 var categoryid = a;
 $.post("partials/clientbilling.php", {action: action, categoryid: categoryid}).done(function (data) {
 _v("scclient").innerHTML = data;
 });
 }
 */

function pullscplan(a) {
    var action = "pullpayplan";
    var categoryid = a;
    $.post("partials/clientbilling.php", {action: action, paynameid: categoryid}).done(function (data) {
        _v("scclientplan").innerHTML = data;
    });
}

function generaterCode() {
    var action = "genCode";
    $.post("partials/pharmacy.php", {action: action}).done(function (data) {
        _v("codeServerResponse").innerHTML = data;
    });
}

function activaterestock(code) {
    if (code.length < 5) {
        alert("Invalid code");
        return;
    }
    var action = "activaterestock";
    $.post("partials/pharmacy.php", {code: code, action: action}).done(function (data) {
        if (data === "1") {
            alert("Re-stock code is now active");
        }
        if (data === "0") {
            alert("Re-stock code could not be processed");
        } else {
            alert(data);
        }
    });
}

function pullmovement(drugid) {
    //alert(drugid);
    _v("modReportFDtitle").innerHTML = "Drug movement ";

    $.post("partials/pharmacy.php", {action: "pullthisdrugusage", drugid: drugid}).done(function (data) {
        _v("modReportFDBody").innerHTML = data;
    });
}

function seldrgMenu(a, b) {
    $("#drgoptru").hide();
    $("#drgoptod").hide();
    $(a).show();
    $(".drgMenu").removeClass("drgMenuSel");
    $(b).addClass("drgMenuSel");
}

function rstkQty(a, b, c) {
    if (a.length < 1) {
        alert("No restock");
        return;
    }
    _v(b).innerHTML = "...";
    var action = "restockdrugs";
    $.post("partials/pharmacy.php", {action: action, drugid: c, qtytoadd: a}).done(function (data) {
        _v(b).innerHTML = data;
    });
}

function prescribedrugs(a) {
    visitid = a;
    $("#consultationpane").show(100);
    $.post("partials/consulting.php", {action: "pulldets", visitid: a}).done(function (data) {
        var audio = new Audio('chime/consultqueue.mp3');
        //audio.play();
        document.getElementById("traigedetails").innerHTML = data;
    });
    //pullprescription(a);
    $("#triagequeue").hide(200);
    $("#navmenuitems").slideDown(200);
    //consultvitals(a);
    //consultallergieslist();
    //hideconsultationqueue();
}

function pullpharmaqueue(a) {
    vsqueuetype = a;
    var ds = "#pull" + a;
    $.post("partials/pullqueue.php", {queuetype: a, action: 'pharmaqueue'}).done(function (data) {
        _v("vsqueuet").innerHTML = data;
    });
    $(".bt").removeClass("bts");
    $(ds).addClass("bts");
}

function addc() {
    var action = "add";
    var fn = _v("clfirstname").value;
    var lm = _v("cllastname").value;
    var dob = _v("cldateofbirth").value;
    var ms = _v("clmaritalstatus").value;
    var g = _v("clgender").value;
    var pn = _v("clphonenumber").value;
    var ea = _v("clemailaddress").value;
    var o = _v("cloccupation").value;
    var hid = _v("clhospitalid").value;
    //next of kin information
    var nokn = _v("clnokname").value;
    var noka = _v("clnokaddress").value;
    var nokp = _v("clnokphone").value
    var nokr = _v("clnokrelationship").value;
    //Payment plan information
    var pc = _v("clpaycategory").value;
    var pnn = _v("clpayname").value;
    var plan = _v("clpayplan").value;
    $.post("partials/patientregister.php", {action: action, fn: fn, lm: lm, dob: dob, ms: ms, g: g, pn: pn, ea: ea, o: o, hid: hid, nokn: nokn, noka: noka, nokr: nokr, pc: pc, nokp: nokp, pc:pc, pnn: pnn, plan: plan}).done(function (data) {
        notifier(data, 10000);
    });

    var skillsSelect = document.getElementById("clpaycategory");
    var billclienttype = skillsSelect.options[skillsSelect.selectedIndex].text;

    var clregtype = _v("clregtype").value;

    var regtyp = document.getElementById("clregtype");
    var regtype = regtyp.options[regtyp.selectedIndex].text;
    //Get category and plan too.
    //
    //We have visitid/hospid(hid), paymentcategory(pc), payplan(plan), item(clregtype), amount, subitem(nil), staffid(this from sessional variable), paystatus(0)
    computeregbill(hid, pc, plan, clregtype);
}

function computeregbill(hid, pc, plan, clregtype) {
    var action = "registration";
    var payname = _v("clpayname").value;
    $.post("partials/billingprocessor.php", {action: action, hid: hid, pc: pc, plan: payname, clregtype: clregtype}).done(function (data) {
        alert(data);
    });
}

function docvitalsmenu(a, b) {
    $("#vitalsreading").hide();
    $("#redovitals").hide();
    $("#allergiesdisp").hide();
    $(b).show();
    $(".vitalsminimenu").removeClass("vitalsminimenusel");
    $(a).addClass("vitalsminimenusel");
}

function orderinv(item) {
    var hospid = _v("hospid").innerHTML;
    var visitid = _v("visitidgt").innerHTML;
    if (visitid.length < 1) {
        notifier("Visit ID not found", 10000);
        var audio = new Audio('chime/bad.mp3');
        audio.play();
        return;
    }
    if (item.length < 1) {
        notifier("Select an investigation", 10000);
        var audio = new Audio('chime/bad.mp3');
        audio.play();
        return;
    }
    $.post("partials/consulting.php", {action: "orderinvestigation", visitid: visitid, invid: item}).done(function (data) {
        notifier(data, 10000);
        var audio = new Audio('chime/saved.mp3');
        audio.play();
    });
    loadinvs();
    var action = "labinvestigation";
    var qty = 1;
    //item is investigation id
    computebill(hospid, visitid, action, item, qty);
    loadinvs();
}

function sendtolab(a) {
    var action = "orderinvestigation";
    $.post("partials/investigationreq.php", {action: action, visitid: a}).done(function (data) {
        if (data === "yes") {
            var msg = "Investigations ordered";
            notifier(msg, 10000);
            var audio = new Audio('chime/saved.mp3');
            audio.play();
        } else {
            var msg = "Investigations not ordered";
            notifier(msg, 10000);
            var audio = new Audio('chime/bad.mp3');
            audio.play();
        }
    });
}

function pullcsqueue(a) {
    csqueuetype = a;
    var ds = "#pull" + a;
    $.post("partials/pullqueue.php", {queuetype: a, action: 'consultationqueue'}).done(function (data) {
        _v("csqueuet").innerHTML = data;
    });
    $(".bt").removeClass("bts");
    $(ds).addClass("bts");
}

function pulllabqueue(a) {
    csqueuetype = a;
    var ds = "#pull" + a;
    $.post("partials/pullqueue.php", {queuetype: a, action: 'investigationqueue'}).done(function (data) {
        _v("labqueuet").innerHTML = data;
    });
    $(".bt").removeClass("bts");
    $(ds).addClass("bts");
}

function miniconsultmenu(a, b) {
    $("#miniinvestigation").hide();
    $("#miniprescription").hide();
    $(b).show();
    $(".vitalsminimenu").removeClass("vitalsminimenusel");
    $(a).addClass("vitalsminimenusel");
}

function addcomplaint(a, b, c) {
    if (a.length < 1) {
        notifier("Complain name not registered", 3000);
        //Close pharmacy queue
        var audio = new Audio('chime/bad.mp3');
        audio.play();
        return;
    }
    if (b.length < 1) {
        notifier("Complain duration not registered", 3000);
        //Close pharmacy queue
        var audio = new Audio('chime/bad.mp3');
        audio.play();
        return;
    }
    var visitid = _v("visitidgt").innerHTML;
    if (visitid.length < 1) {
        notifier("Complaint not registered. Cannot find visit ID", 3000);
        //Close pharmacy queue
        var audio = new Audio('chime/bad.mp3');
        audio.play();
        return;
    }
    var complaint = a;
    var duration = b;
    var history = c;
    var action = "addcomplaint";
    $.post("partials/consulting.php", {visitid: visitid, action: action, complaint: complaint, duration: duration, history: history}).done(function (data) {
        if (data === "Saved") {
            notifier(a + " saved", 3000);
            var audio = new Audio('chime/saved.mp3');
            audio.play();
            getcomplain();
        } else {
            notifier(data, 5000);
            var audio = new Audio('chime/bad.mp3');
            audio.play();
        }
    });
    getcomplain();
}

function pulldrugs() {
    var action = "pulldrugs";
    $.post("partials/pharmacy.php", {action: action}).done(function (data) {
        _v("drugsdisplay").innerHTML = data;
    });
}

function selectdrug(a) {
    var drugid = a;
    var action = "pullprescribeddrugs";
    $.post("partials/pharmacy.php", {drugid: drugid, action: action}).done(function (data) {
        _v("pulleddrgdets").innerHTML = data;
    });
}

function pulldrugsincat(a) {
    var catid = a;
    var action = "drugsincat";
    $.post("partials/pharmacy.php", {catid: catid, action: action}).done(function (data) {
        _v("classeddrug").innerHTML = data;
    });
}

function savedrug() {
    var category = _v("pcat").value;
    var brandname = _v("pbname").value;
    var genname = _v("pgname").value;
    var privateprice = _v("pprivprice").value;
    var corpprice = _v("pcorpprice").value;
    var stockcount = _v("pcount").value;
    var reorderlevel = _v("prlevel").value;
    var action = "savedrug";
    if (category.length < 1 || brandname.length < 1 || genname.length < 1 || privateprice.length < 1 || corpprice.length < 1 || stockcount.length < 1 || reorderlevel.length < 1) {
        alert("All fields are mandatory");
        return;
    }
    //return;
    $.post("partials/pharmacy.php", {action: action, category: category, brandname: brandname, genname: genname, privateprice: privateprice, corpprice: corpprice, stockcount: stockcount, reorderlevel: reorderlevel}).done(function (data) {
        //alert(data);
    });
    pulldrugs();
}

function reginvrez(a, b) {
    var result = a;
    var reqid = b;
    var action = "logresult";
    $.post("partials/investigationreq.php", {action: action, result: result, rezid: reqid}).done(function (data) {
        notifier(data, 3000);
        //Close pharmacy queue
        var audio = new Audio('chime/saved.mp3');
        audio.play();
    });
    invmenu('#docinvestigations', '#docinvestigationsm');
}

function pullpayname(b) {
    var catvalue = b;
    var action = "pullpayname";

    $.post("partials/clientbilling.php", {action: action, catvalue: catvalue}).done(function (data) {
        _v("clpayname").innerHTML = data;
    });
}

function saveclientplan(a, b, c) {
    var clienttypeid = a;
    var clientnameid = b;
    var clientplan = c;

    $.post("partials/clientbilling.php", {action: "saveclientplan", clientnameid: clientnameid, clientplan: clientplan}).done(function (data) {
        alert(data);
    });
}

function pullpayplan(a) {
    var paynameid = a;
    var action = "pullpayplan";
    $.post("partials/clientbilling.php", {action: action, paynameid: paynameid}).done(function (data) {
        _v("clpayplan").innerHTML = data;
    });
}

function notifier(message, timeframe) {
    $("#notifier").show();
    _v("messagehere").innerHTML = message;
    shutoffnotifier(timeframe);
}

function shutoffnotifier(time) {
    setTimeout(function () {
        $("#notifier").hide();
    }, time);
}

function resulthere(a, b, c) {
    var invid = a;
    var labid = _v(c).innerHTML;
    var action = "getoiforrez";
    $.post("partials/investigationreq.php", {invid: a, labid: labid, action: action}).done(function (data) {
        _v("rezinputhere").innerHTML = data;
    });
}

function invmenu(a, b) {
    $("#docinvestigationsm").hide();
    $("#docvitalsm").hide();
    $(b).show();
    $(".vitalsminimenu").removeClass("vitalsminimenusel");
    $(a).addClass("vitalsminimenusel");

    if (a === "#docvitals") {
        var hospitalid = _v("hospid").innerHTML;
        $.post("partials/investigationreq.php", {hospitalid: hospitalid, action: 'pull'}).done(function (data) {
            _v("allknownallergies").innerHTML = data;
        });
    }

    if (a === "#docinvestigations") {
        var visitid = _v("visitidgt").innerHTML;
        $.post("partials/investigationreq.php", {visitid: visitid, action: 'pullorder'}).done(function (data) {
            _v("orderedtests").innerHTML = data;
        });
    }
}

consultmenu('#doclastvisits', '#doclastvisitsm');

function deletediag(a) {
    alert("Delete function not enabled");
}

function reportProblem() {
    _v("modReportFDtitle").innerHTML = "Report EMR Issue";
    _v("modReportFDBody").innerHTML = "<div id='reportperson' style='font-size:18px; margin-bottom:5px'><span id='reportingofficer'></span></div><input type='text' class='form-control' placeholder='Subject' id='rptSubject'><textarea class='form-control' id='rptMessage' rows='3' placeholder='Write complain/suggestion here' style='margin-top:5px; margin-bottom:5px; resize: none;'></textarea><input type='button' class='btn btn-success' value='Send message' onclick='sndReport(rptSubject.value, rptMessage.value)'><span id='serverfeedback' style='margin-left:10px'></span>";
}

function sndReport(a, b) {
    //alert(a + " - " + b);
    if (a.length < 1 || b.length < 1) {
        _v("serverfeedback").innerHTML = "<span style='color:red'>Fill in subject and message first</span>";
        return;
    }
    _v("serverfeedback").innerHTML = "Processing...";
    var action = "mailissues";
    $.post("partials/sndMessage.php", {subject: a, message: b, action: action}).done(function (data) {
        _v("serverfeedback").innerHTML = data;
    });
}

function consultmenu(a, b) {
    $("#doclastvisitsm").hide();
    $("#docvitalsm").hide();
    $("#doccomplaintsm").hide();
    $("#docpexamsm").hide();
    $("#docinvestigationsm").hide();
    $("#docdiagnosism").hide();
    $("#docprescriptionm").hide();
    $(b).show();
    $(".vitalsminimenu").removeClass("vitalsminimenusel");
    $(a).addClass("vitalsminimenusel");

    if (a === "#doclastvisits") {
        var hospitalid = _v("hospid").innerHTML;
        $.post("partials/consulting.php", {hospitalid: hospitalid, action: 'pullvisits'}).done(function (data) {
            _v("doclastvisitsm").innerHTML = data;
        });
    }

    if (a === "#docvitalsm") {
        var hospitalid = _v("hospid").innerHTML;
        $.post("partials/consulting.php", {hospitalid: hospitalid, action: 'pullallergieslist'}).done(function (data) {
            _v("allknownallergies").innerHTML = data;
        });
    }
    //consultationcomplain
    if (a === "#doccomplaints") {
        getcomplain();
    }

    if (a === "#docpexamsm") {
        loadge();
    }

    if (a === "#docdiagnosism") {
        //getcomplain();
        var visitid = _v("visitidgt").innerHTML;
        pulldiagnosis(visitid);
    }

    if (a === "#docvitalsm") {
        var hospitalid = _v("hospid").innerHTML;
        $.post("partials/consulting.php", {hospitalid: hospitalid, action: 'pullallergieslist'}).done(function (data) {
            _v("allknownallergies").innerHTML = data;
        });
    }

    if (a === "#docinvestigationsm") {
        loadinvs();
    }

    if (a === "#docprescriptionm") {
        pullreqsts();
        _v("drgdose").value = "";
        _v("drgusage").value = "";
        _v("drgdays").value = "";
    }
}

function addstaff() {
    var fname = _v("nrfirstname").value;
    var lname = _v("nrlastname").value;
    var dob = _v("nrdateofbirth").value;
    var ms = _v("nrmaritalstatus").value;
    var gender = _v("nrgender").value;
    var phone = _v("nrphonenumber").value;
    var role = _v("nrrole").value;
    var username = _v("nrusername").value;
    var password = _v("nrpassword").value;

    if (fname.length < 1) {
        alert("First name is a required field");
        return;
    }
    if (lname.length < 1) {
        alert("Last name is a required field");
        return;
    }
    if (dob.length < 1) {
        alert("Date of birth is a required field");
        return;
    }

    if (phone.length < 1) {
        alert("Phone number is a required field");
        return;
    }

    if (role.length < 1) {
        alert("Select role");
        return;
    }

    if (username.length < 1) {
        alert("Username is a required field");
        return;
    }

    if (password.length < 1) {
        alert("Password is a required field");
        return;
    }

    $.post("partials/adminmodule.php", {action: "addstaff", fname: fname, lname: lname, dob: dob, ms: ms, gender: gender, phone: phone, role: role, username: username, password: password}).done(function (data) {
        notifier(data, 3000);
        //Close pharmacy queue
        var audio = new Audio('chime/saved.mp3');
        audio.play();
    });
}

function loadstaff() {
    $.post("partials/adminmodule.php", {action: "loadstaff"}).done(function (data) {
        _v("stafftable").innerHTML = data;
    });
}

function deleteinvestigation(a) {
    notifier("Delete investigation request is WIP", 3000);
    //Close pharmacy queue
    var audio = new Audio('chime/saved.mp3');
    audio.play();
}

function loadinvs() {
    var visitid = _v("visitidgt").innerHTML;
    if (visitid.length < 1) {
        alert("Visit ID not found");
        return;
    }
    $.post("partials/consulting.php", {action: "loadinvestigations", visitid: visitid}).done(function (data) {
        _v("orderedinvs").innerHTML = data;
    });
}

function getcomplain() {
    var visitid = _v("visitidgt").innerHTML;
    //alert(visitid);
    $.post("partials/consulting.php", {visitid: visitid, action: 'loadcomplains'}).done(function (data) {
        //alert(data);
        _v("consultationcomplain").innerHTML = data;
    });
}

function changemenu(a, b) {
    $("#dashboard").hide();
    $("#registration").hide();
    $("#checkin").hide();
    $("#setting").hide();
    $(".okk").removeClass("okks");
    $(a).addClass("okks");
    $(b).show();
}

function deletecomplain(a, b) {
    var b = "Delete  " + b + " complain?";
    _v("buttonshere").innerHTML = "<span class='btn reset' onclick='deletecomplainyes(" + a + ")'>Yes</span>";
    notifier(b, 3000);
    var audio = new Audio('chime/saved.mp3');
    audio.play();
    //document.getElementById("consultinfo").innerHTML = data;
    getcomplain();
}

function deletecomplainyes(a) {
    _v("buttonshere").innerHTML = "";
    $.post("partials/consulting.php", {action: "removecomplain", complainid: a}).done(function (data) {
        notifier(data, 3000);
        var audio = new Audio('chime/saved.mp3');
        audio.play();
        getcomplain();
    });

}

function waittimechecks() {
    var action = "dashboardwaittime";
    $.post("partials/wttracker.php", {action: action}).done(function (data) {
        _v("dashwaittime").innerHTML = data;
    });
}

function registerallergy(a, b) {
    var action = "registerallergy";
    $.post("partials/consulting.php", {action: action, hospitalid: b, allergy: a}).done(function (data) {
        //alert(data);
        if (data === "saved") {
            _v("allknownallergies").innerHTML += "<span class='algy'>" + a + "</span>";
            notifier(a + " allergy saved.", 3000);
            var audio = new Audio('chime/saved.mp3');
            audio.play();
        } else {
            notifier(a + " allergy not saved. May have saved earlier", 3000);
            var audio = new Audio('chime/bad.mp3');
            audio.play();
        }
    });
}

function starttriage(a) {
    resetvitals();
    resetnews();
    $.post("partials/triaging.php", {action: "begintriage", visitid: a}).done(function (data) {
        document.getElementById("traigedetails").innerHTML = data;
    });
    $("#vitalsignsmenu").show();
    hidetriagequeue();
}

function startconsultation(a) {
    visitid = a;
    $("#consultationpane").show(100);
    $.post("partials/consulting.php", {action: "pulldetsforconsultation", visitid: a}).done(function (data) {
        //alert(data);
        var audio = new Audio('chime/consultqueue.mp3');
        audio.play();
        document.getElementById("consultinfo").innerHTML = data;
    });
    consultmenu('#doclastvisits', '#doclastvisitsm');
    consultvitals(a);
    consultallergieslist();
    hideconsultationqueue();
}

function selectpharmapatient(a) {
    visitid = a;
    $("#consultationpane").show(100);
    $.post("partials/consulting.php", {action: "pulldets", visitid: a}).done(function (data) {
        var audio = new Audio('chime/consultqueue.mp3');
        //audio.play();
        document.getElementById("traigedetails").innerHTML = data;
    });
    pullprescription(a);
    $("#triagequeue").hide(200);
    $("#navmenuitems").slideDown(200);
    //consultvitals(a);
    //consultallergieslist();
    //hideconsultationqueue();
}

function enddispensary(a) {
    $.post("partials/pharmacy.php", {visitid: a, action: "enddispensary"}).done(function (data) {
        notifier(data, 3000);
        //Close pharmacy queue
        var audio = new Audio('chime/saved.mp3');
        audio.play();
    });
}

function dispenseall(a) {
    notifier("This is not functional yet.. Check the drugs one at a time.", 3000);
    var audio = new Audio('chime/saved.mp3');
    audio.play();

}

function pullprescription(a) {
    visitid = a;
    $("#consultationpane").show(100);
    $.post("partials/pharmacy.php", {action: "pullprescription", visitid: a}).done(function (data) {
        //alert(data);
        var audio = new Audio('chime/consultqueue.mp3');
        //audio.play();
        document.getElementById("vitalsignsform").innerHTML = data;
    });
}

function consultallergies() {
    var hospid = _v("hospid").innerHTML;
    $.post("partials/consulting.php", {action: "pullallergiesitemised", hospid: hospid}).done(function (data) {
        //alert(data);
        document.getElementById("allergyitemised").innerHTML = data;
    });
}

function consultallergieslist() {
    var hospid = _v("hospid").innerHTML;
    $.post("partials/consulting.php", {action: "pullallergieslist", hospid: hospid}).done(function (data) {
        //alert(data);
        document.getElementById("allknownallergies").innerHTML = data;
    });
    consultallergies();
}

function consultvitals(a) {
    $.post("partials/consulting.php", {action: "pullvitals", visitid: a}).done(function (data) {
        //alert(data);
        document.getElementById("vitalsreading").innerHTML = data;
    });
}

function showtriagequeue() {
    $("#triagequeue").show(100);
}

function sendpatientasap() {
    var systolic = _v("vssystolic").value;
    var diastolic = _v("vsdiastolic").value;
    var height = _v("vsheight").value;
    var weight = _v("vsweight").value;
    var temperature = _v("vstemperature").value;
    var heartrate = _v("vsheartrate").value;
    var oxygenrate = _v("vsoxygensat").value;
    var respirationrate = _v("vsrespiration").value;
    var visitid = _v("visitidgt").innerHTML;
    //check vitals and save first
    if (visitid.length < 1) {
        notifier("Select patient from queue first", 3000);
        var audio = new Audio('chime/bad.mp3');
        audio.play();
    }

    if (temperature.length < 1) {
        notifier("Temperature value not set", 3000);
        var audio = new Audio('chime/saved.mp3');
        audio.play();
        return;
    }
    if (heartrate.length < 1) {
        notifier("Heart rate values not set", 3000);
        var audio = new Audio('chime/saved.mp3');
        audio.play();
        return;
    }
    if (oxygenrate.length < 1) {
        notifier("Oxygen rate values not set", 3000);
        var audio = new Audio('chime/saved.mp3');
        audio.play();
        return;
    }
    if (respirationrate.length < 1) {
        notifier("Respiration rate values not set", 3000);
        var audio = new Audio('chime/saved.mp3');
        audio.play();
    }
    $.post("partials/triaging.php", {visitid: visitid, action: "sendASAP", sys: systolic, dias: diastolic, h: height, w: weight, t: temperature, hr: heartrate, or: oxygenrate, rr: respirationrate}).done(function (data) {
        //alert(data);
        notifier(data, 3000);
        var audio = new Audio('chime/saved.mp3');
        audio.play();
    });
}

function takevitalsigns() {
    var systolic = _v("vssystolic").value;
    var diastolic = _v("vsdiastolic").value;
    var height = _v("vsheight").value;
    var weight = _v("vsweight").value;
    var temperature = _v("vstemperature").value;
    var heartrate = _v("vsheartrate").value;
    var oxygenrate = _v("vsoxygensat").value;
    var respirationrate = _v("vsrespiration").value;
    var visitid = _v("visitidgt").innerHTML;

    if (visitid.length < 1) {
        notifier("Select patient from queue first", 3000);
        //Close pharmacy queue
        var audio = new Audio('chime/bad.mp3');
        audio.play();
    }

    if (temperature.length < 1) {
        notifier("Temperature value not set", 3000);
        var audio = new Audio('chime/saved.mp3');
        audio.play();
        return;
    }
    if (heartrate.length < 1) {
        notifier("Heart rate values not set", 3000);
        var audio = new Audio('chime/saved.mp3');
        audio.play();
        return;
    }
    if (oxygenrate.length < 1) {
        notifier("Oxygen rate values not set", 3000);
        var audio = new Audio('chime/saved.mp3');
        audio.play();
        return;
    }
    if (respirationrate.length < 1) {
        notifier("Respiration rate values not set", 3000);
        var audio = new Audio('chime/saved.mp3');
        audio.play();
        return;
    }
    //Send these details now to the backend for save.
    $.post("partials/triaging.php", {visitid: visitid, action: "notevitals", sys: systolic, dias: diastolic, h: height, w: weight, t: temperature, hr: heartrate, or: oxygenrate, rr: respirationrate}).done(function (data) {
        //alert(data);
        notifier(data, 3000);
        var audio = new Audio('chime/saved.mp3');
        audio.play();
    });
}

function trcheckcore() {
    var st = _v("trst").value;
    var ed = _v("tred").value;
    var sn = _v("trsn").value;
    var bd = _v("trbd").value;
    var h = _v("trh").value;
    var sr = _v("trsr").value;
    var j = _v("trj").value;

    if (st === "Yes" || ed === "Yes" || sn === "Yes" || bd === "Yes" || h === "Yes" || sr === "Yes" || j === "Yes") {
        $("#miniconsultbtn").hide();
        $("#docsights").hide();
    } else {
        $("#miniconsultbtn").show();
        $("#docsights").show();
    }
}

function computebp(a, b) {
    if (a > 250 || a < 20) {
        data = "Systolic value out of range";
        notifier(data, 5000);
        _v("vssystolic").value = "";
        return;
    }

    if (b.length > 0) {
        if (b > 150 || b < 20) {
            data = "Diastolic value out of range";
            notifier(data, 5000);
            _v("vsdiastolic").value = "";
            return;
        }
    }

    $("#vsbp").removeClass("hwt");
    _v("vsbp").innerHTML = a + "/" + b;
    if (a < 60 && b < 60 || a > 140 && b > 90) {
        $("#vsbp").addClass("hwt");
    }
    newscalculator("sbp", a);
}

function loadge() {
    var visitid = _v("visitidgt").innerHTML;
    var action = "loadge";
    $.post("partials/consulting.php", {visitid: visitid, action: action}).done(function (data) {
        _v("gepourout").innerHTML = data;
    });
    loadse(visitid);
}

function loadse(a) {
    var action = "loadse";
    var visitid = _v("visitidgt").innerHTML;
    $.post("partials/consulting.php", {visitid: visitid, action: action}).done(function (data) {
        _v("sepourout").innerHTML = data;
    });
}

function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
}

function triagereportin() {
    var visitid = _v("visitidgt").innerHTML;
    var hospid = _v("hospid").innerHTML;
    var st = _v("trst").value;
    var ed = _v("tred").value;
    var sn = _v("trsn").value;
    var bd = _v("trbd").value;
    var h = _v("trh").value;
    var sr = _v("trsr").value;
    var j = _v("trj").value;
    var hf = _v("trhf").value;
    var ha = _v("trha").value;
    var v = _v("trv").value;
    var ap = _v("trap").value;
    var d = _v("trd").value;
    var loa = _v("trloa").value;
    var mc = _v("trmc").value;
    if (st.length < 1 || ed.length < 1 || sn.length < 1 || bd.length < 1 || h.length < 1 || sr.length < 1 || j.length < 1 || hf.length < 1 || ha.length < 1) {
        notifier("Fill all vital signs fields first", 5000);
        return;
    }
    $.post("partials/triaging.php", {action: "triagereport", visitid: visitid, st: st, ed: ed, sn: sn, bd: bd, h: h, sr: sr, j: j, hf: hf, ha: ha, v: v, ap: ap, d: d, loa: loa, mc: mc}).done(function (data) {
        notifier(data, 10000);
    });

    var billaction = "consultation";
    var itemid = "triagesave";
    var qty = 1;
    computebill(hospid, visitid, billaction, itemid, qty);
}



function computebmi(a, s) {
    $("#vsbmi").removeClass("hwt");
    if (a.length < 1 || s.length < 1) {
        return;
    }
    var rez = s / (a * a);
    var rez = rez.toFixed(2);
    if (rez < 18.5) {
        _v("vsbmi").innerHTML = rez;
        _v("rep").innerHTML = "U.W";
        $("#vsbmi").addClass("hwt");
    }
    if (rez >= 18.5 && rez < 24.9) {
        _v("vsbmi").innerHTML = rez;
        _v("rep").innerHTML = "Norm";
        $("#vsbmi").removeClass("hwt");
    }
    if (rez >= 25 && rez < 29.9) {
        _v("vsbmi").innerHTML = rez;
        $("#vsbmi").addClass("hwt");
        _v("rep").innerHTML = "O.W";
    }
    if (rez > 30) {
        _v("vsbmi").innerHTML = rez;
        $("#vsbmi").addClass("hwt");
        _v("rep").innerHTML = "Ob";
    }
}

function dispensedrug(a, b) {
    var drugname = b;
    var visitid = _v("visitidgt").innerHTML;
    $.post("partials/pharmacy.php", {drugid: a, action: "dispensedrug", visitid: visitid}).done(function (data) {
        _v(b).innerHTML = data;
    });
}

function hidetriagequeue() {
    $("#triagequeue").hide(100);
}

function inventorymenu(a, b) {
    $("#vitalsignsforms").hide();
    $("#triagereportsforms").hide();
    $("#newsreports").hide();
    $("#triagecharts").hide();
    $("#turnoverdisps").hide();
    $("#allergiesdisps").hide();
    $(b).show();
    $(".vitalsminimenu").removeClass("vitalsminimenusel");
    $(a).addClass("vitalsminimenusel");
}

function triagemenu(a, b) {
    $("#vitalsignsform").hide();
    $("#triagereportsform").hide();
    $("#newsreport").hide();
    $("#triagechart").hide();
    $("#allergiesdisp").hide();
    $("#makeprescription").hide();
    $(b).show();
    $(".vitalsminimenu").removeClass("vitalsminimenusel");
    $(a).addClass("vitalsminimenusel");

    if (b === "#triagereportsform") {
        /*
         var winloc = window.location.href;
         if (winloc === "http://localhost/terveCure/pharmacy.php" || winloc === "localhost/terveCure/pharmacy.php") {
         var hospitalid = _v("hospid").innerHTML;
         var action = "medicationhistory";
         $.post("partials/consulting.php", {action: action, hospitalid: hospitalid}).done(function (data) {
         notifier(data, 5000);
         });
         }
         */
    }

    if (b === "#triagechart") {
        //alert("We have engaged triage button");

        var hospid = _v("hospid").innerHTML;
        /*
         $.post("partials/vitalsrange.php", {hospid: hospid}).done(function (data) {
         _v("triagechart").innerHTML = data;
         });
         */
        $("#triagechart").load("triagechart.php?hospid=" + hospid + "");
    }

    if (b === "#newsreport") {
        var hospitalid = _v("hospid").innerHTML;
        $.post("partials/consulting.php", {hospitalid: hospitalid, action: 'pullvisits'}).done(function (data) {
            _v("newsreport").innerHTML = data;
        });
    }

}

function _v(e) {
    return document.getElementById(e);
}

function prescribedrgbyoharm() {
    var visitid = _v("visitidgt").innerHTML;
    var hospid = _v("hospid").innerHTML;

    var usage = _v("calcedduse").innerHTML;
    var drugid = _v("drgidi").innerHTML;
    var action = "makedrugrequest";

    //drugdose, drgusage, drgdays
    var drgdose = _v("drgdose").value;
    var drgusage = _v("drgusage").value;
    var drgdays = _v("drgdays").value;

    //Drugs requested
    var rqdrugs = drgdose * drgusage * drgdays;

    if (visitid.length < 1) {
        notifier("VID not found", 3000);
        var audio = new Audio('chime/bad.mp3');
        audio.play();
        return;
    }
    if (drugid.length < 1) {
        notifier("Drug not selected", 3000);
        var audio = new Audio('chime/bad.mp3');
        audio.play();
        return;
    }
    if (usage.length < 1 || rqdrugs.length < 1) {
        notifier("enter all fields for dosage", 3000);
        var audio = new Audio('chime/bad.mp3');
        audio.play();
        return;
    }
    $.post("partials/pharmacy.php", {action: action, visitid: visitid, usage: usage, drugid: drugid, drugcount: rqdrugs}).done(function (data) {
        alert(data);
    });

    //pullreqsts();
    var actiond = "pharmacyprescription";
    //hospid, visitid, action, itemid, qty
    computebill(hospid, visitid, actiond, drugid, rqdrugs);
    pullreqstsph();
}

function pullreqstsph() {
    var visitid = _v("visitidgt").innerHTML;
    var action = "getallprescribedph";
    $.post("partials/pharmacy.php", {action: action, visitid: visitid}).done(function (data) {
        _v("rqstddrg").innerHTML = data;
    });
}


//Consultation functions
function prescribedrg() {
    var visitid = _v("visitidgt").innerHTML;
    var hospid = _v("hospid").innerHTML;

    var usage = _v("calcedduse").innerHTML;
    var drugid = _v("drgidi").innerHTML;
    var action = "makedrugrequest";

    //drugdose, drgusage, drgdays
    var drgdose = _v("drgdose").value;
    var drgusage = _v("drgusage").value;
    var drgdays = _v("drgdays").value;

    //Drugs requested
    var rqdrugs = drgdose * drgusage * drgdays;

    if (visitid.length < 1) {
        notifier("VID not found", 3000);
        var audio = new Audio('chime/bad.mp3');
        audio.play();
        return;
    }
    if (drugid.length < 1) {
        notifier("Drug not selected", 3000);
        var audio = new Audio('chime/bad.mp3');
        audio.play();
        return;
    }
    if (usage.length < 1 || rqdrugs.length < 1) {
        notifier("enter all fields for dosage", 3000);
        var audio = new Audio('chime/bad.mp3');
        audio.play();
        return;
    }
    $.post("partials/pharmacy.php", {action: action, visitid: visitid, usage: usage, drugid: drugid, drugcount: rqdrugs}).done(function (data) {
        alert(data);
    });

    //pullreqsts();
    var actiond = "pharmacyprescription";
    //hospid, visitid, action, itemid, qty
    computebill(hospid, visitid, actiond, drugid, rqdrugs);
    pullreqsts();
}

function computebill(hospid, visitid, action, itemid, qty) {
    //visitid, plancategory, client, clientplan,
    //plancategory e.g Private/HMO/NHIS/Corporate
    //client e.g Hygeia(HMO), Private(private), NHIS
    //clientplan e.g Hygeia silver, Hygeia gold etc
    //action e.g consultation, pharmacy, investigation
    $.post("partials/billingprocessor.php", {action: action, visitid: visitid, hospid: hospid, itemid: itemid, rqdrugs: qty}).done(function (data) {
        if (data.length < 0) {
            alert(data);
        } else {

        }
        alert(data);
    });
}

function pullreqsts() {
    var visitid = _v("visitidgt").innerHTML;
    var action = "getallprescribed";
    $.post("partials/pharmacy.php", {action: action, visitid: visitid}).done(function (data) {
        _v("rqstddrg").innerHTML = data;
    });
}

function calcdrgs() {
    var dose = _v("drgdose").value;
    var use = _v("drgusage").value;
    var days = _v("drgdays").value;
    _v("calceddrugs").innerHTML = dose * use * days;
    _v("calcedduse").innerHTML = dose + " x " + use + " x " + days;
}

function removeprescription(a) {
    var drugid = a;
    var visitid = _v("visitidgt").innerHTML;
    alert(drugid + " " + visitid + " This is not done yet");
}

function sendtopharmacy() {
    var visitid = _v("visitidgt").innerHTML;
    var action = "sendtopharmacyqueue";
    $.post("partials/pharmacy.php", {visitid: visitid, action: action}).done(function (data) {
        notifier(data, 3000);
        var audio = new Audio('chime/saved.mp3');
        audio.play();
    });
}

function endconsultation() {
    var visitid = _v("visitidgt").innerHTML;
    var action = "endconsultation";
    $.post("partials/pharmacy.php", {visitid: visitid, action: action}).done(function (data) {
        notifier(data, 3000);
        var audio = new Audio('chime/saved.mp3');
        audio.play();
    });
}
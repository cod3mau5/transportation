$(document).ready(function () {

    function executeRequestDestination(a, b) {
        var c = {
            area: $("#inpArea option:selected").val(),
            area_name: $("#inpArea option:selected").text(),
            destination: $("#inpRegister").val(),
            mode: "normal",
            action: "destinationAdd",
        };
        if (
            null == c.destination ||
            0 == c.destination.length ||
            /^\s+$/.test(c.destination)
        )
            return $("#inpRegister").focus(), !1;
        if (0 == c.area) return $("#inpArea").focus(), !1;
        if (((c.overwrite = "overwrite" == a ? 1 : 0), "airbnb" == b)) {
            if (
                ((c.mode = "airbnb"),
                (c.contact = $("#inpContact").val()),
                (c.email = $("#inpEmail").val()),
                (c.phone = $("#inpNumberPhone").val()),
                null == c.contact ||
                    0 == c.contact.length ||
                    /^\s+$/.test(c.contact))
            )
                return $("#inpContact").focus(), !1;
            if (!/\w+([-+.']\w+)*@\w+([-.]\w+)/.test(c.email))
                return $("#inpEmail").focus(), !1;
            if (null == c.phone || 0 == c.phone.length || /^\s+$/.test(c.phone))
                return $("#inpNumberPhone").focus(), !1;
        }
        $.ajax({
            data: c,
            url: "/handlers/hdl-resorts.php",
            type: "post",
            beforeSend: function () {
                $("#btnRegisterHotel").attr("disabled", "disabled");
            },
            success: function (a) {
                $("#btnRegisterHotel").removeAttr("disabled");
                var b = $.parseJSON(a);
                if (404 == b.code) {
                    $("#model-title").text("We find coincidences"),
                        $("#model-message").text(
                            "Dear user, we have found the following coincidences between your destination and those we already have, please check if your destination is any of the following:"
                        );
                    for (var c = "", d = 0; d < b.coincidence.length; d++)
                        c +=
                            "<li><strong>" +
                            b.coincidence[d].destination +
                            "</strong><span>" +
                            b.coincidence[d].area +
                            "</span></li>";
                    $("#model-list-coincidence").html(c),
                        $(".overwrite, #model-cancel").fadeIn("last");
                }
                200 == b.code &&
                    (swal({
                        title: "Thank you for your collaboration",
                        text: "We appreciate your collaboration, having the most possible destinations will allow us to provide a better service for all our visitors.",
                        type: "success",
                        html: !0,
                        showConfirmButton: !1,
                    }),
                    setTimeout(function () {
                        location.href = "/destinations";
                    }, 5e3));
            },
        });
    }
    var emtApp = {
        path: window.location.protocol + "//" + window.location.hostname + "/",
        urlocation: window.location,
    };
    $(".finder-hotel").on("keyup", function (e) {
        if (13 == e.keyCode) {
            var hotelFinder = $(this).val(),
                spinner = '<img src="/src/searching-services.gif" width="75">';
            $(".cards-hotels").html(spinner);
            var data = {
                hotelFinder: $(this).val(),
                areaFinder: $(this).data("area"),
            };
            console.log(data),
                $.ajax({
                    data: data,
                    url: emtApp.path + "handlers/hdl-resorts.php",
                    type: "post",
                    success: function (data) {
                        var res = eval("(" + data + ")");
                        res.error &&
                            $(".cards-hotels").html(
                                "<strong class='notfound'>Sorry we couldn't find a match with</strong>"
                            );
                        var render = "";
                        res.forEach(function (a) {
                            (render += '<div class="card-item">'),
                                (render += ' <div class="card">'),
                                (render +=
                                    '     <a href="' +
                                    a.urlResort +
                                    '" title="Cancun Airport Transportation to ' +
                                    a.Hotel +
                                    '">'),
                                (render +=
                                    '         <i class="fas fa-concierge-bell"></i>'),
                                (render +=
                                    "         <span>" + a.Hotel + "</span>"),
                                (render += "     </a>"),
                                (render += " </div>"),
                                (render += "</div>");
                        }),
                            $(".cards-hotels").html(render);
                    },
                });
        }
    }),
        "/" == emtApp.urlocation.pathname,
        $(".is-overlay i").on("click", function () {
            $(".is-overlay").fadeOut("last");
        }),
        $(".covidDiploma").on("click", function (a) {
            a.preventDefault(), $(".isCovidDiplome").fadeIn("last");
        }),
        $(".isCovidDiplome .isClose").on("click", function () {
            $(".isCovidDiplome").fadeOut("last");
        }),
        $(".itemAcordeon").on("click", function () {
            $(".boxRateForService").css("height", "55px"),
                $(this).parent().parent().css("height", "100%"),
                $("body, html").animate(
                    { scrollTop: $(this).parent().parent().offset().top },
                    600
                );
        }),
        $(".bubbleButtonPrices").on("click", function (a) {
            a.preventDefault(),
                $("body, html").animate(
                    { scrollTop: $($(this).attr("href")).offset().top },
                    600
                );
        }),
        // $(".inp-man-eventdate").datepicker({
        //     minDate: "+2d",
        //     defaultDate: "+1w",
        //     dateFormat: "yy-mm-dd",
        //     numberOfMonths: 1,
        // }),
        $("body").on("click", ".optionView", function () {
            return (
                (emtApp.listview = $(this).data("view")),
                $(".boxOptionView i").removeClass("currentView"),
                $(this).stop(!0).addClass("currentView"),
                "list" == emtApp.listview
                    ? ($(".itemServiceSale").stop(!0).removeClass("gridView"),
                      !1)
                    : "grid" == emtApp.listview
                    ? ($(".itemServiceSale").stop(!0).addClass("gridView"), !1)
                    : void 0
            );
        }),
        (emtApp.screenWidth = $(document).width()),
        $(window).on("scroll", function () {
            if (emtApp.screenWidth > 959) {
                emtApp.scrollPoint = $(this).scrollTop();
                var a = $(".box-start-booking");
                return (
                    emtApp.scrollPoint >= 135
                        ? (a.addClass("persistBooking"),
                          a.hasClass("is-bookhome") &&
                              a.hasClass("is-relative") &&
                              a.removeClass("is-relative") &&
                              // agregaremnos un padding top al body
                              $("body").css("padding-top", "139.77px")
                         )
                        : (a.removeClass("persistBooking"),
                          a.hasClass("is-bookhome") &&
                              a.addClass("is-relative") &&
                              $("body").css("padding-top", "0px")),
                    !1
                );
            }
        }),
        (emtApp.mobileNavigation = !1),
        $(".mobileLanguageOptions").hide(),
        $(".burgerNavIcon").on("click", function () {
            var a = $(".menu li").length;
            if (0 == emtApp.mobileNavigation) {
                var b = 42 * a;
                return (
                    $(".menu").css("height", "" + b + "px"),
                    $(this).removeClass("fa-navicon").addClass("fa-close"),
                    $(".mobileLanguageOptions").fadeIn("last"),
                    (emtApp.mobileNavigation = !0),
                    !1
                );
            }
            return 1 == emtApp.mobileNavigation
                ? ($(".menu").css("height", "0px"),
                  $(this).removeClass("fa-close").addClass("fa-navicon"),
                  $(".mobileLanguageOptions").fadeOut("last"),
                  (emtApp.mobileNavigation = !1),
                  !1)
                : void 0;
        }),
        $(".widgetServicePage form").hide(),
        $(".widgetServicePage form.viewed").show(),
        $(".widgetServicePage .tabs a").on("click", function (a) {
            a.preventDefault(),
                $(".widgetServicePage .tabs a").removeClass("current"),
                $(this).addClass("current");
            var b = $(this).attr("href");
            $(".widgetServicePage form")
                .removeClass("viewed")
                .stop(!0)
                .fadeOut("last"),
                $("" + b)
                    .addClass("viewed")
                    .stop(!0)
                    .fadeIn("last");
        }),
        $(".privateServiceControlPax").on("change", function () {
            var service = "private",
                pax = $(".privateServiceControlPax option:selected").val();
            $.ajax({
                data: {
                    servicePaxControlRates: pax,
                    serviceControlRates: service,
                },
                url: emtApp.path + "handlers/hdl-rates.php",
                type: "post",
                success: function (data) {
                    var prices = eval("(" + data + ")");
                    $("#cunc_ow").html(
                        prices[0].a1.price.ow + " <small>USD</small>"
                    ),
                        $("#cunc_rt").html(
                            prices[0].a1.price.rt + " <small>USD</small>"
                        ),
                        $("#cunz_ow").html(
                            prices[1].a2.price.ow + " <small>USD</small>"
                        ),
                        $("#cunz_rt").html(
                            prices[1].a2.price.rt + " <small>USD</small>"
                        ),
                        $("#islm_ow").html(
                            prices[10].a12.price.ow + " <small>USD</small>"
                        ),
                        $("#islm_rt").html(
                            prices[10].a12.price.rt + " <small>USD</small>"
                        ),
                        $("#plam_ow").html(
                            prices[7].a9.price.ow + " <small>USD</small>"
                        ),
                        $("#plam_rt").html(
                            prices[7].a9.price.rt + " <small>USD</small>"
                        ),
                        $("#purm_ow").html(
                            prices[4].a5.price.ow + " <small>USD</small>"
                        ),
                        $("#purm_rt").html(
                            prices[4].a5.price.rt + " <small>USD</small>"
                        ),
                        $("#plac_ow").html(
                            prices[2].a3.price.ow + " <small>USD</small>"
                        ),
                        $("#plac_rt").html(
                            prices[2].a3.price.rt + " <small>USD</small>"
                        ),
                        $("#coz_ow").html(
                            prices[6].a8.price.ow + " <small>USD</small>"
                        ),
                        $("#coz_rt").html(
                            prices[6].a8.price.rt + " <small>USD</small>"
                        ),
                        $("#ptoa_ow").html(
                            prices[3].a4.price.ow + " <small>USD</small>"
                        ),
                        $("#ptoa_rt").html(
                            prices[3].a4.price.rt + " <small>USD</small>"
                        ),
                        $("#aku_ow").html(
                            prices[9].a11.price.ow + " <small>USD</small>"
                        ),
                        $("#aku_rt").html(
                            prices[9].a11.price.rt + " <small>USD</small>"
                        ),
                        $("#tul_ow").html(
                            prices[5].a7.price.ow + " <small>USD</small>"
                        ),
                        $("#tul_rt").html(
                            prices[5].a7.price.rt + " <small>USD</small>"
                        );
                },
            });
        }),
        $(".container-tabsdestinations .content .box").hide(),
        $(".container-tabsdestinations .content .currentShow").show(),
        $(".container-tabsdestinations .navigation li").on(
            "click",
            function () {
                var a = $(this).data("canvas");
                $(".container-tabsdestinations .navigation li").removeClass(
                    "current"
                ),
                    $(this).addClass("current"),
                    $(".container-tabsdestinations .content .box")
                        .stop(!0)
                        .fadeOut("last"),
                    setTimeout(function () {
                        $("#" + a)
                            .stop(!0)
                            .fadeIn("last");
                    }, 3);
                var b = $(window).width();
                767 > b &&
                    $(".container-tabsdestinations .navigation ul").animate(
                        { height: "37px" },
                        500
                    );
            }
        ),
        $(".privateControlPax").on("change", function () {
            var destination = $(
                    ".destinationControlPrices option:selected"
                ).val(),
                pax = $(".privateControlPax option:selected").val();
            $.ajax({
                data: { areaPrivatePrice: destination, paxPrivatePrice: pax },
                url: emtApp.path + "handlers/hdl-rates.php",
                type: "post",
                success: function (data) {
                    var prices = eval("(" + data + ")");
                    $("#privateOW").html(
                        prices[0]["private"].price.ow + " <small>USD</small>"
                    ),
                        $("#privateRT").html(
                            prices[0]["private"].price.rt +
                                " <small>USD</small>"
                        );
                },
            });
        }),
        $(".destinationControlPrices").on("change", function () {
            var destination = $(
                    ".destinationControlPrices option:selected"
                ).val(),
                pax = $(".privateControlPax option:selected").val();
            $.ajax({
                data: { areaGeneralPrice: destination, paxGeneralPrice: pax },
                url: emtApp.path + "handlers/hdl-rates.php",
                type: "post",
                success: function (data) {
                    var prices = eval("(" + data + ")");
                    $(".boxPrice strong").html(""),
                        parseInt(prices[0]["private"].price.ow) > 0
                            ? ($("#privateOW").html(
                                  prices[0]["private"].price.ow +
                                      " <small>USD</small>"
                              ),
                              $("#privateRT").html(
                                  prices[0]["private"].price.rt +
                                      " <small>USD</small>"
                              ))
                            : $("#privateOW, #privateRT").html("N/A"),
                        parseInt(prices[1].luxury.price.ow) > 0
                            ? ($("#luxuryOW").html(
                                  prices[1].luxury.price.ow +
                                      " <small>USD</small>"
                              ),
                              $("#luxuryRT").html(
                                  prices[1].luxury.price.rt +
                                      " <small>USD</small>"
                              ))
                            : $("#luxuryOW, #luxuryRT").html("N/A"),
                        parseInt(prices[2].handicap.price.ow) > 0
                            ? ($("#handicapOW").html(
                                  prices[2].handicap.price.ow +
                                      " <small>USD</small>"
                              ),
                              $("#handicapRT").html(
                                  prices[2].handicap.price.rt +
                                      " <small>USD</small>"
                              ))
                            : $("#handicapOW, #handicapRT").html("N/A"),
                        parseInt(prices[3].group.price.ow) > 0
                            ? ($("#groupOW").html(
                                  prices[3].group.price.ow +
                                      " <small>USD</small>"
                              ),
                              $("#groupRT").html(
                                  prices[3].group.price.rt +
                                      " <small>USD</small>"
                              ))
                            : $("#groupOW, #groupRT").html("N/A"),
                        null != prices[4] &&
                        parseInt(prices[4].chrysler.price.ow)
                            ? ($("#chryslerOW").html(
                                  prices[4].chrysler.price.ow +
                                      " <small>USD</small>"
                              ),
                              $("#chryslerRT").html(
                                  prices[4].chrysler.price.rt +
                                      " <small>USD</small>"
                              ))
                            : $("#chryslerOW, #chryslerRT").html("N/A"),
                        null != prices[4] &&
                        parseInt(prices[5].suburban.price.ow) > 0
                            ? ($("#suburbanOW").html(
                                  prices[5].suburban.price.ow +
                                      " <small>USD</small>"
                              ),
                              $("#suburbanRT").html(
                                  prices[5].suburban.price.rt +
                                      " <small>USD</small>"
                              ))
                            : $("#suburbanOW, #suburbanRT").html("N/A");
                },
            });
        }),
        $("#inpGetLetter").on("click", function (a) {
            a.preventDefault();
            var b = {
                le_invoice: $("#inpInvoice").val(),
                le_email: $("#inpEmail").val(),
            };
            return /\w+([-+.']\w+)*@\w+([-.]\w+)/.test(b.le_email)
                ? null == b.le_invoice ||
                  0 == b.le_invoice.length ||
                  /^\s+$/.test(b.le_invoice)
                    ? ($("#inpInvoice").addClass("required").focus(), !1)
                    : void $.ajax({
                          data: b,
                          url: emtApp.path + "helpers/hLetters.php",
                          type: "post",
                          beforeSend: function () {
                              $("#inpGetLetter").attr("disabled", "disabled");
                          },
                          success: function (a) {
                              $("#letterReservation").html(a),
                                  $("#inpGetLetter").removeAttr("disabled"),
                                  $(".optionsLetter").fadeIn("last");
                          },
                      })
                : ($("#inpEmail").addClass("required").focus(), !1);
        }),
        $("#printLetter").on("click", function (a) {
            a.preventDefault();
            var b = window.open(" ", "popimpr");
            b.document.write($("#letterReservation").html()),
                b.document.close(),
                b.print(),
                b.close();
        }),
        $("#ticket-boucher").hide(),
        $("#buttonDownload").on("click", function () {
            event.preventDefault();
            var a = window.open(" ", "popimpr");
            a.document.write($("#ticket-boucher").html()),
                a.document.close(),
                a.print(),
                a.close();
        }),
        $(".getItNowTours").on("click", function (a) {
            a.preventDefault(),
                $("body, html").animate(
                    { scrollTop: $($(this).attr("href")).offset().top + 50 },
                    600
                );
        }),
        "/" == emtApp.urlocation.pathname &&
            (console.log("Home"), $("#dataBlogAjax").load("/posts.php")),
        $(".mastertabs-tourpage .canvas article").hide(),
        $(".mastertabs-tourpage .canvas article.current").show(),
        $(".mastertabs-tourpage .tabs a").on("click", function (a) {
            a.preventDefault();
            var b = $(this).attr("href");
            $(".mastertabs-tourpage .tabs a").removeClass("current"),
                $(this).addClass("current"),
                $(".mastertabs-tourpage .canvas article")
                    .stop(!0)
                    .slideUp("last"),
                $(".mastertabs-tourpage .canvas article" + b)
                    .stop(!0)
                    .slideDown("last");
        }),
        $(".btnAffiliateMe").on("click", function (a) {
            a.preventDefault();
            var b = $(this).attr("href");
            $("html, body").animate({ scrollTop: $(b).offset().top }, 1e3),
                $("#contact").focus();
        }),
        $("#btnRegisterAffiliate").on("click", function (a) {
            a.preventDefault();
            var b = {
                contact: $("#fullname").val(),
                email: $("#email").val(),
                phone: $("#phone").val(),
                website: $("#website").val(),
                agency: $("#agency").val(),
                paypalaccount: $("#paypalaccount").val(),
                country: $("#country").val(),
                state: $("#state").val(),
                city: $("#city").val(),
                parentId: null,
                action: "register",
                language: $(this).data("site"),
                captcha: grecaptcha.getResponse(),
            };
            return null == b.contact ||
                0 == b.contact.length ||
                /^\s+$/.test(b.contact)
                ? ($("#fullname").addClass("required").focus(), !1)
                : /\w+([-+.']\w+)*@\w+([-.]\w+)/.test(b.email)
                ? null == b.phone ||
                  0 == b.phone.length ||
                  /^\s+$/.test(b.phone)
                    ? ($("#phone").addClass("required").focus(), !1)
                    : null == b.agency ||
                      0 == b.agency.length ||
                      /^\s+$/.test(b.agency)
                    ? ($("#agency").addClass("required").focus(), !1)
                    : null == b.country ||
                      0 == b.country.length ||
                      /^\s+$/.test(b.country)
                    ? ($("#country").addClass("required").focus(), !1)
                    : null == b.state ||
                      0 == b.state.length ||
                      /^\s+$/.test(b.state)
                    ? ($("#state").addClass("required").focus(), !1)
                    : null == b.city ||
                      0 == b.city.length ||
                      /^\s+$/.test(b.city)
                    ? ($("#city").addClass("required").focus(), !1)
                    : ($("#parent").length && (b.parentId = $("#parent").val()),
                      void $.ajax({
                          data: b,
                          url: "/handlers/hdl-affiliates.php",
                          type: "post",
                          beforeSend: function () {
                              $("#btnRegisterAffiliate").attr(
                                  "disabled",
                                  "disabled"
                              );
                          },
                          success: function (a) {
                              $("#btnRegisterAffiliate").removeAttr("disabled");
                              var b = $.parseJSON(a);
                              swal({
                                  title: b.title,
                                  text: b.message,
                                  type: b.codetype,
                                  html: !0,
                                  showConfirmButton: !0,
                              }),
                                  "404" == b.code &&
                                      setTimeout(function () {
                                          location.href = window.location;
                                      }, 4500),
                                  "200" == b.code &&
                                      $(
                                          '#register-affiliate input[type="text"]'
                                      ).val("");
                          },
                      }))
                : ($("#email").addClass("required").focus(), !1);
        }),
        $("#register-affiliate input").on("keyup", function () {
            $(this).hasClass("required") && $(this).removeClass("required");
        }),
        // $("#register-affiliate input.number").numeric(),
        (emtApp.topPhones = !1),
        $(".mobileTopPhones .touch").on("click", function () {
            return (
                console.log(emtApp.topPhones),
                0 == emtApp.topPhones
                    ? ($(".mobileTopPhones").css("height", "287px"),
                      (emtApp.topPhones = !0),
                      !1)
                    : 1 == emtApp.topPhones
                    ? ($(".mobileTopPhones").css("height", "35px"),
                      (emtApp.topPhones = !1),
                      !1)
                    : void 0
            );
        }),
        $(".boxControlSearch").hide(),
        $(".navsearch").on("click", function () {
            $(".boxControlSearch")
                .stop(!0)
                .fadeIn("last", function () {
                    $("#inpSearch").focus();
                });
        }),
        $(".boxControlSearch .close").on("click", function () {
            $(".boxControlSearch").stop(!0).fadeOut("last");
        }),
        $(".overwrite, #model-cancel").hide(),
        $("#btnRegisterHotel").on("click", function (a) {
            a.preventDefault(),
                executeRequestDestination("notoverwrite", "normal");
        }),
        $("#model-overwrite-btn").on("click", function (a) {
            a.preventDefault();
            var b = $(this).data("mode");
            executeRequestDestination("overwrite", b);
        }),
        $("#btnRegisterAirbnb").on("click", function (a) {
            a.preventDefault(),
                executeRequestDestination("notoverwrite", "airbnb");
        }),
        $("#newsAction").on("click", function (event) {
            event.preventDefault();
            var newsletter = $("#inNews").val();
            /\w+([-+.']\w+)*@\w+([-.]\w+)/.test(newsletter)
                ? $.ajax({
                      data: { newsletter: newsletter },
                      url: path + "handlers/hdl-newsletter.php",
                      type: "post",
                      beforeSend: function () {
                          $(this).val("SUSCRIBING");
                      },
                      success: function (data) {
                          var suscribe = eval("(" + data + ")");
                          $(this).val("SUSCRIBE"),
                              "done" == suscribe.state && $("#inNews").val(""),
                              $("#susNews p").text(suscribe.message);
                      },
                  })
                : $("#inNews").addClass("required").focus();
        }),
        $("#inNews").on("focus", function () {
            $(this).hasClass("required") && $(this).removeClass("required");
        }),
        $("#btnInputReview").on("click", function (a) {
            a.preventDefault();
            var b = {
                author: $("#reviewAuthor").val(),
                email: $("#reviewEmail").val(),
                title: $("#reviewTitle").val(),
                review: $("#reviewContent").val(),
                star: $("#reviewStar").val(),
                lang: "en-US",
            };
            return (
                $("#reviewLang").length > 0 &&
                    (b.lang = $("#reviewLang").val()),
                null == b.author ||
                0 == b.author.length ||
                /^\s+$/.test(b.author)
                    ? ($("#reviewAuthor").focus(), !1)
                    : /\w+([-+.']\w+)*@\w+([-.]\w+)/.test(b.email)
                    ? null == b.title ||
                      0 == b.title.length ||
                      /^\s+$/.test(b.title)
                        ? ($("#reviewTitle").focus(), !1)
                        : 0 == b.star
                        ? (alert(
                              "Please give us a rating by choosing by selecting one of the stars"
                          ),
                          !1)
                        : null == b.review ||
                          0 == b.review.length ||
                          /^\s+$/.test(b.review)
                        ? ($("#reviewContent").focus(), !1)
                        : void grecaptcha.ready(function () {
                              var a = grecaptcha.execute(
                                  "6LeEIMkaAAAAANtb-8ikVQ1xvHS-MWHFHlHjrBl-",
                                  { action: "register_review" }
                              );
                              a.then(function (a) {
                                  (b.action = "register_review"),
                                      (b.token = a),
                                      $.ajax({
                                          data: b,
                                          url:
                                              emtApp.path +
                                              "handlers/hdl-reviews.php",
                                          type: "post",
                                          beforeSend: function () {
                                              $(this).val("WRITING");
                                          },
                                          success: function (a) {
                                              if (1 == a) {
                                                  var c =
                                                      "We greatly appreciate your comments, they are very important to us.";
                                                  "es-MX" == b.lang &&
                                                      (c =
                                                          "Agradecemos mucho sus comentarios, son muy importantes para nosotros."),
                                                      alert(c),
                                                      (location.href =
                                                          emtApp.urlocation);
                                              } else {
                                                  var c =
                                                      "Sorry, something happened and we could not receive your comments";
                                                  "es-MX" == b.lang &&
                                                      (c =
                                                          "Lo siento, sucediÃ³ algo y no pudimos recibir sus comentarios."),
                                                      alert(c);
                                              }
                                          },
                                      });
                              });
                          })
                    : ($("#reviewEmail").focus(), !1)
            );
        }),
        $(".reviewstar").on("click", function () {
            var a = $(this).data("val");
            $(".rstar").css("color", "#000"),
                $(".rstar").each(function () {
                    var b = $(this).data("val");
                    a >= b && $(this).css("color", "#ffd000");
                }),
                $("#reviewStar").val(a);
        });
});

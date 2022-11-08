(function buyAgainFunction() {
  var buyAgainCard = $(".buy-again-card");

  function toggleViewMore(id, show) {
    var targetEl = $(`.ordered-variant[data-view-more="${id}"]`);

    if (show) {
      targetEl.show();
    } else {
      targetEl.hide();
    }
  }

  buyAgainCard.find(".order-variants-btn").on("click", function () {
    var toggleClass = "toggled";
    var viewMoreId = $(this).data("target-view-more");
    var remainedText = $(this).data("remained-text");

    $(this).toggleClass(toggleClass);

    if ($(this).hasClass(toggleClass)) {
      $(this).text("View Less");
      toggleViewMore(viewMoreId, true);
    } else {
      $(this).text(remainedText);
      toggleViewMore(viewMoreId, false);
    }
  });

  function toggleVariantChooser(id, show) {
    var targetEl = $(`.choose-variants[data-choose-variants="${id}"]`);
    var targetCard = $(`.buy-again-card[data-id="${id}"]`);
    var cardActionEl = targetCard.find(".buy-again-card__action");
    var cardOrderedEl = targetCard.find(".buy-again-card__ordered");
    var cardViewAllbtn = cardActionEl.find(".view-all-btn");
    if ($(document).width() > 768) {
      if (show) {
        targetEl.show();
        cardActionEl.hide();
        cardOrderedEl.hide();
      } else {
        targetEl.hide();
        cardActionEl.show();
        cardOrderedEl.show();
      }
    } else {
      if (show) {
        targetEl.css('order', '1').show();
        cardViewAllbtn.hide();
      } else {
        targetEl.css('order', '0').hide();
        cardViewAllbtn.show();
      }
    }
  }

  buyAgainCard.find(".view-all-btn").on("click", function () {
    var toggleClass = "toggled";
    var id = $(this).data("target-choose-variants");
    $(this).toggleClass(toggleClass);
    toggleVariantChooser(id, true);
  });

  buyAgainCard.find(".choose-variants .hider").on("click", function () {
    var id = $(this).data("choose-variants");
    toggleVariantChooser(id, false);
  });
})();

(function variantChooserFunctions() {
  var chooseColors = $(".choose-colors");
  var chooseColorToggleClass = "expand";
  var chooseColorItemActiveClass = "selected";

  function colorChooser(id, show) {
    var targetEl = $(`.choose-colors[data-color-chooser="${id}"]`);
    console.log(targetEl, id);
    targetEl[show ? "addClass" : "removeClass"](chooseColorToggleClass);
  }

  chooseColors.on("click", function () {
    var id = $(this).data("color-chooser");
    colorChooser(id, !$(this).hasClass(chooseColorToggleClass));
  });

  function setDefaultChooserColor(chooserId, data) {
    var targetEl = $(
      `.choose-colors[data-color-chooser="${chooserId}"] .choose-colors__default`
    );
    var colorEl = targetEl.find(".color-box");
    var nameEl = targetEl.find(".name");

    colorEl.html(data.color);
    nameEl.html(data.name);
    targetEl.attr("data-id", data.id);
  }

  chooseColors.find(".item").on("click", function () {
    chooseColors.find(".item").removeClass(chooseColorItemActiveClass);

    var chooserId = $(this).data("target-color-chooser");
    var id = $(this).data("id");
    var color = $(this).find(".color-box").html();
    var name = $(this).find(".name").text();

    $(this).addClass(chooseColorItemActiveClass);

    setDefaultChooserColor(chooserId, {
      id,
      color,
      name,
    });
  });

  $(document).on("click", function (e) {
    console.log(!$(e.target).closest(".choose-colors").length);
    if (!$(e.target).closest(".choose-colors").length) {
      chooseColors.removeClass(chooseColorToggleClass);
    }
  });
})();


(function orderedVariantsFunction() {
  function toggleVariantQuantity(id, show) {
    var target = $('.buy-again-quantity').hide();
    var target = $(`.buy-again-quantity[data-buy-again="${id}"]`);
    target[show ? 'show': 'hide']();
  }
  
  
  $('.buy-again-btn').on('click', function() {
    var id = $(this).data('target-buy-again');
    toggleVariantQuantity(id, true);
  })

  $(document).on("click", function (e) {
    if (!$(e.target).closest(".buy-again-btn").length && !$(e.target).closest(".buy-again-quantity").length) {
      $('.buy-again-quantity').hide();
    }
  });
})();


(function utilities() {
  $(".numbersOnly").keyup(function (e) {
    if ($(this).val() == 0) {
      $(this).val("");
    }
  });

  $(".numbersOnly").keydown(function (e) {
    if (
      (this.value.length == 0 && e.which == 48) ||
      (this.value.length == 0 && e.which == 96)
    ) {
      return false;
    }

    if (
      $.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
      // Allow: Ctrl+A, Command+A
      (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
      (e.keyCode >= 35 && e.keyCode <= 40)
    ) {
      return;
    }

    if (
      (e.shiftKey || e.keyCode < 48 || e.keyCode > 57) &&
      (e.keyCode < 96 || e.keyCode > 105)
    ) {
      e.preventDefault();
    }
  });
})();

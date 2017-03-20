/**
 * Created with PhpStorm.
 * User:
 * Date: 9/7/14
 * Time: 10:44 AM
 */


(function ($) {
    $(document).ready(function () {
        $.getJSON("js/codeinfo.json").done(function(data) {
            window.codeInfo = data;
        }).fail(function(jqxhr, textStatus, error) {
            console.log(error + " " + textStatus);
        });
        $(".login a").click(function (event) {
            gigyaPlugins.login();
            event.preventDefault();
        });
        $(".register a").click(function (event) {
            gigyaPlugins.register();
            event.preventDefault();
        });
        $("a.edit-profile").click(function (event) {
            gigyaPlugins.editProfile();
            event.preventDefault();
        });
        $("a.logout").click(function (event) {
            $(".user-name").removeClass("profile-arrowdown").addClass("profile-arrow-up").next().fadeOut();
            gigyaPlugins.logout();
            event.preventDefault();
        });

        $(".label-default").hover(function (event) {
			event.preventDefault();
            $(this).find(".code-opts").show();
            }, function (event) {
            $(this).find(".code-opts").hide();
        });

        $(".user-name").click(function (event) {
            if ($(this).hasClass("profile-arrowdown")) {
                $(this).removeClass("profile-arrowdown").addClass("profile-arrow-up").next().fadeIn();
             } else {
                $(this).removeClass("profile-arrow-up").addClass("profile-arrowdown").next().fadeOut();
            }
        });
        
        $(".get-code").click(function (event) {
            event.preventDefault();
            var fnName = $(this).data("fn-name");
            var funString = htmlEntities(js_beautify(codeInfo.plugins[fnName].js, {"preserve_newlines": false, "wrap_line_length": 100, "indent_size": 2, "indent_char": "\t"})) +"\n";
            var name = codeInfo.plugins[fnName].name;
            var html = "<div class='modal-title'><h3>" + name + " source code. <br/>" +
                "<span>Copy the code below to the head section of your page.</span></h3>" +
                "<button id='select-text' class='select-text'>&nbsp;</button>" +
                "</div><pre class='line-numbers'><code class='language-javascript' id='code-snippet'>" + funString + "</code></pre>";
            $.modal(html,
                {
                    "maxHeight": 500,
                    "onShow": function() {
                        Prism.highlightAll();
                        $('code').dblclick(function() {
                            $(this).selectText();
                        });
                    },
                    "onClose": function() {
                        $('#copy').off();
                        $.modal.close();
                    }
                }
            );
            $('#select-text').click(function (event) {
                $('#code-snippet').selectText();
            });
        });
        $(".code-links").find(".docs").click(function (event) {
            event.preventDefault();
            var fnName = $(this).prev().data("fn-name");
            var docsUrl = codeInfo.plugins[fnName].link;
            window.open(docsUrl,'_blank');
        })
		
		$('.wiki').on('click', function(e){
			e.preventDefault();
			window.open($(this).attr('href'));
		});

        $('.loginBar, .sidebar .follow-bar, .game-mechanics, .activity-feed, .rating-reviews, .reaction-wrap, .share-wrap, .comments').hover(
            function() {
                $(this).find('.code-opts').slideDown('fast');
            }, function() {
                $(this).find('.code-opts').slideUp('fast');
            }
        );

    });



    $.fn.selectText = function(){
        var doc = document
            , element = this[0]
            , range, selection
            ;
        if (doc.body.createTextRange) {
            range = document.body.createTextRange();
            range.moveToElementText(element);
            range.select();
        } else if (window.getSelection) {
            selection = window.getSelection();
            range = document.createRange();
            range.selectNodeContents(element);
            selection.removeAllRanges();
            selection.addRange(range);
        }
    };
    function htmlEntities(str) {
        return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
    }

})(jQuery);

// Add fonts to whitelist
// specify the fonts you would
var fonts = ['Arial', 'Courier', 'Garamond', 'Tahoma', 'Times New Roman', 'Verdana', 'sofia', 'slabo', 'roboto', 'inconsolata', 'ubuntu', 'Roboto', 'sans-serif',];

// generate code friendly names
function getFontName(font) {
return font.toLowerCase().replace(/\s/g, "-");
}
var fontNames = fonts.map(font => getFontName(font));
// add fonts to style
var fontStyles = "";
fonts.forEach(function(font) {
var fontName = getFontName(font);
fontStyles += ".ql-snow .ql-picker.ql-font .ql-picker-label[data-value=" + fontName + "]::before, .ql-snow .ql-picker.ql-font .ql-picker-item[data-value=" + fontName + "]::before {" +
"content: '" + font + "';" +
"font-family: '" + font + "', sans-serif;" +
"}" +
".ql-font-" + fontName + "{" +
" font-family: '" + font + "', sans-serif;" +
"}";
});
var node = document.createElement('style');
node.innerHTML = fontStyles;
document.body.appendChild(node);

// all toolbar into form
var toolbarOptions = [
[{ 'header': [1, 2, 3, 4, 5, 6, false] }],        // custom dropdown
[{ 'font': fontNames }],
['bold', 'italic', 'underline', 'strike'],        // toggled buttons
[{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme

// [{ 'header': 1 }, { 'header': 2 }],               // custom button values
[{ 'list': 'ordered'}, { 'list': 'bullet' }],
[{ 'align': [] }],
[{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
[{ 'indent': '+1'}, { 'indent': '-1' }],          // outdent/indent
[{ 'direction': 'rtl' }],                         // text direction
['blockquote', 'code-block'],
['link'],                                         // link

[{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown

['clean']                                         // remove formatting button
];
var Font = Quill.import('formats/font');
Font.whitelist = fontNames;
Quill.register(Font, true);

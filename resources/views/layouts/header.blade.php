<meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="icon" href="/images/favicon.ico">
    <link rel="stylesheet" href="/css/master.css">

    <title>Main Dashboard | Invento</title>
  <style>@charset "UTF-8";
/*!
 * BootstrapVue Custom CSS (https://bootstrap-vue.org)
 */
.bv-no-focus-ring:focus {
  outline: none;
}

@media (max-width: 575.98px) {
  .bv-d-xs-down-none {
    display: none !important;
  }
}
@media (max-width: 767.98px) {
  .bv-d-sm-down-none {
    display: none !important;
  }
}
@media (max-width: 991.98px) {
  .bv-d-md-down-none {
    display: none !important;
  }
}
@media (max-width: 1199.98px) {
  .bv-d-lg-down-none {
    display: none !important;
  }
}
.bv-d-xl-down-none {
  display: none !important;
}

.form-control.focus {
  color: #495057;
  background-color: #fff;
  border-color: #80bdff;
  outline: 0;
  box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}
.form-control.focus.is-valid {
  border-color: #28a745;
  box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
}
.form-control.focus.is-invalid {
  border-color: #dc3545;
  box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
}

.b-avatar {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  vertical-align: middle;
  flex-shrink: 0;
  width: 2.5rem;
  height: 2.5rem;
  font-size: inherit;
  font-weight: 400;
  line-height: 1;
  max-width: 100%;
  max-height: auto;
  text-align: center;
  overflow: visible;
  position: relative;
  transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}
.b-avatar:focus {
  outline: 0;
}
.b-avatar.btn, .b-avatar[href] {
  padding: 0;
  border: 0;
}
.b-avatar.btn .b-avatar-img img, .b-avatar[href] .b-avatar-img img {
  transition: -webkit-transform 0.15s ease-in-out;
  transition: transform 0.15s ease-in-out;
  transition: transform 0.15s ease-in-out, -webkit-transform 0.15s ease-in-out;
}
.b-avatar.btn:not(:disabled):not(.disabled), .b-avatar[href]:not(:disabled):not(.disabled) {
  cursor: pointer;
}
.b-avatar.btn:not(:disabled):not(.disabled):hover .b-avatar-img img, .b-avatar[href]:not(:disabled):not(.disabled):hover .b-avatar-img img {
  -webkit-transform: scale(1.15);
  transform: scale(1.15);
}
.b-avatar.disabled, .b-avatar:disabled, .b-avatar[disabled] {
  opacity: 0.65;
  pointer-events: none;
}
.b-avatar .b-avatar-custom,
.b-avatar .b-avatar-text,
.b-avatar .b-avatar-img {
  border-radius: inherit;
  width: 100%;
  height: 100%;
  overflow: hidden;
  display: flex;
  justify-content: center;
  align-items: center;
  -webkit-mask-image: radial-gradient(white, black);
  mask-image: radial-gradient(white, black);
}
.b-avatar .b-avatar-text {
  text-transform: uppercase;
  white-space: nowrap;
}
.b-avatar[href] {
  text-decoration: none;
}
.b-avatar > .b-icon {
  width: 60%;
  height: auto;
  max-width: 100%;
}
.b-avatar .b-avatar-img img {
  width: 100%;
  height: 100%;
  max-height: auto;
  border-radius: inherit;
  -o-object-fit: cover;
  object-fit: cover;
}
.b-avatar .b-avatar-badge {
  position: absolute;
  min-height: 1.5em;
  min-width: 1.5em;
  padding: 0.25em;
  line-height: 1;
  border-radius: 10em;
  font-size: 70%;
  font-weight: 700;
  z-index: 1;
}

.b-avatar-sm {
  width: 1.5rem;
  height: 1.5rem;
}
.b-avatar-sm .b-avatar-text {
  font-size: calc(0.6rem);
}
.b-avatar-sm .b-avatar-badge {
  font-size: calc(0.42rem);
}

.b-avatar-lg {
  width: 3.5rem;
  height: 3.5rem;
}
.b-avatar-lg .b-avatar-text {
  font-size: calc(1.4rem);
}
.b-avatar-lg .b-avatar-badge {
  font-size: calc(0.98rem);
}

.b-avatar-group .b-avatar-group-inner {
  display: flex;
  flex-wrap: wrap;
}
.b-avatar-group .b-avatar {
  border: 1px solid #dee2e6;
}
.b-avatar-group a.b-avatar:hover:not(.disabled):not(disabled),
.b-avatar-group .btn.b-avatar:hover:not(.disabled):not(disabled) {
  z-index: 1;
}

.b-calendar {
  display: inline-flex;
}
.b-calendar .b-calendar-inner {
  min-width: 250px;
}
.b-calendar .b-calendar-header,
.b-calendar .b-calendar-nav {
  margin-bottom: 0.25rem;
}
.b-calendar .b-calendar-nav .btn {
  padding: 0.25rem;
}
.b-calendar output {
  padding: 0.25rem;
  font-size: 80%;
}
.b-calendar output.readonly {
  background-color: #e9ecef;
  opacity: 1;
}
.b-calendar .b-calendar-footer {
  margin-top: 0.5rem;
}
.b-calendar .b-calendar-grid {
  padding: 0;
  margin: 0;
  overflow: hidden;
}
.b-calendar .b-calendar-grid .row {
  flex-wrap: nowrap;
}
.b-calendar .b-calendar-grid-caption {
  padding: 0.25rem;
}
.b-calendar .b-calendar-grid-body .col[data-date] .btn {
  width: 32px;
  height: 32px;
  font-size: 14px;
  line-height: 1;
  margin: 3px auto;
  padding: 9px 0;
}
.b-calendar .btn:disabled, .b-calendar .btn.disabled, .b-calendar .btn[aria-disabled=true] {
  cursor: default;
  pointer-events: none;
}

.card-img-left {
  border-top-left-radius: calc(0.25rem - 1px);
  border-bottom-left-radius: calc(0.25rem - 1px);
}

.card-img-right {
  border-top-right-radius: calc(0.25rem - 1px);
  border-bottom-right-radius: calc(0.25rem - 1px);
}

.dropdown:not(.dropleft) .dropdown-toggle.dropdown-toggle-no-caret::after {
  display: none !important;
}
.dropdown.dropleft .dropdown-toggle.dropdown-toggle-no-caret::before {
  display: none !important;
}
.dropdown .dropdown-menu:focus {
  outline: none;
}

.b-dropdown-form {
  display: inline-block;
  padding: 0.25rem 1.5rem;
  width: 100%;
  clear: both;
  font-weight: 400;
}
.b-dropdown-form:focus {
  outline: 1px dotted !important;
  outline: 5px auto -webkit-focus-ring-color !important;
}
.b-dropdown-form.disabled, .b-dropdown-form:disabled {
  outline: 0 !important;
  color: #adb5bd;
  pointer-events: none;
}

.b-dropdown-text {
  display: inline-block;
  padding: 0.25rem 1.5rem;
  margin-bottom: 0;
  width: 100%;
  clear: both;
  font-weight: lighter;
}

.custom-checkbox.b-custom-control-lg,
.input-group-lg .custom-checkbox {
  font-size: 1.25rem;
  line-height: 1.5;
  padding-left: 1.875rem;
}
.custom-checkbox.b-custom-control-lg .custom-control-label::before,
.input-group-lg .custom-checkbox .custom-control-label::before {
  top: 0.3125rem;
  left: -1.875rem;
  width: 1.25rem;
  height: 1.25rem;
  border-radius: 0.3rem;
}
.custom-checkbox.b-custom-control-lg .custom-control-label::after,
.input-group-lg .custom-checkbox .custom-control-label::after {
  top: 0.3125rem;
  left: -1.875rem;
  width: 1.25rem;
  height: 1.25rem;
  background-size: 50% 50%;
}

.custom-checkbox.b-custom-control-sm,
.input-group-sm .custom-checkbox {
  font-size: 0.875rem;
  line-height: 1.5;
  padding-left: 1.3125rem;
}
.custom-checkbox.b-custom-control-sm .custom-control-label::before,
.input-group-sm .custom-checkbox .custom-control-label::before {
  top: 0.21875rem;
  left: -1.3125rem;
  width: 0.875rem;
  height: 0.875rem;
  border-radius: 0.2rem;
}
.custom-checkbox.b-custom-control-sm .custom-control-label::after,
.input-group-sm .custom-checkbox .custom-control-label::after {
  top: 0.21875rem;
  left: -1.3125rem;
  width: 0.875rem;
  height: 0.875rem;
  background-size: 50% 50%;
}

.custom-switch.b-custom-control-lg,
.input-group-lg .custom-switch {
  padding-left: 2.8125rem;
}
.custom-switch.b-custom-control-lg .custom-control-label,
.input-group-lg .custom-switch .custom-control-label {
  font-size: 1.25rem;
  line-height: 1.5;
}
.custom-switch.b-custom-control-lg .custom-control-label::before,
.input-group-lg .custom-switch .custom-control-label::before {
  top: 0.3125rem;
  height: 1.25rem;
  left: -2.8125rem;
  width: 2.1875rem;
  border-radius: 0.625rem;
}
.custom-switch.b-custom-control-lg .custom-control-label::after,
.input-group-lg .custom-switch .custom-control-label::after {
  top: calc(
        0.3125rem + 2px
      );
  left: calc(
        -2.8125rem + 2px
      );
  width: calc(
  1.25rem - 4px
);
  height: calc(
  1.25rem - 4px
);
  border-radius: 0.625rem;
  background-size: 50% 50%;
}
.custom-switch.b-custom-control-lg .custom-control-input:checked ~ .custom-control-label::after,
.input-group-lg .custom-switch .custom-control-input:checked ~ .custom-control-label::after {
  -webkit-transform: translateX(0.9375rem);
  transform: translateX(0.9375rem);
}

.custom-switch.b-custom-control-sm,
.input-group-sm .custom-switch {
  padding-left: 1.96875rem;
}
.custom-switch.b-custom-control-sm .custom-control-label,
.input-group-sm .custom-switch .custom-control-label {
  font-size: 0.875rem;
  line-height: 1.5;
}
.custom-switch.b-custom-control-sm .custom-control-label::before,
.input-group-sm .custom-switch .custom-control-label::before {
  top: 0.21875rem;
  left: -1.96875rem;
  width: 1.53125rem;
  height: 0.875rem;
  border-radius: 0.4375rem;
}
.custom-switch.b-custom-control-sm .custom-control-label::after,
.input-group-sm .custom-switch .custom-control-label::after {
  top: calc(
        0.21875rem + 2px
      );
  left: calc(
        -1.96875rem + 2px
      );
  width: calc(
  0.875rem - 4px
);
  height: calc(
  0.875rem - 4px
);
  border-radius: 0.4375rem;
  background-size: 50% 50%;
}
.custom-switch.b-custom-control-sm .custom-control-input:checked ~ .custom-control-label::after,
.input-group-sm .custom-switch .custom-control-input:checked ~ .custom-control-label::after {
  -webkit-transform: translateX(0.65625rem);
  transform: translateX(0.65625rem);
}

.input-group > .input-group-prepend > .btn-group > .btn,
.input-group > .input-group-append:not(:last-child) > .btn-group > .btn,
.input-group > .input-group-append:last-child > .btn-group:not(:last-child):not(.dropdown-toggle) > .btn {
  border-top-right-radius: 0;
  border-bottom-right-radius: 0;
}
.input-group > .input-group-append > .btn-group > .btn,
.input-group > .input-group-prepend:not(:first-child) > .btn-group > .btn,
.input-group > .input-group-prepend:first-child > .btn-group:not(:first-child) > .btn {
  border-top-left-radius: 0;
  border-bottom-left-radius: 0;
}

.b-form-btn-label-control.form-control {
  display: flex;
  align-items: stretch;
  height: auto;
  padding: 0;
  background-image: none;
}
.input-group .b-form-btn-label-control.form-control {
  padding: 0;
}

[dir=rtl] .b-form-btn-label-control.form-control, .b-form-btn-label-control.form-control[dir=rtl] {
  flex-direction: row-reverse;
}
[dir=rtl] .b-form-btn-label-control.form-control > label, .b-form-btn-label-control.form-control[dir=rtl] > label {
  text-align: right;
}

.b-form-btn-label-control.form-control > .btn {
  line-height: 1;
  font-size: inherit;
  box-shadow: none !important;
  border: 0;
}
.b-form-btn-label-control.form-control > .btn:disabled {
  pointer-events: none;
}
.b-form-btn-label-control.form-control.is-valid > .btn {
  color: #28a745;
}
.b-form-btn-label-control.form-control.is-invalid > .btn {
  color: #dc3545;
}
.b-form-btn-label-control.form-control > .dropdown-menu {
  padding: 0.5rem;
}
.b-form-btn-label-control.form-control > .form-control {
  height: auto;
  min-height: calc(calc(1.5em + 0.75rem + 2px) - 2px);
  padding-left: 0.25rem;
  margin: 0;
  border: 0;
  outline: 0;
  background: transparent;
  word-break: break-word;
  font-size: inherit;
  white-space: normal;
  cursor: pointer;
}
.b-form-btn-label-control.form-control > .form-control.form-control-sm {
  min-height: calc(calc(1.5em + 0.5rem + 2px) - 2px);
}
.b-form-btn-label-control.form-control > .form-control.form-control-lg {
  min-height: calc(calc(1.5em + 1rem + 2px) - 2px);
}
.input-group.input-group-sm .b-form-btn-label-control.form-control > .form-control {
  min-height: calc(calc(1.5em + 0.5rem + 2px) - 2px);
  padding-top: 0.25rem;
  padding-bottom: 0.25rem;
}

.input-group.input-group-lg .b-form-btn-label-control.form-control > .form-control {
  min-height: calc(calc(1.5em + 1rem + 2px) - 2px);
  padding-top: 0.5rem;
  padding-bottom: 0.5rem;
}

.b-form-btn-label-control.form-control[aria-disabled=true], .b-form-btn-label-control.form-control[aria-readonly=true] {
  background-color: #e9ecef;
  opacity: 1;
}
.b-form-btn-label-control.form-control[aria-disabled=true] {
  pointer-events: none;
}
.b-form-btn-label-control.form-control[aria-disabled=true] > label {
  cursor: default;
}

.b-form-btn-label-control.btn-group > .dropdown-menu {
  padding: 0.5rem;
}

.custom-file-label {
  white-space: nowrap;
  overflow-x: hidden;
}

.b-custom-control-lg.custom-file,
.b-custom-control-lg .custom-file-input,
.b-custom-control-lg .custom-file-label,
.input-group-lg.custom-file,
.input-group-lg .custom-file-input,
.input-group-lg .custom-file-label {
  font-size: 1.25rem;
  height: calc(1.5em + 1rem + 2px);
}
.b-custom-control-lg .custom-file-label,
.b-custom-control-lg .custom-file-label:after,
.input-group-lg .custom-file-label,
.input-group-lg .custom-file-label:after {
  padding: 0.5rem 1rem;
  line-height: 1.5;
}
.b-custom-control-lg .custom-file-label,
.input-group-lg .custom-file-label {
  border-radius: 0.3rem;
}
.b-custom-control-lg .custom-file-label::after,
.input-group-lg .custom-file-label::after {
  font-size: inherit;
  height: calc(
  1.5em + 1rem
);
  border-radius: 0 0.3rem 0.3rem 0;
}

.b-custom-control-sm.custom-file,
.b-custom-control-sm .custom-file-input,
.b-custom-control-sm .custom-file-label,
.input-group-sm.custom-file,
.input-group-sm .custom-file-input,
.input-group-sm .custom-file-label {
  font-size: 0.875rem;
  height: calc(1.5em + 0.5rem + 2px);
}
.b-custom-control-sm .custom-file-label,
.b-custom-control-sm .custom-file-label:after,
.input-group-sm .custom-file-label,
.input-group-sm .custom-file-label:after {
  padding: 0.25rem 0.5rem;
  line-height: 1.5;
}
.b-custom-control-sm .custom-file-label,
.input-group-sm .custom-file-label {
  border-radius: 0.2rem;
}
.b-custom-control-sm .custom-file-label::after,
.input-group-sm .custom-file-label::after {
  font-size: inherit;
  height: calc(
  1.5em + 0.5rem
);
  border-radius: 0 0.2rem 0.2rem 0;
}

.was-validated .form-control:invalid, .was-validated .form-control:valid, .form-control.is-invalid, .form-control.is-valid {
  background-position: right calc(0.375em + 0.1875rem) center;
}

input[type=color].form-control {
  height: calc(1.5em + 0.75rem + 2px);
  padding: 0.125rem 0.25rem;
}

input[type=color].form-control.form-control-sm,
.input-group-sm input[type=color].form-control {
  height: calc(1.5em + 0.5rem + 2px);
  padding: 0.125rem 0.25rem;
}

input[type=color].form-control.form-control-lg,
.input-group-lg input[type=color].form-control {
  height: calc(1.5em + 1rem + 2px);
  padding: 0.125rem 0.25rem;
}

input[type=color].form-control:disabled {
  background-color: #adb5bd;
  opacity: 0.65;
}

.input-group > .custom-range {
  position: relative;
  flex: 1 1 auto;
  width: 1%;
  margin-bottom: 0;
}
.input-group > .custom-range + .form-control,
.input-group > .custom-range + .form-control-plaintext,
.input-group > .custom-range + .custom-select,
.input-group > .custom-range + .custom-range,
.input-group > .custom-range + .custom-file {
  margin-left: -1px;
}
.input-group > .form-control + .custom-range,
.input-group > .form-control-plaintext + .custom-range,
.input-group > .custom-select + .custom-range,
.input-group > .custom-range + .custom-range,
.input-group > .custom-file + .custom-range {
  margin-left: -1px;
}
.input-group > .custom-range:focus {
  z-index: 3;
}
.input-group > .custom-range:not(:last-child) {
  border-top-right-radius: 0;
  border-bottom-right-radius: 0;
}
.input-group > .custom-range:not(:first-child) {
  border-top-left-radius: 0;
  border-bottom-left-radius: 0;
}
.input-group > .custom-range {
  height: calc(1.5em + 0.75rem + 2px);
  padding: 0 0.75rem;
  background-color: #fff;
  background-clip: padding-box;
  border: 1px solid #ced4da;
  height: calc(1.5em + 0.75rem + 2px);
  border-radius: 0.25rem;
  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}
@media (prefers-reduced-motion: reduce) {
  .input-group > .custom-range {
    transition: none;
  }
}
.input-group > .custom-range:focus {
  color: #495057;
  background-color: #fff;
  border-color: #80bdff;
  outline: 0;
  box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}
.input-group > .custom-range:disabled, .input-group > .custom-range[readonly] {
  background-color: #e9ecef;
}

.input-group-lg > .custom-range {
  height: calc(1.5em + 1rem + 2px);
  padding: 0 1rem;
  border-radius: 0.3rem;
}

.input-group-sm > .custom-range {
  height: calc(1.5em + 0.5rem + 2px);
  padding: 0 0.5rem;
  border-radius: 0.2rem;
}

.was-validated .input-group .custom-range:valid, .input-group .custom-range.is-valid {
  border-color: #28a745;
}
.was-validated .input-group .custom-range:valid:focus, .input-group .custom-range.is-valid:focus {
  border-color: #28a745;
  box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
}

.was-validated .custom-range:valid:focus::-webkit-slider-thumb, .custom-range.is-valid:focus::-webkit-slider-thumb {
  box-shadow: 0 0 0 1px #fff, 0 0 0 0.2rem #9be7ac;
}
.was-validated .custom-range:valid:focus::-moz-range-thumb, .custom-range.is-valid:focus::-moz-range-thumb {
  box-shadow: 0 0 0 1px #fff, 0 0 0 0.2rem #9be7ac;
}
.was-validated .custom-range:valid:focus::-ms-thumb, .custom-range.is-valid:focus::-ms-thumb {
  box-shadow: 0 0 0 1px #fff, 0 0 0 0.2rem #9be7ac;
}
.was-validated .custom-range:valid::-webkit-slider-thumb, .custom-range.is-valid::-webkit-slider-thumb {
  background-color: #28a745;
  background-image: none;
}
.was-validated .custom-range:valid::-webkit-slider-thumb:active, .custom-range.is-valid::-webkit-slider-thumb:active {
  background-color: #9be7ac;
  background-image: none;
}
.was-validated .custom-range:valid::-webkit-slider-runnable-track, .custom-range.is-valid::-webkit-slider-runnable-track {
  background-color: rgba(40, 167, 69, 0.35);
}
.was-validated .custom-range:valid::-moz-range-thumb, .custom-range.is-valid::-moz-range-thumb {
  background-color: #28a745;
  background-image: none;
}
.was-validated .custom-range:valid::-moz-range-thumb:active, .custom-range.is-valid::-moz-range-thumb:active {
  background-color: #9be7ac;
  background-image: none;
}
.was-validated .custom-range:valid::-moz-range-track, .custom-range.is-valid::-moz-range-track {
  background: rgba(40, 167, 69, 0.35);
}
.was-validated .custom-range:valid ~ .valid-feedback,
.was-validated .custom-range:valid ~ .valid-tooltip, .custom-range.is-valid ~ .valid-feedback,
.custom-range.is-valid ~ .valid-tooltip {
  display: block;
}
.was-validated .custom-range:valid::-ms-thumb, .custom-range.is-valid::-ms-thumb {
  background-color: #28a745;
  background-image: none;
}
.was-validated .custom-range:valid::-ms-thumb:active, .custom-range.is-valid::-ms-thumb:active {
  background-color: #9be7ac;
  background-image: none;
}
.was-validated .custom-range:valid::-ms-track-lower, .custom-range.is-valid::-ms-track-lower {
  background: rgba(40, 167, 69, 0.35);
}
.was-validated .custom-range:valid::-ms-track-upper, .custom-range.is-valid::-ms-track-upper {
  background: rgba(40, 167, 69, 0.35);
}

.was-validated .input-group .custom-range:invalid, .input-group .custom-range.is-invalid {
  border-color: #dc3545;
}
.was-validated .input-group .custom-range:invalid:focus, .input-group .custom-range.is-invalid:focus {
  border-color: #dc3545;
  box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
}

.was-validated .custom-range:invalid:focus::-webkit-slider-thumb, .custom-range.is-invalid:focus::-webkit-slider-thumb {
  box-shadow: 0 0 0 1px #fff, 0 0 0 0.2rem #f6cdd1;
}
.was-validated .custom-range:invalid:focus::-moz-range-thumb, .custom-range.is-invalid:focus::-moz-range-thumb {
  box-shadow: 0 0 0 1px #fff, 0 0 0 0.2rem #f6cdd1;
}
.was-validated .custom-range:invalid:focus::-ms-thumb, .custom-range.is-invalid:focus::-ms-thumb {
  box-shadow: 0 0 0 1px #fff, 0 0 0 0.2rem #f6cdd1;
}
.was-validated .custom-range:invalid::-webkit-slider-thumb, .custom-range.is-invalid::-webkit-slider-thumb {
  background-color: #dc3545;
  background-image: none;
}
.was-validated .custom-range:invalid::-webkit-slider-thumb:active, .custom-range.is-invalid::-webkit-slider-thumb:active {
  background-color: #f6cdd1;
  background-image: none;
}
.was-validated .custom-range:invalid::-webkit-slider-runnable-track, .custom-range.is-invalid::-webkit-slider-runnable-track {
  background-color: rgba(220, 53, 69, 0.35);
}
.was-validated .custom-range:invalid::-moz-range-thumb, .custom-range.is-invalid::-moz-range-thumb {
  background-color: #dc3545;
  background-image: none;
}
.was-validated .custom-range:invalid::-moz-range-thumb:active, .custom-range.is-invalid::-moz-range-thumb:active {
  background-color: #f6cdd1;
  background-image: none;
}
.was-validated .custom-range:invalid::-moz-range-track, .custom-range.is-invalid::-moz-range-track {
  background: rgba(220, 53, 69, 0.35);
}
.was-validated .custom-range:invalid ~ .invalid-feedback,
.was-validated .custom-range:invalid ~ .invalid-tooltip, .custom-range.is-invalid ~ .invalid-feedback,
.custom-range.is-invalid ~ .invalid-tooltip {
  display: block;
}
.was-validated .custom-range:invalid::-ms-thumb, .custom-range.is-invalid::-ms-thumb {
  background-color: #dc3545;
  background-image: none;
}
.was-validated .custom-range:invalid::-ms-thumb:active, .custom-range.is-invalid::-ms-thumb:active {
  background-color: #f6cdd1;
  background-image: none;
}
.was-validated .custom-range:invalid::-ms-track-lower, .custom-range.is-invalid::-ms-track-lower {
  background: rgba(220, 53, 69, 0.35);
}
.was-validated .custom-range:invalid::-ms-track-upper, .custom-range.is-invalid::-ms-track-upper {
  background: rgba(220, 53, 69, 0.35);
}

.custom-radio.b-custom-control-lg,
.input-group-lg .custom-radio {
  font-size: 1.25rem;
  line-height: 1.5;
  padding-left: 1.875rem;
}
.custom-radio.b-custom-control-lg .custom-control-label::before,
.input-group-lg .custom-radio .custom-control-label::before {
  top: 0.3125rem;
  left: -1.875rem;
  width: 1.25rem;
  height: 1.25rem;
  border-radius: 50%;
}
.custom-radio.b-custom-control-lg .custom-control-label::after,
.input-group-lg .custom-radio .custom-control-label::after {
  top: 0.3125rem;
  left: -1.875rem;
  width: 1.25rem;
  height: 1.25rem;
  background: no-repeat 50%/50% 50%;
}

.custom-radio.b-custom-control-sm,
.input-group-sm .custom-radio {
  font-size: 0.875rem;
  line-height: 1.5;
  padding-left: 1.3125rem;
}
.custom-radio.b-custom-control-sm .custom-control-label::before,
.input-group-sm .custom-radio .custom-control-label::before {
  top: 0.21875rem;
  left: -1.3125rem;
  width: 0.875rem;
  height: 0.875rem;
  border-radius: 50%;
}
.custom-radio.b-custom-control-sm .custom-control-label::after,
.input-group-sm .custom-radio .custom-control-label::after {
  top: 0.21875rem;
  left: -1.3125rem;
  width: 0.875rem;
  height: 0.875rem;
  background: no-repeat 50%/50% 50%;
}

.b-rating {
  text-align: center;
}
.b-rating.d-inline-flex {
  width: auto;
}
.b-rating .b-rating-star,
.b-rating .b-rating-value {
  padding: 0 0.25em;
}
.b-rating .b-rating-value {
  min-width: 2.5em;
}
.b-rating .b-rating-star {
  display: inline-flex;
  justify-content: center;
  outline: 0;
}
.b-rating .b-rating-star .b-rating-icon {
  display: inline-flex;
  transition: all 0.15s ease-in-out;
}
.b-rating.disabled, .b-rating:disabled {
  background-color: #e9ecef;
  color: #6c757d;
}
.b-rating:not(.disabled):not(.readonly) .b-rating-star {
  cursor: pointer;
}
.b-rating:not(.disabled):not(.readonly):focus:not(:hover) .b-rating-star.focused .b-rating-icon,
.b-rating:not(.disabled):not(.readonly) .b-rating-star:hover .b-rating-icon {
  -webkit-transform: scale(1.5);
  transform: scale(1.5);
}
.b-rating[dir=rtl] .b-rating-star-half {
  -webkit-transform: scale(-1, 1);
  transform: scale(-1, 1);
}

.b-form-spinbutton {
  text-align: center;
  overflow: hidden;
  background-image: none;
  padding: 0;
}
[dir=rtl] .b-form-spinbutton:not(.flex-column), .b-form-spinbutton[dir=rtl]:not(.flex-column) {
  flex-direction: row-reverse;
}

.b-form-spinbutton output {
  font-size: inherit;
  outline: 0;
  border: 0;
  background-color: transparent;
  width: auto;
  margin: 0;
  padding: 0 0.25rem;
}
.b-form-spinbutton output > div,
.b-form-spinbutton output > bdi {
  display: block;
  min-width: 2.25em;
  height: 1.5em;
}
.b-form-spinbutton.flex-column {
  height: auto;
  width: auto;
}
.b-form-spinbutton.flex-column output {
  margin: 0 0.25rem;
  padding: 0.25rem 0;
}
.b-form-spinbutton:not(.d-inline-flex):not(.flex-column) {
  output-width: 100%;
}
.b-form-spinbutton.d-inline-flex:not(.flex-column) {
  width: auto;
}
.b-form-spinbutton .btn {
  line-height: 1;
  box-shadow: none !important;
}
.b-form-spinbutton .btn:disabled {
  pointer-events: none;
}
.b-form-spinbutton .btn:hover:not(:disabled) > div > .b-icon {
  -webkit-transform: scale(1.25);
  transform: scale(1.25);
}
.b-form-spinbutton.disabled, .b-form-spinbutton.readonly {
  background-color: #e9ecef;
}
.b-form-spinbutton.disabled {
  pointer-events: none;
}

.b-form-tags.focus {
  color: #495057;
  background-color: #fff;
  border-color: #80bdff;
  outline: 0;
  box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}
.b-form-tags.focus.is-valid {
  border-color: #28a745;
  box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
}
.b-form-tags.focus.is-invalid {
  border-color: #dc3545;
  box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
}
.b-form-tags.disabled {
  background-color: #e9ecef;
}

.b-form-tags-list {
  margin-top: -0.25rem;
}
.b-form-tags-list .b-form-tags-field,
.b-form-tags-list .b-form-tag {
  margin-top: 0.25rem;
}

.b-form-tags-input {
  color: #495057;
}

.b-form-tag {
  font-size: 75%;
  font-weight: normal;
  line-height: 1.5;
  margin-right: 0.25rem;
}
.b-form-tag.disabled {
  opacity: 0.75;
}
.b-form-tag > button.b-form-tag-remove {
  color: inherit;
  font-size: 125%;
  line-height: 1;
  float: none;
  margin-left: 0.25rem;
}

.form-control-sm .b-form-tag {
  line-height: 1.5;
}

.form-control-lg .b-form-tag {
  line-height: 1.5;
}

.media-aside {
  display: flex;
  margin-right: 1rem;
}

.media-aside-right {
  margin-right: 0;
  margin-left: 1rem;
}

.modal-backdrop {
  opacity: 0.5;
}

.b-pagination-pills .page-item .page-link {
  border-radius: 50rem !important;
  margin-left: 0.25rem;
  line-height: 1;
}
.b-pagination-pills .page-item:first-child .page-link {
  margin-left: 0;
}

.popover.b-popover {
  display: block;
  opacity: 1;
  outline: 0;
}
.popover.b-popover.fade:not(.show) {
  opacity: 0;
}
.popover.b-popover.show {
  opacity: 1;
}

.b-popover-primary.popover {
  background-color: #cce5ff;
  border-color: #b8daff;
}
.b-popover-primary.bs-popover-top > .arrow::before, .b-popover-primary.bs-popover-auto[x-placement^=top] > .arrow::before {
  border-top-color: #b8daff;
}
.b-popover-primary.bs-popover-top > .arrow::after, .b-popover-primary.bs-popover-auto[x-placement^=top] > .arrow::after {
  border-top-color: #cce5ff;
}
.b-popover-primary.bs-popover-right > .arrow::before, .b-popover-primary.bs-popover-auto[x-placement^=right] > .arrow::before {
  border-right-color: #b8daff;
}
.b-popover-primary.bs-popover-right > .arrow::after, .b-popover-primary.bs-popover-auto[x-placement^=right] > .arrow::after {
  border-right-color: #cce5ff;
}
.b-popover-primary.bs-popover-bottom > .arrow::before, .b-popover-primary.bs-popover-auto[x-placement^=bottom] > .arrow::before {
  border-bottom-color: #b8daff;
}
.b-popover-primary.bs-popover-bottom > .arrow::after, .b-popover-primary.bs-popover-auto[x-placement^=bottom] > .arrow::after {
  border-bottom-color: #bdddff;
}
.b-popover-primary.bs-popover-bottom .popover-header::before, .b-popover-primary.bs-popover-auto[x-placement^=bottom] .popover-header::before {
  border-bottom-color: #bdddff;
}
.b-popover-primary.bs-popover-left > .arrow::before, .b-popover-primary.bs-popover-auto[x-placement^=left] > .arrow::before {
  border-left-color: #b8daff;
}
.b-popover-primary.bs-popover-left > .arrow::after, .b-popover-primary.bs-popover-auto[x-placement^=left] > .arrow::after {
  border-left-color: #cce5ff;
}
.b-popover-primary .popover-header {
  color: #212529;
  background-color: #bdddff;
  border-bottom-color: #a3d0ff;
}
.b-popover-primary .popover-body {
  color: #004085;
}

.b-popover-secondary.popover {
  background-color: #e2e3e5;
  border-color: #d6d8db;
}
.b-popover-secondary.bs-popover-top > .arrow::before, .b-popover-secondary.bs-popover-auto[x-placement^=top] > .arrow::before {
  border-top-color: #d6d8db;
}
.b-popover-secondary.bs-popover-top > .arrow::after, .b-popover-secondary.bs-popover-auto[x-placement^=top] > .arrow::after {
  border-top-color: #e2e3e5;
}
.b-popover-secondary.bs-popover-right > .arrow::before, .b-popover-secondary.bs-popover-auto[x-placement^=right] > .arrow::before {
  border-right-color: #d6d8db;
}
.b-popover-secondary.bs-popover-right > .arrow::after, .b-popover-secondary.bs-popover-auto[x-placement^=right] > .arrow::after {
  border-right-color: #e2e3e5;
}
.b-popover-secondary.bs-popover-bottom > .arrow::before, .b-popover-secondary.bs-popover-auto[x-placement^=bottom] > .arrow::before {
  border-bottom-color: #d6d8db;
}
.b-popover-secondary.bs-popover-bottom > .arrow::after, .b-popover-secondary.bs-popover-auto[x-placement^=bottom] > .arrow::after {
  border-bottom-color: #dadbde;
}
.b-popover-secondary.bs-popover-bottom .popover-header::before, .b-popover-secondary.bs-popover-auto[x-placement^=bottom] .popover-header::before {
  border-bottom-color: #dadbde;
}
.b-popover-secondary.bs-popover-left > .arrow::before, .b-popover-secondary.bs-popover-auto[x-placement^=left] > .arrow::before {
  border-left-color: #d6d8db;
}
.b-popover-secondary.bs-popover-left > .arrow::after, .b-popover-secondary.bs-popover-auto[x-placement^=left] > .arrow::after {
  border-left-color: #e2e3e5;
}
.b-popover-secondary .popover-header {
  color: #212529;
  background-color: #dadbde;
  border-bottom-color: #ccced2;
}
.b-popover-secondary .popover-body {
  color: #383d41;
}

.b-popover-success.popover {
  background-color: #d4edda;
  border-color: #c3e6cb;
}
.b-popover-success.bs-popover-top > .arrow::before, .b-popover-success.bs-popover-auto[x-placement^=top] > .arrow::before {
  border-top-color: #c3e6cb;
}
.b-popover-success.bs-popover-top > .arrow::after, .b-popover-success.bs-popover-auto[x-placement^=top] > .arrow::after {
  border-top-color: #d4edda;
}
.b-popover-success.bs-popover-right > .arrow::before, .b-popover-success.bs-popover-auto[x-placement^=right] > .arrow::before {
  border-right-color: #c3e6cb;
}
.b-popover-success.bs-popover-right > .arrow::after, .b-popover-success.bs-popover-auto[x-placement^=right] > .arrow::after {
  border-right-color: #d4edda;
}
.b-popover-success.bs-popover-bottom > .arrow::before, .b-popover-success.bs-popover-auto[x-placement^=bottom] > .arrow::before {
  border-bottom-color: #c3e6cb;
}
.b-popover-success.bs-popover-bottom > .arrow::after, .b-popover-success.bs-popover-auto[x-placement^=bottom] > .arrow::after {
  border-bottom-color: #c9e8d1;
}
.b-popover-success.bs-popover-bottom .popover-header::before, .b-popover-success.bs-popover-auto[x-placement^=bottom] .popover-header::before {
  border-bottom-color: #c9e8d1;
}
.b-popover-success.bs-popover-left > .arrow::before, .b-popover-success.bs-popover-auto[x-placement^=left] > .arrow::before {
  border-left-color: #c3e6cb;
}
.b-popover-success.bs-popover-left > .arrow::after, .b-popover-success.bs-popover-auto[x-placement^=left] > .arrow::after {
  border-left-color: #d4edda;
}
.b-popover-success .popover-header {
  color: #212529;
  background-color: #c9e8d1;
  border-bottom-color: #b7e1c1;
}
.b-popover-success .popover-body {
  color: #155724;
}

.b-popover-info.popover {
  background-color: #d1ecf1;
  border-color: #bee5eb;
}
.b-popover-info.bs-popover-top > .arrow::before, .b-popover-info.bs-popover-auto[x-placement^=top] > .arrow::before {
  border-top-color: #bee5eb;
}
.b-popover-info.bs-popover-top > .arrow::after, .b-popover-info.bs-popover-auto[x-placement^=top] > .arrow::after {
  border-top-color: #d1ecf1;
}
.b-popover-info.bs-popover-right > .arrow::before, .b-popover-info.bs-popover-auto[x-placement^=right] > .arrow::before {
  border-right-color: #bee5eb;
}
.b-popover-info.bs-popover-right > .arrow::after, .b-popover-info.bs-popover-auto[x-placement^=right] > .arrow::after {
  border-right-color: #d1ecf1;
}
.b-popover-info.bs-popover-bottom > .arrow::before, .b-popover-info.bs-popover-auto[x-placement^=bottom] > .arrow::before {
  border-bottom-color: #bee5eb;
}
.b-popover-info.bs-popover-bottom > .arrow::after, .b-popover-info.bs-popover-auto[x-placement^=bottom] > .arrow::after {
  border-bottom-color: #c5e7ed;
}
.b-popover-info.bs-popover-bottom .popover-header::before, .b-popover-info.bs-popover-auto[x-placement^=bottom] .popover-header::before {
  border-bottom-color: #c5e7ed;
}
.b-popover-info.bs-popover-left > .arrow::before, .b-popover-info.bs-popover-auto[x-placement^=left] > .arrow::before {
  border-left-color: #bee5eb;
}
.b-popover-info.bs-popover-left > .arrow::after, .b-popover-info.bs-popover-auto[x-placement^=left] > .arrow::after {
  border-left-color: #d1ecf1;
}
.b-popover-info .popover-header {
  color: #212529;
  background-color: #c5e7ed;
  border-bottom-color: #b2dfe7;
}
.b-popover-info .popover-body {
  color: #0c5460;
}

.b-popover-warning.popover {
  background-color: #fff3cd;
  border-color: #ffeeba;
}
.b-popover-warning.bs-popover-top > .arrow::before, .b-popover-warning.bs-popover-auto[x-placement^=top] > .arrow::before {
  border-top-color: #ffeeba;
}
.b-popover-warning.bs-popover-top > .arrow::after, .b-popover-warning.bs-popover-auto[x-placement^=top] > .arrow::after {
  border-top-color: #fff3cd;
}
.b-popover-warning.bs-popover-right > .arrow::before, .b-popover-warning.bs-popover-auto[x-placement^=right] > .arrow::before {
  border-right-color: #ffeeba;
}
.b-popover-warning.bs-popover-right > .arrow::after, .b-popover-warning.bs-popover-auto[x-placement^=right] > .arrow::after {
  border-right-color: #fff3cd;
}
.b-popover-warning.bs-popover-bottom > .arrow::before, .b-popover-warning.bs-popover-auto[x-placement^=bottom] > .arrow::before {
  border-bottom-color: #ffeeba;
}
.b-popover-warning.bs-popover-bottom > .arrow::after, .b-popover-warning.bs-popover-auto[x-placement^=bottom] > .arrow::after {
  border-bottom-color: #ffefbe;
}
.b-popover-warning.bs-popover-bottom .popover-header::before, .b-popover-warning.bs-popover-auto[x-placement^=bottom] .popover-header::before {
  border-bottom-color: #ffefbe;
}
.b-popover-warning.bs-popover-left > .arrow::before, .b-popover-warning.bs-popover-auto[x-placement^=left] > .arrow::before {
  border-left-color: #ffeeba;
}
.b-popover-warning.bs-popover-left > .arrow::after, .b-popover-warning.bs-popover-auto[x-placement^=left] > .arrow::after {
  border-left-color: #fff3cd;
}
.b-popover-warning .popover-header {
  color: #212529;
  background-color: #ffefbe;
  border-bottom-color: #ffe9a4;
}
.b-popover-warning .popover-body {
  color: #856404;
}

.b-popover-danger.popover {
  background-color: #f8d7da;
  border-color: #f5c6cb;
}
.b-popover-danger.bs-popover-top > .arrow::before, .b-popover-danger.bs-popover-auto[x-placement^=top] > .arrow::before {
  border-top-color: #f5c6cb;
}
.b-popover-danger.bs-popover-top > .arrow::after, .b-popover-danger.bs-popover-auto[x-placement^=top] > .arrow::after {
  border-top-color: #f8d7da;
}
.b-popover-danger.bs-popover-right > .arrow::before, .b-popover-danger.bs-popover-auto[x-placement^=right] > .arrow::before {
  border-right-color: #f5c6cb;
}
.b-popover-danger.bs-popover-right > .arrow::after, .b-popover-danger.bs-popover-auto[x-placement^=right] > .arrow::after {
  border-right-color: #f8d7da;
}
.b-popover-danger.bs-popover-bottom > .arrow::before, .b-popover-danger.bs-popover-auto[x-placement^=bottom] > .arrow::before {
  border-bottom-color: #f5c6cb;
}
.b-popover-danger.bs-popover-bottom > .arrow::after, .b-popover-danger.bs-popover-auto[x-placement^=bottom] > .arrow::after {
  border-bottom-color: #f6cace;
}
.b-popover-danger.bs-popover-bottom .popover-header::before, .b-popover-danger.bs-popover-auto[x-placement^=bottom] .popover-header::before {
  border-bottom-color: #f6cace;
}
.b-popover-danger.bs-popover-left > .arrow::before, .b-popover-danger.bs-popover-auto[x-placement^=left] > .arrow::before {
  border-left-color: #f5c6cb;
}
.b-popover-danger.bs-popover-left > .arrow::after, .b-popover-danger.bs-popover-auto[x-placement^=left] > .arrow::after {
  border-left-color: #f8d7da;
}
.b-popover-danger .popover-header {
  color: #212529;
  background-color: #f6cace;
  border-bottom-color: #f2b4ba;
}
.b-popover-danger .popover-body {
  color: #721c24;
}

.b-popover-light.popover {
  background-color: #fefefe;
  border-color: #fdfdfe;
}
.b-popover-light.bs-popover-top > .arrow::before, .b-popover-light.bs-popover-auto[x-placement^=top] > .arrow::before {
  border-top-color: #fdfdfe;
}
.b-popover-light.bs-popover-top > .arrow::after, .b-popover-light.bs-popover-auto[x-placement^=top] > .arrow::after {
  border-top-color: #fefefe;
}
.b-popover-light.bs-popover-right > .arrow::before, .b-popover-light.bs-popover-auto[x-placement^=right] > .arrow::before {
  border-right-color: #fdfdfe;
}
.b-popover-light.bs-popover-right > .arrow::after, .b-popover-light.bs-popover-auto[x-placement^=right] > .arrow::after {
  border-right-color: #fefefe;
}
.b-popover-light.bs-popover-bottom > .arrow::before, .b-popover-light.bs-popover-auto[x-placement^=bottom] > .arrow::before {
  border-bottom-color: #fdfdfe;
}
.b-popover-light.bs-popover-bottom > .arrow::after, .b-popover-light.bs-popover-auto[x-placement^=bottom] > .arrow::after {
  border-bottom-color: #f6f6f6;
}
.b-popover-light.bs-popover-bottom .popover-header::before, .b-popover-light.bs-popover-auto[x-placement^=bottom] .popover-header::before {
  border-bottom-color: #f6f6f6;
}
.b-popover-light.bs-popover-left > .arrow::before, .b-popover-light.bs-popover-auto[x-placement^=left] > .arrow::before {
  border-left-color: #fdfdfe;
}
.b-popover-light.bs-popover-left > .arrow::after, .b-popover-light.bs-popover-auto[x-placement^=left] > .arrow::after {
  border-left-color: #fefefe;
}
.b-popover-light .popover-header {
  color: #212529;
  background-color: #f6f6f6;
  border-bottom-color: #eaeaea;
}
.b-popover-light .popover-body {
  color: #818182;
}

.b-popover-dark.popover {
  background-color: #d6d8d9;
  border-color: #c6c8ca;
}
.b-popover-dark.bs-popover-top > .arrow::before, .b-popover-dark.bs-popover-auto[x-placement^=top] > .arrow::before {
  border-top-color: #c6c8ca;
}
.b-popover-dark.bs-popover-top > .arrow::after, .b-popover-dark.bs-popover-auto[x-placement^=top] > .arrow::after {
  border-top-color: #d6d8d9;
}
.b-popover-dark.bs-popover-right > .arrow::before, .b-popover-dark.bs-popover-auto[x-placement^=right] > .arrow::before {
  border-right-color: #c6c8ca;
}
.b-popover-dark.bs-popover-right > .arrow::after, .b-popover-dark.bs-popover-auto[x-placement^=right] > .arrow::after {
  border-right-color: #d6d8d9;
}
.b-popover-dark.bs-popover-bottom > .arrow::before, .b-popover-dark.bs-popover-auto[x-placement^=bottom] > .arrow::before {
  border-bottom-color: #c6c8ca;
}
.b-popover-dark.bs-popover-bottom > .arrow::after, .b-popover-dark.bs-popover-auto[x-placement^=bottom] > .arrow::after {
  border-bottom-color: #ced0d2;
}
.b-popover-dark.bs-popover-bottom .popover-header::before, .b-popover-dark.bs-popover-auto[x-placement^=bottom] .popover-header::before {
  border-bottom-color: #ced0d2;
}
.b-popover-dark.bs-popover-left > .arrow::before, .b-popover-dark.bs-popover-auto[x-placement^=left] > .arrow::before {
  border-left-color: #c6c8ca;
}
.b-popover-dark.bs-popover-left > .arrow::after, .b-popover-dark.bs-popover-auto[x-placement^=left] > .arrow::after {
  border-left-color: #d6d8d9;
}
.b-popover-dark .popover-header {
  color: #212529;
  background-color: #ced0d2;
  border-bottom-color: #c1c4c5;
}
.b-popover-dark .popover-body {
  color: #1b1e21;
}

.b-sidebar-outer {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  height: 0;
  overflow: visible;
  z-index: calc(1030 + 5);
}

.b-sidebar-backdrop {
  position: fixed;
  top: 0;
  left: 0;
  z-index: -1;
  width: 100vw;
  height: 100vh;
  opacity: 0.6;
}

.b-sidebar {
  display: flex;
  flex-direction: column;
  position: fixed;
  top: 0;
  width: 320px;
  max-width: 100%;
  height: 100vh;
  max-height: 100%;
  margin: 0;
  outline: 0;
  -webkit-transform: translateX(0);
  transform: translateX(0);
}
.b-sidebar.slide {
  transition: -webkit-transform 0.3s ease-in-out;
  transition: transform 0.3s ease-in-out;
  transition: transform 0.3s ease-in-out, -webkit-transform 0.3s ease-in-out;
}
@media (prefers-reduced-motion: reduce) {
  .b-sidebar.slide {
    transition: none;
  }
}
.b-sidebar:not(.b-sidebar-right) {
  left: 0;
  right: auto;
}
.b-sidebar:not(.b-sidebar-right).slide:not(.show) {
  -webkit-transform: translateX(-100%);
  transform: translateX(-100%);
}
.b-sidebar:not(.b-sidebar-right) > .b-sidebar-header .close {
  margin-left: auto;
}
.b-sidebar.b-sidebar-right {
  left: auto;
  right: 0;
}
.b-sidebar.b-sidebar-right.slide:not(.show) {
  -webkit-transform: translateX(100%);
  transform: translateX(100%);
}
.b-sidebar.b-sidebar-right > .b-sidebar-header .close {
  margin-right: auto;
}
.b-sidebar > .b-sidebar-header {
  font-size: 1.5rem;
  padding: 0.5rem 1rem;
  display: flex;
  flex-direction: row;
  flex-grow: 0;
  align-items: center;
}
[dir=rtl] .b-sidebar > .b-sidebar-header {
  flex-direction: row-reverse;
}

.b-sidebar > .b-sidebar-header .close {
  float: none;
  font-size: 1.5rem;
}
.b-sidebar > .b-sidebar-body {
  flex-grow: 1;
  height: 100%;
  overflow-y: auto;
}
.b-sidebar > .b-sidebar-footer {
  flex-grow: 0;
}

.b-skeleton-wrapper {
  cursor: wait;
}

.b-skeleton {
  position: relative;
  overflow: hidden;
  background-color: rgba(0, 0, 0, 0.12);
  cursor: wait;
  -webkit-mask-image: radial-gradient(white, black);
  mask-image: radial-gradient(white, black);
}
.b-skeleton::before {
  content: "&nbsp;";
}

.b-skeleton-text {
  height: 1rem;
  margin-bottom: 0.25rem;
  border-radius: 0.25rem;
}

.b-skeleton-button {
  width: 75px;
  padding: 0.375rem 0.75rem;
  font-size: 1rem;
  line-height: 1.5;
  border-radius: 0.25rem;
}

.b-skeleton-avatar {
  width: 2.5em;
  height: 2.5em;
  border-radius: 50%;
}

.b-skeleton-input {
  height: calc(1.5em + 0.75rem + 2px);
  padding: 0.375rem 0.75rem;
  line-height: 1.5;
  border: #ced4da solid 1px;
  border-radius: 0.25rem;
}

.b-skeleton-icon-wrapper svg {
  color: rgba(0, 0, 0, 0.12);
}

.b-skeleton-img {
  height: 100%;
  width: 100%;
}

.b-skeleton-animate-wave::after {
  content: "";
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: 0;
  background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
  -webkit-animation: b-skeleton-animate-wave 1.75s linear infinite;
  animation: b-skeleton-animate-wave 1.75s linear infinite;
}
@media (prefers-reduced-motion: reduce) {
  .b-skeleton-animate-wave::after {
    background: none;
    -webkit-animation: none;
    animation: none;
  }
}

@-webkit-keyframes b-skeleton-animate-wave {
  from {
    -webkit-transform: translateX(-100%);
    transform: translateX(-100%);
  }
  to {
    -webkit-transform: translateX(100%);
    transform: translateX(100%);
  }
}

@keyframes b-skeleton-animate-wave {
  from {
    -webkit-transform: translateX(-100%);
    transform: translateX(-100%);
  }
  to {
    -webkit-transform: translateX(100%);
    transform: translateX(100%);
  }
}
.b-skeleton-animate-fade {
  -webkit-animation: b-skeleton-animate-fade 0.875s ease-in-out alternate infinite;
  animation: b-skeleton-animate-fade 0.875s ease-in-out alternate infinite;
}
@media (prefers-reduced-motion: reduce) {
  .b-skeleton-animate-fade {
    -webkit-animation: none;
    animation: none;
  }
}

@-webkit-keyframes b-skeleton-animate-fade {
  0% {
    opacity: 1;
  }
  100% {
    opacity: 0.4;
  }
}

@keyframes b-skeleton-animate-fade {
  0% {
    opacity: 1;
  }
  100% {
    opacity: 0.4;
  }
}
.b-skeleton-animate-throb {
  -webkit-animation: b-skeleton-animate-throb 0.875s ease-in alternate infinite;
  animation: b-skeleton-animate-throb 0.875s ease-in alternate infinite;
}
@media (prefers-reduced-motion: reduce) {
  .b-skeleton-animate-throb {
    -webkit-animation: none;
    animation: none;
  }
}

@-webkit-keyframes b-skeleton-animate-throb {
  0% {
    -webkit-transform: scale(1);
    transform: scale(1);
  }
  100% {
    -webkit-transform: scale(0.975);
    transform: scale(0.975);
  }
}

@keyframes b-skeleton-animate-throb {
  0% {
    -webkit-transform: scale(1);
    transform: scale(1);
  }
  100% {
    -webkit-transform: scale(0.975);
    transform: scale(0.975);
  }
}
.table.b-table.b-table-fixed {
  table-layout: fixed;
}
.table.b-table.b-table-no-border-collapse {
  border-collapse: separate;
  border-spacing: 0;
}
.table.b-table[aria-busy=true] {
  opacity: 0.55;
}
.table.b-table > tbody > tr.b-table-details > td {
  border-top: none !important;
}
.table.b-table > caption {
  caption-side: bottom;
}
.table.b-table.b-table-caption-top > caption {
  caption-side: top !important;
}
.table.b-table > tbody > .table-active,
.table.b-table > tbody > .table-active > th,
.table.b-table > tbody > .table-active > td {
  background-color: rgba(0, 0, 0, 0.075);
}
.table.b-table.table-hover > tbody > tr.table-active:hover td,
.table.b-table.table-hover > tbody > tr.table-active:hover th {
  color: #212529;
  background-image: linear-gradient(rgba(0, 0, 0, 0.075), rgba(0, 0, 0, 0.075));
  background-repeat: no-repeat;
}
.table.b-table > tbody > .bg-active,
.table.b-table > tbody > .bg-active > th,
.table.b-table > tbody > .bg-active > td {
  background-color: rgba(255, 255, 255, 0.075) !important;
}
.table.b-table.table-hover.table-dark > tbody > tr.bg-active:hover td,
.table.b-table.table-hover.table-dark > tbody > tr.bg-active:hover th {
  color: #fff;
  background-image: linear-gradient(rgba(255, 255, 255, 0.075), rgba(255, 255, 255, 0.075));
  background-repeat: no-repeat;
}

.b-table-sticky-header,
.table-responsive,
[class*=table-responsive-] {
  margin-bottom: 1rem;
}
.b-table-sticky-header > .table,
.table-responsive > .table,
[class*=table-responsive-] > .table {
  margin-bottom: 0;
}

.b-table-sticky-header {
  overflow-y: auto;
  max-height: 300px;
}

@media print {
  .b-table-sticky-header {
    overflow-y: visible !important;
    max-height: none !important;
  }
}
@supports ((position: -webkit-sticky) or (position: sticky)) {
  .b-table-sticky-header > .table.b-table > thead > tr > th {
    position: -webkit-sticky;
    position: sticky;
    top: 0;
    z-index: 2;
  }

  .b-table-sticky-header > .table.b-table > thead > tr > .b-table-sticky-column,
.b-table-sticky-header > .table.b-table > tbody > tr > .b-table-sticky-column,
.b-table-sticky-header > .table.b-table > tfoot > tr > .b-table-sticky-column,
.table-responsive > .table.b-table > thead > tr > .b-table-sticky-column,
.table-responsive > .table.b-table > tbody > tr > .b-table-sticky-column,
.table-responsive > .table.b-table > tfoot > tr > .b-table-sticky-column,
[class*=table-responsive-] > .table.b-table > thead > tr > .b-table-sticky-column,
[class*=table-responsive-] > .table.b-table > tbody > tr > .b-table-sticky-column,
[class*=table-responsive-] > .table.b-table > tfoot > tr > .b-table-sticky-column {
    position: -webkit-sticky;
    position: sticky;
    left: 0;
  }
  .b-table-sticky-header > .table.b-table > thead > tr > .b-table-sticky-column,
.table-responsive > .table.b-table > thead > tr > .b-table-sticky-column,
[class*=table-responsive-] > .table.b-table > thead > tr > .b-table-sticky-column {
    z-index: 5;
  }
  .b-table-sticky-header > .table.b-table > tbody > tr > .b-table-sticky-column,
.b-table-sticky-header > .table.b-table > tfoot > tr > .b-table-sticky-column,
.table-responsive > .table.b-table > tbody > tr > .b-table-sticky-column,
.table-responsive > .table.b-table > tfoot > tr > .b-table-sticky-column,
[class*=table-responsive-] > .table.b-table > tbody > tr > .b-table-sticky-column,
[class*=table-responsive-] > .table.b-table > tfoot > tr > .b-table-sticky-column {
    z-index: 2;
  }

  .table.b-table > thead > tr > .table-b-table-default,
.table.b-table > tbody > tr > .table-b-table-default,
.table.b-table > tfoot > tr > .table-b-table-default {
    color: #212529;
    background-color: #fff;
  }
  .table.b-table.table-dark > thead > tr > .bg-b-table-default,
.table.b-table.table-dark > tbody > tr > .bg-b-table-default,
.table.b-table.table-dark > tfoot > tr > .bg-b-table-default {
    color: #fff;
    background-color: #343a40;
  }
  .table.b-table.table-striped > tbody > tr:nth-of-type(odd) > .table-b-table-default {
    background-image: linear-gradient(rgba(0, 0, 0, 0.05), rgba(0, 0, 0, 0.05));
    background-repeat: no-repeat;
  }
  .table.b-table.table-striped.table-dark > tbody > tr:nth-of-type(odd) > .bg-b-table-default {
    background-image: linear-gradient(rgba(255, 255, 255, 0.05), rgba(255, 255, 255, 0.05));
    background-repeat: no-repeat;
  }
  .table.b-table.table-hover > tbody > tr:hover > .table-b-table-default {
    color: #212529;
    background-image: linear-gradient(rgba(0, 0, 0, 0.075), rgba(0, 0, 0, 0.075));
    background-repeat: no-repeat;
  }
  .table.b-table.table-hover.table-dark > tbody > tr:hover > .bg-b-table-default {
    color: #fff;
    background-image: linear-gradient(rgba(255, 255, 255, 0.075), rgba(255, 255, 255, 0.075));
    background-repeat: no-repeat;
  }
}
.table.b-table > thead > tr > [aria-sort],
.table.b-table > tfoot > tr > [aria-sort] {
  cursor: pointer;
  background-image: none;
  background-repeat: no-repeat;
  background-size: 0.65em 1em;
}
.table.b-table > thead > tr > [aria-sort]:not(.b-table-sort-icon-left),
.table.b-table > tfoot > tr > [aria-sort]:not(.b-table-sort-icon-left) {
  background-position: right calc(0.75rem / 2) center;
  padding-right: calc(0.75rem + 0.65em);
}
.table.b-table > thead > tr > [aria-sort].b-table-sort-icon-left,
.table.b-table > tfoot > tr > [aria-sort].b-table-sort-icon-left {
  background-position: left calc(0.75rem / 2) center;
  padding-left: calc(0.75rem + 0.65em);
}
.table.b-table > thead > tr > [aria-sort=none],
.table.b-table > tfoot > tr > [aria-sort=none] {
  background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='101' height='101' view-box='0 0 101 101' preserveAspectRatio='none'%3e%3cpath fill='black' opacity='.3' d='M51 1l25 23 24 22H1l25-22zM51 101l25-23 24-22H1l25 22z'/%3e%3c/svg%3e");
}
.table.b-table > thead > tr > [aria-sort=ascending],
.table.b-table > tfoot > tr > [aria-sort=ascending] {
  background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='101' height='101' view-box='0 0 101 101' preserveAspectRatio='none'%3e%3cpath fill='black' d='M51 1l25 23 24 22H1l25-22z'/%3e%3cpath fill='black' opacity='.3' d='M51 101l25-23 24-22H1l25 22z'/%3e%3c/svg%3e");
}
.table.b-table > thead > tr > [aria-sort=descending],
.table.b-table > tfoot > tr > [aria-sort=descending] {
  background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='101' height='101' view-box='0 0 101 101' preserveAspectRatio='none'%3e%3cpath fill='black' opacity='.3' d='M51 1l25 23 24 22H1l25-22z'/%3e%3cpath fill='black' d='M51 101l25-23 24-22H1l25 22z'/%3e%3c/svg%3e");
}
.table.b-table.table-dark > thead > tr > [aria-sort=none], .table.b-table.table-dark > tfoot > tr > [aria-sort=none],
.table.b-table > .thead-dark > tr > [aria-sort=none] {
  background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='101' height='101' view-box='0 0 101 101' preserveAspectRatio='none'%3e%3cpath fill='white' opacity='.3' d='M51 1l25 23 24 22H1l25-22zM51 101l25-23 24-22H1l25 22z'/%3e%3c/svg%3e");
}
.table.b-table.table-dark > thead > tr > [aria-sort=ascending], .table.b-table.table-dark > tfoot > tr > [aria-sort=ascending],
.table.b-table > .thead-dark > tr > [aria-sort=ascending] {
  background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='101' height='101' view-box='0 0 101 101' preserveAspectRatio='none'%3e%3cpath fill='white' d='M51 1l25 23 24 22H1l25-22z'/%3e%3cpath fill='white' opacity='.3' d='M51 101l25-23 24-22H1l25 22z'/%3e%3c/svg%3e");
}
.table.b-table.table-dark > thead > tr > [aria-sort=descending], .table.b-table.table-dark > tfoot > tr > [aria-sort=descending],
.table.b-table > .thead-dark > tr > [aria-sort=descending] {
  background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='101' height='101' view-box='0 0 101 101' preserveAspectRatio='none'%3e%3cpath fill='white' opacity='.3' d='M51 1l25 23 24 22H1l25-22z'/%3e%3cpath fill='white' d='M51 101l25-23 24-22H1l25 22z'/%3e%3c/svg%3e");
}
.table.b-table > thead > tr > .table-dark[aria-sort=none],
.table.b-table > tfoot > tr > .table-dark[aria-sort=none] {
  background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='101' height='101' view-box='0 0 101 101' preserveAspectRatio='none'%3e%3cpath fill='white' opacity='.3' d='M51 1l25 23 24 22H1l25-22zM51 101l25-23 24-22H1l25 22z'/%3e%3c/svg%3e");
}
.table.b-table > thead > tr > .table-dark[aria-sort=ascending],
.table.b-table > tfoot > tr > .table-dark[aria-sort=ascending] {
  background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='101' height='101' view-box='0 0 101 101' preserveAspectRatio='none'%3e%3cpath fill='white' d='M51 1l25 23 24 22H1l25-22z'/%3e%3cpath fill='white' opacity='.3' d='M51 101l25-23 24-22H1l25 22z'/%3e%3c/svg%3e");
}
.table.b-table > thead > tr > .table-dark[aria-sort=descending],
.table.b-table > tfoot > tr > .table-dark[aria-sort=descending] {
  background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='101' height='101' view-box='0 0 101 101' preserveAspectRatio='none'%3e%3cpath fill='white' opacity='.3' d='M51 1l25 23 24 22H1l25-22z'/%3e%3cpath fill='white' d='M51 101l25-23 24-22H1l25 22z'/%3e%3c/svg%3e");
}
.table.b-table.table-sm > thead > tr > [aria-sort]:not(.b-table-sort-icon-left),
.table.b-table.table-sm > tfoot > tr > [aria-sort]:not(.b-table-sort-icon-left) {
  background-position: right calc(0.3rem / 2) center;
  padding-right: calc(0.3rem + 0.65em);
}
.table.b-table.table-sm > thead > tr > [aria-sort].b-table-sort-icon-left,
.table.b-table.table-sm > tfoot > tr > [aria-sort].b-table-sort-icon-left {
  background-position: left calc(0.3rem / 2) center;
  padding-left: calc(0.3rem + 0.65em);
}

.table.b-table.b-table-selectable:not(.b-table-selectable-no-click) > tbody > tr {
  cursor: pointer;
}
.table.b-table.b-table-selectable:not(.b-table-selectable-no-click).b-table-selecting.b-table-select-range > tbody > tr {
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

@media (max-width: 575.98px) {
  .table.b-table.b-table-stacked-sm {
    display: block;
    width: 100%;
  }
  .table.b-table.b-table-stacked-sm > caption,
.table.b-table.b-table-stacked-sm > tbody,
.table.b-table.b-table-stacked-sm > tbody > tr,
.table.b-table.b-table-stacked-sm > tbody > tr > td,
.table.b-table.b-table-stacked-sm > tbody > tr > th {
    display: block;
  }
  .table.b-table.b-table-stacked-sm > thead,
.table.b-table.b-table-stacked-sm > tfoot {
    display: none;
  }
  .table.b-table.b-table-stacked-sm > thead > tr.b-table-top-row,
.table.b-table.b-table-stacked-sm > thead > tr.b-table-bottom-row,
.table.b-table.b-table-stacked-sm > tfoot > tr.b-table-top-row,
.table.b-table.b-table-stacked-sm > tfoot > tr.b-table-bottom-row {
    display: none;
  }
  .table.b-table.b-table-stacked-sm > caption {
    caption-side: top !important;
  }
  .table.b-table.b-table-stacked-sm > tbody > tr > [data-label]::before {
    content: attr(data-label);
    width: 40%;
    float: left;
    text-align: right;
    overflow-wrap: break-word;
    font-weight: bold;
    font-style: normal;
    padding: 0 calc(1rem / 2) 0 0;
    margin: 0;
  }
  .table.b-table.b-table-stacked-sm > tbody > tr > [data-label]::after {
    display: block;
    clear: both;
    content: "";
  }
  .table.b-table.b-table-stacked-sm > tbody > tr > [data-label] > div {
    display: inline-block;
    width: calc(100% - 40%);
    padding: 0 0 0 calc(1rem / 2);
    margin: 0;
  }
  .table.b-table.b-table-stacked-sm > tbody > tr.top-row, .table.b-table.b-table-stacked-sm > tbody > tr.bottom-row {
    display: none;
  }
  .table.b-table.b-table-stacked-sm > tbody > tr > :first-child {
    border-top-width: 3px;
  }
  .table.b-table.b-table-stacked-sm > tbody > tr > [rowspan] + td,
.table.b-table.b-table-stacked-sm > tbody > tr > [rowspan] + th {
    border-top-width: 3px;
  }
}
@media (max-width: 767.98px) {
  .table.b-table.b-table-stacked-md {
    display: block;
    width: 100%;
  }
  .table.b-table.b-table-stacked-md > caption,
.table.b-table.b-table-stacked-md > tbody,
.table.b-table.b-table-stacked-md > tbody > tr,
.table.b-table.b-table-stacked-md > tbody > tr > td,
.table.b-table.b-table-stacked-md > tbody > tr > th {
    display: block;
  }
  .table.b-table.b-table-stacked-md > thead,
.table.b-table.b-table-stacked-md > tfoot {
    display: none;
  }
  .table.b-table.b-table-stacked-md > thead > tr.b-table-top-row,
.table.b-table.b-table-stacked-md > thead > tr.b-table-bottom-row,
.table.b-table.b-table-stacked-md > tfoot > tr.b-table-top-row,
.table.b-table.b-table-stacked-md > tfoot > tr.b-table-bottom-row {
    display: none;
  }
  .table.b-table.b-table-stacked-md > caption {
    caption-side: top !important;
  }
  .table.b-table.b-table-stacked-md > tbody > tr > [data-label]::before {
    content: attr(data-label);
    width: 40%;
    float: left;
    text-align: right;
    overflow-wrap: break-word;
    font-weight: bold;
    font-style: normal;
    padding: 0 calc(1rem / 2) 0 0;
    margin: 0;
  }
  .table.b-table.b-table-stacked-md > tbody > tr > [data-label]::after {
    display: block;
    clear: both;
    content: "";
  }
  .table.b-table.b-table-stacked-md > tbody > tr > [data-label] > div {
    display: inline-block;
    width: calc(100% - 40%);
    padding: 0 0 0 calc(1rem / 2);
    margin: 0;
  }
  .table.b-table.b-table-stacked-md > tbody > tr.top-row, .table.b-table.b-table-stacked-md > tbody > tr.bottom-row {
    display: none;
  }
  .table.b-table.b-table-stacked-md > tbody > tr > :first-child {
    border-top-width: 3px;
  }
  .table.b-table.b-table-stacked-md > tbody > tr > [rowspan] + td,
.table.b-table.b-table-stacked-md > tbody > tr > [rowspan] + th {
    border-top-width: 3px;
  }
}
@media (max-width: 991.98px) {
  .table.b-table.b-table-stacked-lg {
    display: block;
    width: 100%;
  }
  .table.b-table.b-table-stacked-lg > caption,
.table.b-table.b-table-stacked-lg > tbody,
.table.b-table.b-table-stacked-lg > tbody > tr,
.table.b-table.b-table-stacked-lg > tbody > tr > td,
.table.b-table.b-table-stacked-lg > tbody > tr > th {
    display: block;
  }
  .table.b-table.b-table-stacked-lg > thead,
.table.b-table.b-table-stacked-lg > tfoot {
    display: none;
  }
  .table.b-table.b-table-stacked-lg > thead > tr.b-table-top-row,
.table.b-table.b-table-stacked-lg > thead > tr.b-table-bottom-row,
.table.b-table.b-table-stacked-lg > tfoot > tr.b-table-top-row,
.table.b-table.b-table-stacked-lg > tfoot > tr.b-table-bottom-row {
    display: none;
  }
  .table.b-table.b-table-stacked-lg > caption {
    caption-side: top !important;
  }
  .table.b-table.b-table-stacked-lg > tbody > tr > [data-label]::before {
    content: attr(data-label);
    width: 40%;
    float: left;
    text-align: right;
    overflow-wrap: break-word;
    font-weight: bold;
    font-style: normal;
    padding: 0 calc(1rem / 2) 0 0;
    margin: 0;
  }
  .table.b-table.b-table-stacked-lg > tbody > tr > [data-label]::after {
    display: block;
    clear: both;
    content: "";
  }
  .table.b-table.b-table-stacked-lg > tbody > tr > [data-label] > div {
    display: inline-block;
    width: calc(100% - 40%);
    padding: 0 0 0 calc(1rem / 2);
    margin: 0;
  }
  .table.b-table.b-table-stacked-lg > tbody > tr.top-row, .table.b-table.b-table-stacked-lg > tbody > tr.bottom-row {
    display: none;
  }
  .table.b-table.b-table-stacked-lg > tbody > tr > :first-child {
    border-top-width: 3px;
  }
  .table.b-table.b-table-stacked-lg > tbody > tr > [rowspan] + td,
.table.b-table.b-table-stacked-lg > tbody > tr > [rowspan] + th {
    border-top-width: 3px;
  }
}
@media (max-width: 1199.98px) {
  .table.b-table.b-table-stacked-xl {
    display: block;
    width: 100%;
  }
  .table.b-table.b-table-stacked-xl > caption,
.table.b-table.b-table-stacked-xl > tbody,
.table.b-table.b-table-stacked-xl > tbody > tr,
.table.b-table.b-table-stacked-xl > tbody > tr > td,
.table.b-table.b-table-stacked-xl > tbody > tr > th {
    display: block;
  }
  .table.b-table.b-table-stacked-xl > thead,
.table.b-table.b-table-stacked-xl > tfoot {
    display: none;
  }
  .table.b-table.b-table-stacked-xl > thead > tr.b-table-top-row,
.table.b-table.b-table-stacked-xl > thead > tr.b-table-bottom-row,
.table.b-table.b-table-stacked-xl > tfoot > tr.b-table-top-row,
.table.b-table.b-table-stacked-xl > tfoot > tr.b-table-bottom-row {
    display: none;
  }
  .table.b-table.b-table-stacked-xl > caption {
    caption-side: top !important;
  }
  .table.b-table.b-table-stacked-xl > tbody > tr > [data-label]::before {
    content: attr(data-label);
    width: 40%;
    float: left;
    text-align: right;
    overflow-wrap: break-word;
    font-weight: bold;
    font-style: normal;
    padding: 0 calc(1rem / 2) 0 0;
    margin: 0;
  }
  .table.b-table.b-table-stacked-xl > tbody > tr > [data-label]::after {
    display: block;
    clear: both;
    content: "";
  }
  .table.b-table.b-table-stacked-xl > tbody > tr > [data-label] > div {
    display: inline-block;
    width: calc(100% - 40%);
    padding: 0 0 0 calc(1rem / 2);
    margin: 0;
  }
  .table.b-table.b-table-stacked-xl > tbody > tr.top-row, .table.b-table.b-table-stacked-xl > tbody > tr.bottom-row {
    display: none;
  }
  .table.b-table.b-table-stacked-xl > tbody > tr > :first-child {
    border-top-width: 3px;
  }
  .table.b-table.b-table-stacked-xl > tbody > tr > [rowspan] + td,
.table.b-table.b-table-stacked-xl > tbody > tr > [rowspan] + th {
    border-top-width: 3px;
  }
}
.table.b-table.b-table-stacked {
  display: block;
  width: 100%;
}
.table.b-table.b-table-stacked > caption,
.table.b-table.b-table-stacked > tbody,
.table.b-table.b-table-stacked > tbody > tr,
.table.b-table.b-table-stacked > tbody > tr > td,
.table.b-table.b-table-stacked > tbody > tr > th {
  display: block;
}
.table.b-table.b-table-stacked > thead,
.table.b-table.b-table-stacked > tfoot {
  display: none;
}
.table.b-table.b-table-stacked > thead > tr.b-table-top-row,
.table.b-table.b-table-stacked > thead > tr.b-table-bottom-row,
.table.b-table.b-table-stacked > tfoot > tr.b-table-top-row,
.table.b-table.b-table-stacked > tfoot > tr.b-table-bottom-row {
  display: none;
}
.table.b-table.b-table-stacked > caption {
  caption-side: top !important;
}
.table.b-table.b-table-stacked > tbody > tr > [data-label]::before {
  content: attr(data-label);
  width: 40%;
  float: left;
  text-align: right;
  overflow-wrap: break-word;
  font-weight: bold;
  font-style: normal;
  padding: 0 calc(1rem / 2) 0 0;
  margin: 0;
}
.table.b-table.b-table-stacked > tbody > tr > [data-label]::after {
  display: block;
  clear: both;
  content: "";
}
.table.b-table.b-table-stacked > tbody > tr > [data-label] > div {
  display: inline-block;
  width: calc(100% - 40%);
  padding: 0 0 0 calc(1rem / 2);
  margin: 0;
}
.table.b-table.b-table-stacked > tbody > tr.top-row, .table.b-table.b-table-stacked > tbody > tr.bottom-row {
  display: none;
}
.table.b-table.b-table-stacked > tbody > tr > :first-child {
  border-top-width: 3px;
}
.table.b-table.b-table-stacked > tbody > tr > [rowspan] + td,
.table.b-table.b-table-stacked > tbody > tr > [rowspan] + th {
  border-top-width: 3px;
}

.b-time {
  min-width: 150px;
}
.b-time[aria-disabled=true] output, .b-time[aria-readonly=true] output,
.b-time output.disabled {
  background-color: #e9ecef;
  opacity: 1;
}
.b-time[aria-disabled=true] output {
  pointer-events: none;
}
[dir=rtl] .b-time > .d-flex:not(.flex-column) {
  flex-direction: row-reverse;
}

.b-time .b-time-header {
  margin-bottom: 0.5rem;
}
.b-time .b-time-header output {
  padding: 0.25rem;
  font-size: 80%;
}
.b-time .b-time-footer {
  margin-top: 0.5rem;
}
.b-time .b-time-ampm {
  margin-left: 0.5rem;
}

.b-toast {
  display: block;
  position: relative;
  max-width: 350px;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
  background-clip: padding-box;
  z-index: 1;
  border-radius: 0.25rem;
}
.b-toast .toast {
  background-color: rgba(255, 255, 255, 0.85);
}
.b-toast:not(:last-child) {
  margin-bottom: 0.75rem;
}
.b-toast.b-toast-solid .toast {
  background-color: white;
}
.b-toast .toast {
  opacity: 1;
}
.b-toast .toast.fade:not(.show) {
  opacity: 0;
}
.b-toast .toast .toast-body {
  display: block;
}

.b-toast-primary .toast {
  background-color: rgba(230, 242, 255, 0.85);
  border-color: rgba(184, 218, 255, 0.85);
  color: #004085;
}
.b-toast-primary .toast .toast-header {
  color: #004085;
  background-color: rgba(204, 229, 255, 0.85);
  border-bottom-color: rgba(184, 218, 255, 0.85);
}
.b-toast-primary.b-toast-solid .toast {
  background-color: #e6f2ff;
}

.b-toast-secondary .toast {
  background-color: rgba(239, 240, 241, 0.85);
  border-color: rgba(214, 216, 219, 0.85);
  color: #383d41;
}
.b-toast-secondary .toast .toast-header {
  color: #383d41;
  background-color: rgba(226, 227, 229, 0.85);
  border-bottom-color: rgba(214, 216, 219, 0.85);
}
.b-toast-secondary.b-toast-solid .toast {
  background-color: #eff0f1;
}

.b-toast-success .toast {
  background-color: rgba(230, 245, 233, 0.85);
  border-color: rgba(195, 230, 203, 0.85);
  color: #155724;
}
.b-toast-success .toast .toast-header {
  color: #155724;
  background-color: rgba(212, 237, 218, 0.85);
  border-bottom-color: rgba(195, 230, 203, 0.85);
}
.b-toast-success.b-toast-solid .toast {
  background-color: #e6f5e9;
}

.b-toast-info .toast {
  background-color: rgba(229, 244, 247, 0.85);
  border-color: rgba(190, 229, 235, 0.85);
  color: #0c5460;
}
.b-toast-info .toast .toast-header {
  color: #0c5460;
  background-color: rgba(209, 236, 241, 0.85);
  border-bottom-color: rgba(190, 229, 235, 0.85);
}
.b-toast-info.b-toast-solid .toast {
  background-color: #e5f4f7;
}

.b-toast-warning .toast {
  background-color: rgba(255, 249, 231, 0.85);
  border-color: rgba(255, 238, 186, 0.85);
  color: #856404;
}
.b-toast-warning .toast .toast-header {
  color: #856404;
  background-color: rgba(255, 243, 205, 0.85);
  border-bottom-color: rgba(255, 238, 186, 0.85);
}
.b-toast-warning.b-toast-solid .toast {
  background-color: #fff9e7;
}

.b-toast-danger .toast {
  background-color: rgba(252, 237, 238, 0.85);
  border-color: rgba(245, 198, 203, 0.85);
  color: #721c24;
}
.b-toast-danger .toast .toast-header {
  color: #721c24;
  background-color: rgba(248, 215, 218, 0.85);
  border-bottom-color: rgba(245, 198, 203, 0.85);
}
.b-toast-danger.b-toast-solid .toast {
  background-color: #fcedee;
}

.b-toast-light .toast {
  background-color: rgba(255, 255, 255, 0.85);
  border-color: rgba(253, 253, 254, 0.85);
  color: #818182;
}
.b-toast-light .toast .toast-header {
  color: #818182;
  background-color: rgba(254, 254, 254, 0.85);
  border-bottom-color: rgba(253, 253, 254, 0.85);
}
.b-toast-light.b-toast-solid .toast {
  background-color: white;
}

.b-toast-dark .toast {
  background-color: rgba(227, 229, 229, 0.85);
  border-color: rgba(198, 200, 202, 0.85);
  color: #1b1e21;
}
.b-toast-dark .toast .toast-header {
  color: #1b1e21;
  background-color: rgba(214, 216, 217, 0.85);
  border-bottom-color: rgba(198, 200, 202, 0.85);
}
.b-toast-dark.b-toast-solid .toast {
  background-color: #e3e5e5;
}

.b-toaster {
  z-index: 1100;
}
.b-toaster .b-toaster-slot {
  position: relative;
  display: block;
}
.b-toaster .b-toaster-slot:empty {
  display: none !important;
}

.b-toaster.b-toaster-top-right, .b-toaster.b-toaster-top-left, .b-toaster.b-toaster-top-center, .b-toaster.b-toaster-top-full, .b-toaster.b-toaster-bottom-right, .b-toaster.b-toaster-bottom-left, .b-toaster.b-toaster-bottom-center, .b-toaster.b-toaster-bottom-full {
  position: fixed;
  left: 0.5rem;
  right: 0.5rem;
  margin: 0;
  padding: 0;
  height: 0;
  overflow: visible;
}
.b-toaster.b-toaster-top-right .b-toaster-slot, .b-toaster.b-toaster-top-left .b-toaster-slot, .b-toaster.b-toaster-top-center .b-toaster-slot, .b-toaster.b-toaster-top-full .b-toaster-slot, .b-toaster.b-toaster-bottom-right .b-toaster-slot, .b-toaster.b-toaster-bottom-left .b-toaster-slot, .b-toaster.b-toaster-bottom-center .b-toaster-slot, .b-toaster.b-toaster-bottom-full .b-toaster-slot {
  position: absolute;
  max-width: 350px;
  width: 100%;
  /* IE 11 fix */
  left: 0;
  right: 0;
  padding: 0;
  margin: 0;
}
.b-toaster.b-toaster-top-full .b-toaster-slot, .b-toaster.b-toaster-bottom-full .b-toaster-slot {
  width: 100%;
  max-width: 100%;
}
.b-toaster.b-toaster-top-full .b-toaster-slot .b-toast,
.b-toaster.b-toaster-top-full .b-toaster-slot .toast, .b-toaster.b-toaster-bottom-full .b-toaster-slot .b-toast,
.b-toaster.b-toaster-bottom-full .b-toaster-slot .toast {
  width: 100%;
  max-width: 100%;
}
.b-toaster.b-toaster-top-right, .b-toaster.b-toaster-top-left, .b-toaster.b-toaster-top-center, .b-toaster.b-toaster-top-full {
  top: 0;
}
.b-toaster.b-toaster-top-right .b-toaster-slot, .b-toaster.b-toaster-top-left .b-toaster-slot, .b-toaster.b-toaster-top-center .b-toaster-slot, .b-toaster.b-toaster-top-full .b-toaster-slot {
  top: 0.5rem;
}
.b-toaster.b-toaster-bottom-right, .b-toaster.b-toaster-bottom-left, .b-toaster.b-toaster-bottom-center, .b-toaster.b-toaster-bottom-full {
  bottom: 0;
}
.b-toaster.b-toaster-bottom-right .b-toaster-slot, .b-toaster.b-toaster-bottom-left .b-toaster-slot, .b-toaster.b-toaster-bottom-center .b-toaster-slot, .b-toaster.b-toaster-bottom-full .b-toaster-slot {
  bottom: 0.5rem;
}
.b-toaster.b-toaster-top-right .b-toaster-slot, .b-toaster.b-toaster-bottom-right .b-toaster-slot, .b-toaster.b-toaster-top-center .b-toaster-slot, .b-toaster.b-toaster-bottom-center .b-toaster-slot {
  margin-left: auto;
}
.b-toaster.b-toaster-top-left .b-toaster-slot, .b-toaster.b-toaster-bottom-left .b-toaster-slot, .b-toaster.b-toaster-top-center .b-toaster-slot, .b-toaster.b-toaster-bottom-center .b-toaster-slot {
  margin-right: auto;
}

.b-toaster.b-toaster-top-right .b-toast.b-toaster-enter-active, .b-toaster.b-toaster-top-right .b-toast.b-toaster-leave-active, .b-toaster.b-toaster-top-right .b-toast.b-toaster-move, .b-toaster.b-toaster-top-left .b-toast.b-toaster-enter-active, .b-toaster.b-toaster-top-left .b-toast.b-toaster-leave-active, .b-toaster.b-toaster-top-left .b-toast.b-toaster-move, .b-toaster.b-toaster-bottom-right .b-toast.b-toaster-enter-active, .b-toaster.b-toaster-bottom-right .b-toast.b-toaster-leave-active, .b-toaster.b-toaster-bottom-right .b-toast.b-toaster-move, .b-toaster.b-toaster-bottom-left .b-toast.b-toaster-enter-active, .b-toaster.b-toaster-bottom-left .b-toast.b-toaster-leave-active, .b-toaster.b-toaster-bottom-left .b-toast.b-toaster-move {
  transition: -webkit-transform 0.175s;
  transition: transform 0.175s;
  transition: transform 0.175s, -webkit-transform 0.175s;
}
.b-toaster.b-toaster-top-right .b-toast.b-toaster-enter-to .toast.fade, .b-toaster.b-toaster-top-right .b-toast.b-toaster-enter-active .toast.fade, .b-toaster.b-toaster-top-left .b-toast.b-toaster-enter-to .toast.fade, .b-toaster.b-toaster-top-left .b-toast.b-toaster-enter-active .toast.fade, .b-toaster.b-toaster-bottom-right .b-toast.b-toaster-enter-to .toast.fade, .b-toaster.b-toaster-bottom-right .b-toast.b-toaster-enter-active .toast.fade, .b-toaster.b-toaster-bottom-left .b-toast.b-toaster-enter-to .toast.fade, .b-toaster.b-toaster-bottom-left .b-toast.b-toaster-enter-active .toast.fade {
  transition-delay: 0.175s;
}
.b-toaster.b-toaster-top-right .b-toast.b-toaster-leave-active, .b-toaster.b-toaster-top-left .b-toast.b-toaster-leave-active, .b-toaster.b-toaster-bottom-right .b-toast.b-toaster-leave-active, .b-toaster.b-toaster-bottom-left .b-toast.b-toaster-leave-active {
  position: absolute;
  transition-delay: 0.175s;
}
.b-toaster.b-toaster-top-right .b-toast.b-toaster-leave-active .toast.fade, .b-toaster.b-toaster-top-left .b-toast.b-toaster-leave-active .toast.fade, .b-toaster.b-toaster-bottom-right .b-toast.b-toaster-leave-active .toast.fade, .b-toaster.b-toaster-bottom-left .b-toast.b-toaster-leave-active .toast.fade {
  transition-delay: 0s;
}
.tooltip.b-tooltip {
  display: block;
  opacity: 0.9;
  outline: 0;
}
.tooltip.b-tooltip.fade:not(.show) {
  opacity: 0;
}
.tooltip.b-tooltip.show {
  opacity: 0.9;
}
.tooltip.b-tooltip.noninteractive {
  pointer-events: none;
}
.tooltip.b-tooltip .arrow {
  margin: 0 0.25rem;
}
.tooltip.b-tooltip.bs-tooltip-right .arrow, .tooltip.b-tooltip.b-tooltip-dark.bs-tooltip-auto[x-placement^=right] .arrow, .tooltip.b-tooltip.b-tooltip-light.bs-tooltip-auto[x-placement^=right] .arrow, .tooltip.b-tooltip.b-tooltip-danger.bs-tooltip-auto[x-placement^=right] .arrow, .tooltip.b-tooltip.b-tooltip-warning.bs-tooltip-auto[x-placement^=right] .arrow, .tooltip.b-tooltip.b-tooltip-info.bs-tooltip-auto[x-placement^=right] .arrow, .tooltip.b-tooltip.b-tooltip-success.bs-tooltip-auto[x-placement^=right] .arrow, .tooltip.b-tooltip.b-tooltip-secondary.bs-tooltip-auto[x-placement^=right] .arrow, .tooltip.b-tooltip.b-tooltip-primary.bs-tooltip-auto[x-placement^=right] .arrow, .tooltip.b-tooltip.bs-tooltip-left .arrow, .tooltip.b-tooltip.b-tooltip-dark.bs-tooltip-auto[x-placement^=left] .arrow, .tooltip.b-tooltip.b-tooltip-light.bs-tooltip-auto[x-placement^=left] .arrow, .tooltip.b-tooltip.b-tooltip-danger.bs-tooltip-auto[x-placement^=left] .arrow, .tooltip.b-tooltip.b-tooltip-warning.bs-tooltip-auto[x-placement^=left] .arrow, .tooltip.b-tooltip.b-tooltip-info.bs-tooltip-auto[x-placement^=left] .arrow, .tooltip.b-tooltip.b-tooltip-success.bs-tooltip-auto[x-placement^=left] .arrow, .tooltip.b-tooltip.b-tooltip-secondary.bs-tooltip-auto[x-placement^=left] .arrow, .tooltip.b-tooltip.b-tooltip-primary.bs-tooltip-auto[x-placement^=left] .arrow {
  margin: 0.25rem 0;
}

.tooltip.b-tooltip-primary.bs-tooltip-top .arrow::before, .tooltip.b-tooltip-primary.bs-tooltip-auto[x-placement^=top] .arrow::before {
  border-top-color: #007bff;
}
.tooltip.b-tooltip-primary.bs-tooltip-right .arrow::before, .tooltip.b-tooltip-primary.bs-tooltip-auto[x-placement^=right] .arrow::before {
  border-right-color: #007bff;
}
.tooltip.b-tooltip-primary.bs-tooltip-bottom .arrow::before, .tooltip.b-tooltip-primary.bs-tooltip-auto[x-placement^=bottom] .arrow::before {
  border-bottom-color: #007bff;
}
.tooltip.b-tooltip-primary.bs-tooltip-left .arrow::before, .tooltip.b-tooltip-primary.bs-tooltip-auto[x-placement^=left] .arrow::before {
  border-left-color: #007bff;
}
.tooltip.b-tooltip-primary .tooltip-inner {
  color: #fff;
  background-color: #007bff;
}

.tooltip.b-tooltip-secondary.bs-tooltip-top .arrow::before, .tooltip.b-tooltip-secondary.bs-tooltip-auto[x-placement^=top] .arrow::before {
  border-top-color: #6c757d;
}
.tooltip.b-tooltip-secondary.bs-tooltip-right .arrow::before, .tooltip.b-tooltip-secondary.bs-tooltip-auto[x-placement^=right] .arrow::before {
  border-right-color: #6c757d;
}
.tooltip.b-tooltip-secondary.bs-tooltip-bottom .arrow::before, .tooltip.b-tooltip-secondary.bs-tooltip-auto[x-placement^=bottom] .arrow::before {
  border-bottom-color: #6c757d;
}
.tooltip.b-tooltip-secondary.bs-tooltip-left .arrow::before, .tooltip.b-tooltip-secondary.bs-tooltip-auto[x-placement^=left] .arrow::before {
  border-left-color: #6c757d;
}
.tooltip.b-tooltip-secondary .tooltip-inner {
  color: #fff;
  background-color: #6c757d;
}

.tooltip.b-tooltip-success.bs-tooltip-top .arrow::before, .tooltip.b-tooltip-success.bs-tooltip-auto[x-placement^=top] .arrow::before {
  border-top-color: #28a745;
}
.tooltip.b-tooltip-success.bs-tooltip-right .arrow::before, .tooltip.b-tooltip-success.bs-tooltip-auto[x-placement^=right] .arrow::before {
  border-right-color: #28a745;
}
.tooltip.b-tooltip-success.bs-tooltip-bottom .arrow::before, .tooltip.b-tooltip-success.bs-tooltip-auto[x-placement^=bottom] .arrow::before {
  border-bottom-color: #28a745;
}
.tooltip.b-tooltip-success.bs-tooltip-left .arrow::before, .tooltip.b-tooltip-success.bs-tooltip-auto[x-placement^=left] .arrow::before {
  border-left-color: #28a745;
}
.tooltip.b-tooltip-success .tooltip-inner {
  color: #fff;
  background-color: #28a745;
}

.tooltip.b-tooltip-info.bs-tooltip-top .arrow::before, .tooltip.b-tooltip-info.bs-tooltip-auto[x-placement^=top] .arrow::before {
  border-top-color: #17a2b8;
}
.tooltip.b-tooltip-info.bs-tooltip-right .arrow::before, .tooltip.b-tooltip-info.bs-tooltip-auto[x-placement^=right] .arrow::before {
  border-right-color: #17a2b8;
}
.tooltip.b-tooltip-info.bs-tooltip-bottom .arrow::before, .tooltip.b-tooltip-info.bs-tooltip-auto[x-placement^=bottom] .arrow::before {
  border-bottom-color: #17a2b8;
}
.tooltip.b-tooltip-info.bs-tooltip-left .arrow::before, .tooltip.b-tooltip-info.bs-tooltip-auto[x-placement^=left] .arrow::before {
  border-left-color: #17a2b8;
}
.tooltip.b-tooltip-info .tooltip-inner {
  color: #fff;
  background-color: #17a2b8;
}

.tooltip.b-tooltip-warning.bs-tooltip-top .arrow::before, .tooltip.b-tooltip-warning.bs-tooltip-auto[x-placement^=top] .arrow::before {
  border-top-color: #ffc107;
}
.tooltip.b-tooltip-warning.bs-tooltip-right .arrow::before, .tooltip.b-tooltip-warning.bs-tooltip-auto[x-placement^=right] .arrow::before {
  border-right-color: #ffc107;
}
.tooltip.b-tooltip-warning.bs-tooltip-bottom .arrow::before, .tooltip.b-tooltip-warning.bs-tooltip-auto[x-placement^=bottom] .arrow::before {
  border-bottom-color: #ffc107;
}
.tooltip.b-tooltip-warning.bs-tooltip-left .arrow::before, .tooltip.b-tooltip-warning.bs-tooltip-auto[x-placement^=left] .arrow::before {
  border-left-color: #ffc107;
}
.tooltip.b-tooltip-warning .tooltip-inner {
  color: #212529;
  background-color: #ffc107;
}

.tooltip.b-tooltip-danger.bs-tooltip-top .arrow::before, .tooltip.b-tooltip-danger.bs-tooltip-auto[x-placement^=top] .arrow::before {
  border-top-color: #dc3545;
}
.tooltip.b-tooltip-danger.bs-tooltip-right .arrow::before, .tooltip.b-tooltip-danger.bs-tooltip-auto[x-placement^=right] .arrow::before {
  border-right-color: #dc3545;
}
.tooltip.b-tooltip-danger.bs-tooltip-bottom .arrow::before, .tooltip.b-tooltip-danger.bs-tooltip-auto[x-placement^=bottom] .arrow::before {
  border-bottom-color: #dc3545;
}
.tooltip.b-tooltip-danger.bs-tooltip-left .arrow::before, .tooltip.b-tooltip-danger.bs-tooltip-auto[x-placement^=left] .arrow::before {
  border-left-color: #dc3545;
}
.tooltip.b-tooltip-danger .tooltip-inner {
  color: #fff;
  background-color: #dc3545;
}

.tooltip.b-tooltip-light.bs-tooltip-top .arrow::before, .tooltip.b-tooltip-light.bs-tooltip-auto[x-placement^=top] .arrow::before {
  border-top-color: #f8f9fa;
}
.tooltip.b-tooltip-light.bs-tooltip-right .arrow::before, .tooltip.b-tooltip-light.bs-tooltip-auto[x-placement^=right] .arrow::before {
  border-right-color: #f8f9fa;
}
.tooltip.b-tooltip-light.bs-tooltip-bottom .arrow::before, .tooltip.b-tooltip-light.bs-tooltip-auto[x-placement^=bottom] .arrow::before {
  border-bottom-color: #f8f9fa;
}
.tooltip.b-tooltip-light.bs-tooltip-left .arrow::before, .tooltip.b-tooltip-light.bs-tooltip-auto[x-placement^=left] .arrow::before {
  border-left-color: #f8f9fa;
}
.tooltip.b-tooltip-light .tooltip-inner {
  color: #212529;
  background-color: #f8f9fa;
}

.tooltip.b-tooltip-dark.bs-tooltip-top .arrow::before, .tooltip.b-tooltip-dark.bs-tooltip-auto[x-placement^=top] .arrow::before {
  border-top-color: #343a40;
}
.tooltip.b-tooltip-dark.bs-tooltip-right .arrow::before, .tooltip.b-tooltip-dark.bs-tooltip-auto[x-placement^=right] .arrow::before {
  border-right-color: #343a40;
}
.tooltip.b-tooltip-dark.bs-tooltip-bottom .arrow::before, .tooltip.b-tooltip-dark.bs-tooltip-auto[x-placement^=bottom] .arrow::before {
  border-bottom-color: #343a40;
}
.tooltip.b-tooltip-dark.bs-tooltip-left .arrow::before, .tooltip.b-tooltip-dark.bs-tooltip-auto[x-placement^=left] .arrow::before {
  border-left-color: #343a40;
}
.tooltip.b-tooltip-dark .tooltip-inner {
  color: #fff;
  background-color: #343a40;
}

.b-icon.bi {
  display: inline-block;
  overflow: visible;
  vertical-align: -0.15em;
}
.b-icon.b-icon-animation-cylon, .b-icon.b-iconstack .b-icon-animation-cylon > g {
  -webkit-transform-origin: center;
  transform-origin: center;
  -webkit-animation: 0.75s infinite ease-in-out alternate b-icon-animation-cylon;
  animation: 0.75s infinite ease-in-out alternate b-icon-animation-cylon;
}
@media (prefers-reduced-motion: reduce) {
  .b-icon.b-icon-animation-cylon, .b-icon.b-iconstack .b-icon-animation-cylon > g {
    -webkit-animation: none;
    animation: none;
  }
}
.b-icon.b-icon-animation-cylon-vertical, .b-icon.b-iconstack .b-icon-animation-cylon-vertical > g {
  -webkit-transform-origin: center;
  transform-origin: center;
  -webkit-animation: 0.75s infinite ease-in-out alternate b-icon-animation-cylon-vertical;
  animation: 0.75s infinite ease-in-out alternate b-icon-animation-cylon-vertical;
}
@media (prefers-reduced-motion: reduce) {
  .b-icon.b-icon-animation-cylon-vertical, .b-icon.b-iconstack .b-icon-animation-cylon-vertical > g {
    -webkit-animation: none;
    animation: none;
  }
}
.b-icon.b-icon-animation-fade, .b-icon.b-iconstack .b-icon-animation-fade > g {
  -webkit-transform-origin: center;
  transform-origin: center;
  -webkit-animation: 0.75s infinite ease-in-out alternate b-icon-animation-fade;
  animation: 0.75s infinite ease-in-out alternate b-icon-animation-fade;
}
@media (prefers-reduced-motion: reduce) {
  .b-icon.b-icon-animation-fade, .b-icon.b-iconstack .b-icon-animation-fade > g {
    -webkit-animation: none;
    animation: none;
  }
}
.b-icon.b-icon-animation-spin, .b-icon.b-iconstack .b-icon-animation-spin > g {
  -webkit-transform-origin: center;
  transform-origin: center;
  -webkit-animation: 2s infinite linear normal b-icon-animation-spin;
  animation: 2s infinite linear normal b-icon-animation-spin;
}
@media (prefers-reduced-motion: reduce) {
  .b-icon.b-icon-animation-spin, .b-icon.b-iconstack .b-icon-animation-spin > g {
    -webkit-animation: none;
    animation: none;
  }
}
.b-icon.b-icon-animation-spin-reverse, .b-icon.b-iconstack .b-icon-animation-spin-reverse > g {
  -webkit-transform-origin: center;
  transform-origin: center;
  animation: 2s infinite linear reverse b-icon-animation-spin;
}
@media (prefers-reduced-motion: reduce) {
  .b-icon.b-icon-animation-spin-reverse, .b-icon.b-iconstack .b-icon-animation-spin-reverse > g {
    -webkit-animation: none;
    animation: none;
  }
}
.b-icon.b-icon-animation-spin-pulse, .b-icon.b-iconstack .b-icon-animation-spin-pulse > g {
  -webkit-transform-origin: center;
  transform-origin: center;
  -webkit-animation: 1s infinite steps(8) normal b-icon-animation-spin;
  animation: 1s infinite steps(8) normal b-icon-animation-spin;
}
@media (prefers-reduced-motion: reduce) {
  .b-icon.b-icon-animation-spin-pulse, .b-icon.b-iconstack .b-icon-animation-spin-pulse > g {
    -webkit-animation: none;
    animation: none;
  }
}
.b-icon.b-icon-animation-spin-reverse-pulse, .b-icon.b-iconstack .b-icon-animation-spin-reverse-pulse > g {
  -webkit-transform-origin: center;
  transform-origin: center;
  animation: 1s infinite steps(8) reverse b-icon-animation-spin;
}
@media (prefers-reduced-motion: reduce) {
  .b-icon.b-icon-animation-spin-reverse-pulse, .b-icon.b-iconstack .b-icon-animation-spin-reverse-pulse > g {
    -webkit-animation: none;
    animation: none;
  }
}
.b-icon.b-icon-animation-throb, .b-icon.b-iconstack .b-icon-animation-throb > g {
  -webkit-transform-origin: center;
  transform-origin: center;
  -webkit-animation: 0.75s infinite ease-in-out alternate b-icon-animation-throb;
  animation: 0.75s infinite ease-in-out alternate b-icon-animation-throb;
}
@media (prefers-reduced-motion: reduce) {
  .b-icon.b-icon-animation-throb, .b-icon.b-iconstack .b-icon-animation-throb > g {
    -webkit-animation: none;
    animation: none;
  }
}

@-webkit-keyframes b-icon-animation-cylon {
  0% {
    -webkit-transform: translateX(-25%);
    transform: translateX(-25%);
  }
  100% {
    -webkit-transform: translateX(25%);
    transform: translateX(25%);
  }
}

@keyframes b-icon-animation-cylon {
  0% {
    -webkit-transform: translateX(-25%);
    transform: translateX(-25%);
  }
  100% {
    -webkit-transform: translateX(25%);
    transform: translateX(25%);
  }
}
@-webkit-keyframes b-icon-animation-cylon-vertical {
  0% {
    -webkit-transform: translateY(25%);
    transform: translateY(25%);
  }
  100% {
    -webkit-transform: translateY(-25%);
    transform: translateY(-25%);
  }
}
@keyframes b-icon-animation-cylon-vertical {
  0% {
    -webkit-transform: translateY(25%);
    transform: translateY(25%);
  }
  100% {
    -webkit-transform: translateY(-25%);
    transform: translateY(-25%);
  }
}
@-webkit-keyframes b-icon-animation-fade {
  0% {
    opacity: 0.1;
  }
  100% {
    opacity: 1;
  }
}
@keyframes b-icon-animation-fade {
  0% {
    opacity: 0.1;
  }
  100% {
    opacity: 1;
  }
}
@-webkit-keyframes b-icon-animation-spin {
  0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(359deg);
    transform: rotate(359deg);
  }
}
@keyframes b-icon-animation-spin {
  0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(359deg);
    transform: rotate(359deg);
  }
}
@-webkit-keyframes b-icon-animation-throb {
  0% {
    opacity: 0.5;
    -webkit-transform: scale(0.5);
    transform: scale(0.5);
  }
  100% {
    opacity: 1;
    -webkit-transform: scale(1);
    transform: scale(1);
  }
}
@keyframes b-icon-animation-throb {
  0% {
    opacity: 0.5;
    -webkit-transform: scale(0.5);
    transform: scale(0.5);
  }
  100% {
    opacity: 1;
    -webkit-transform: scale(1);
    transform: scale(1);
  }
}
.btn .b-icon.bi,
.nav-link .b-icon.bi,
.dropdown-toggle .b-icon.bi,
.dropdown-item .b-icon.bi,
.input-group-text .b-icon.bi {
  font-size: 125%;
  vertical-align: text-bottom;
}</style><style>




.vgt-table.striped tbody tr:nth-of-type(odd){background-color:rgba(51,68,109,.03)}.vgt-right-align{text-align:right}.vgt-left-align{text-align:left}.vgt-center-align{text-align:center}.vgt-pull-left{float:left!important}.vgt-pull-right{float:right!important}.vgt-clearfix::after{display:block;content:"";clear:both}.vgt-responsive{width:100%;overflow-x:auto;position:relative}.vgt-text-disabled{color:#909399}.sr-only{clip:rect(0 0 0 0);clip-path:inset(50%);height:1px;overflow:hidden;position:absolute;white-space:nowrap;width:1px}.vgt-wrap{position:relative}.vgt-fixed-header{position:absolute;z-index:10;overflow-x:auto}table.vgt-table{font-size:16px;border-collapse:collapse;background-color:#fff;width:100%;max-width:100%;table-layout:auto;border:1px solid #dcdfe6}table.vgt-table td{padding:.75em .75em .75em .75em;vertical-align:top;border-bottom:1px solid #dcdfe6;color:#606266}table.vgt-table tr.clickable{cursor:pointer}table.vgt-table tr.clickable:hover{background-color:#f1f5fd}.vgt-table th{padding:.75em 1.5em .75em .75em;vertical-align:middle;position:relative}.vgt-table th.sortable button{-webkit-appearance:none;-moz-appearance:none;appearance:none;background:0 0;border:none;position:absolute;top:0;left:0;width:100%;height:100%}.vgt-table th.sortable button:focus{outline:0}.vgt-table th.sortable button:after{content:"";position:absolute;height:0;width:0;right:6px;top:50%;margin-top:-7px;border-left:5px solid transparent;border-right:5px solid transparent;border-bottom:5px solid #606266}.vgt-table th.sortable button:before{content:"";position:absolute;height:0;width:0;right:6px;top:50%;margin-bottom:-7px;border-left:5px solid transparent;border-right:5px solid transparent;border-top:5px solid #606266}.vgt-table th.line-numbers,.vgt-table th.vgt-checkbox-col{padding:0 .75em 0 .75em;color:#606266;border-right:1px solid #dcdfe6;word-wrap:break-word;width:25px;text-align:center;background:linear-gradient(#f4f5f8,#f1f3f6)}.vgt-table th.filter-th{padding:.75em .75em .75em .75em}.vgt-table th.vgt-row-header{border-bottom:2px solid #dcdfe6;border-top:2px solid #dcdfe6;background-color:#fafafb}.vgt-table th.vgt-row-header .triangle{width:24px;height:24px;border-radius:15%;position:relative;margin:0 8px}.vgt-table th.vgt-row-header .triangle:after{content:"";position:absolute;display:block;left:50%;top:50%;margin-top:-6px;border-top:6px solid transparent;border-bottom:6px solid transparent;border-left:6px solid #606266;margin-left:-3px;transition:.3s ease transform}.vgt-table th.vgt-row-header .triangle.expand:after{transform:rotate(90deg)}.vgt-table thead th{color:#606266;vertical-align:bottom;border-bottom:1px solid #dcdfe6;padding-right:1.5em;background:linear-gradient(#f4f5f8,#f1f3f6)}.vgt-table thead th.vgt-checkbox-col{vertical-align:middle}.vgt-table thead th.sorting-asc button:after{border-bottom:5px solid #409eff}.vgt-table thead th.sorting-desc button:before{border-top:5px solid #409eff}.vgt-input,.vgt-select{width:100%;height:32px;line-height:1;display:block;font-size:14px;font-weight:400;padding:6px 12px;color:#606266;border-radius:4px;box-sizing:border-box;background-image:none;background-color:#fff;border:1px solid #dcdfe6;transition:border-color .2s cubic-bezier(.645,.045,.355,1)}.vgt-input::placeholder,.vgt-select::placeholder{color:#606266;opacity:.3}.vgt-input:focus,.vgt-select:focus{outline:0;border-color:#409eff}.vgt-loading{position:absolute;width:100%;z-index:10;margin-top:117px}.vgt-loading__content{background-color:#c0dfff;color:#409eff;padding:7px 30px;border-radius:3px}.vgt-inner-wrap.is-loading{opacity:.5;pointer-events:none}.vgt-table.bordered td,.vgt-table.bordered th{border:1px solid #dcdfe6}.vgt-table.bordered th.vgt-row-header{border-bottom:3px solid #dcdfe6}.vgt-wrap.rtl{direction:rtl}.vgt-wrap.rtl .vgt-table thead th,.vgt-wrap.rtl .vgt-table.condensed thead th{padding-left:1.5em;padding-right:.75em}.vgt-wrap.rtl .vgt-table th.sorting-asc:after,.vgt-wrap.rtl .vgt-table th.sorting:after{margin-right:5px;margin-left:0}.vgt-wrap.rtl .vgt-table th.sortable:after,.vgt-wrap.rtl .vgt-table th.sortable:before{right:inherit;left:6px}.vgt-table.condensed td,.vgt-table.condensed th.vgt-row-header{padding:.4em .4em .4em .4em}@media (max-width:576px){.vgt-compact *{box-sizing:border-box}.vgt-compact tbody,.vgt-compact td,.vgt-compact tr{display:block;width:100%}.vgt-compact thead{display:none}.vgt-compact tr{margin-bottom:15px}.vgt-compact td{text-align:right;position:relative}.vgt-compact td:before{content:attr(data-label);position:relative;float:left;left:0;width:40%;padding-left:10px;font-weight:700;text-align:left}.vgt-compact th.line-numbers{width:100%!important;display:block;padding:.3em 1em!important}}.vgt-global-search{padding:5px 0;display:flex;flex-wrap:nowrap;align-items:stretch;border:1px solid #dcdfe6;border-bottom:0;background:linear-gradient(#f4f5f8,#f1f3f6)}.vgt-global-search form{display:flex}.vgt-global-search form label{margin-top:3px}.vgt-global-search__input{position:relative;padding-left:40px;flex-grow:1}.vgt-global-search__input .input__icon{position:absolute;left:0;max-width:32px}.vgt-global-search__input .input__icon .magnifying-glass{margin-top:3px;margin-left:8px;display:block;width:16px;height:16px;border:2px solid #494949;position:relative;border-radius:50%}.vgt-global-search__input .input__icon .magnifying-glass:before{content:"";display:block;position:absolute;right:-7px;bottom:-5px;background:#494949;width:8px;height:4px;border-radius:2px;transform:rotate(45deg);-webkit-transform:rotate(45deg);-moz-transform:rotate(45deg);-ms-transform:rotate(45deg);-o-transform:rotate(45deg)}.vgt-global-search__actions{margin-left:10px}.vgt-selection-info-row{background:#fdf9e8;padding:5px 16px;font-size:13px;border-top:1px solid #dcdfe6;border-left:1px solid #dcdfe6;border-right:1px solid #dcdfe6;color:#d3aa3b;font-weight:700}.vgt-selection-info-row a{font-weight:700;display:inline-block;margin-left:10px}.vgt-wrap__actions-footer{border:1px solid #dcdfe6}.vgt-wrap__footer{color:#606266;font-size:1.1rem;padding:1em;border:1px solid #dcdfe6;background:linear-gradient(#f4f5f8,#f1f3f6)}.vgt-wrap__footer .footer__row-count{position:relative;padding-right:3px}.vgt-wrap__footer .footer__row-count__label,.vgt-wrap__footer .footer__row-count__select{display:inline-block;vertical-align:middle}.vgt-wrap__footer .footer__row-count__label{font-size:1.1rem}.vgt-wrap__footer .footer__row-count__select{font-size:1.1rem;background-color:transparent;width:auto;padding:0;border:0;border-radius:0;height:auto;margin-left:8px;color:#606266;font-weight:700;-webkit-appearance:none;-moz-appearance:none;appearance:none;padding-right:15px;padding-left:5px}.vgt-wrap__footer .footer__row-count__select::-ms-expand{display:none}.vgt-wrap__footer .footer__row-count__select:focus{outline:0;border-color:#409eff}.vgt-wrap__footer .footer__row-count::after{content:"";display:block;position:absolute;height:0;width:0;right:6px;top:50%;margin-top:-1px;border-top:6px solid #606266;border-left:6px solid transparent;border-right:6px solid transparent;border-bottom:none;pointer-events:none}.vgt-wrap__footer .footer__navigation{font-size:1.1rem}.vgt-wrap__footer .footer__navigation>button:first-of-type{margin-right:16px}.vgt-wrap__footer .footer__navigation__info,.vgt-wrap__footer .footer__navigation__page-btn,.vgt-wrap__footer .footer__navigation__page-info{display:inline-block;vertical-align:middle;color:#909399}.vgt-wrap__footer .footer__navigation__page-btn{-webkit-appearance:none;-moz-appearance:none;appearance:none;background:0 0;border:none;text-decoration:none;color:#606266;font-weight:700;white-space:nowrap;vertical-align:middle}.vgt-wrap__footer .footer__navigation__page-btn:hover{cursor:pointer}.vgt-wrap__footer .footer__navigation__page-btn.disabled,.vgt-wrap__footer .footer__navigation__page-btn.disabled:hover{opacity:.5;cursor:not-allowed}.vgt-wrap__footer .footer__navigation__page-btn.disabled .chevron.left:after,.vgt-wrap__footer .footer__navigation__page-btn.disabled:hover .chevron.left:after{border-right-color:#606266}.vgt-wrap__footer .footer__navigation__page-btn.disabled .chevron.right:after,.vgt-wrap__footer .footer__navigation__page-btn.disabled:hover .chevron.right:after{border-left-color:#606266}.vgt-wrap__footer .footer__navigation__page-btn span{display:inline-block;vertical-align:middle;font-size:1.1rem}.vgt-wrap__footer .footer__navigation__page-btn .chevron{width:24px;height:24px;border-radius:15%;position:relative;margin:0;display:inline-block;vertical-align:middle}.vgt-wrap__footer .footer__navigation__page-btn .chevron:after{content:"";position:absolute;display:block;left:50%;top:50%;margin-top:-6px;border-top:6px solid transparent;border-bottom:6px solid transparent}.vgt-wrap__footer .footer__navigation__page-btn .chevron.left::after{border-right:6px solid #409eff;margin-left:-3px}.vgt-wrap__footer .footer__navigation__page-btn .chevron.right::after{border-left:6px solid #409eff;margin-left:-3px}.vgt-wrap__footer .footer__navigation__info,.vgt-wrap__footer .footer__navigation__page-info{display:inline-block;margin:0 16px}.vgt-wrap__footer .footer__navigation__page-info span{display:inline-block;vertical-align:middle}.vgt-wrap__footer .footer__navigation__page-info__current-entry{width:30px;text-align:center;vertical-align:middle;display:inline-block;margin:0 10px;font-weight:700}@media only screen and (max-width:750px){.vgt-wrap__footer .footer__navigation__info{display:none}.vgt-wrap__footer .footer__navigation__page-btn{margin-left:16px}}.vgt-table.nocturnal{border:1px solid #435169;background-color:#324057}.vgt-table.nocturnal tr.clickable:hover{background-color:#445168}.vgt-table.nocturnal td{border-bottom:1px solid #435169;color:#c7ced8}.vgt-table.nocturnal th.line-numbers,.vgt-table.nocturnal th.vgt-checkbox-col{color:#c7ced8;border-right:1px solid #435169;background:linear-gradient(#2c394f,#2c394f)}.vgt-table.nocturnal thead th{color:#c7ced8;border-bottom:1px solid #435169;background:linear-gradient(#2c394f,#2c394f)}.vgt-table.nocturnal thead th.sortable:before{border-top-color:#3e5170}.vgt-table.nocturnal thead th.sortable:after{border-bottom-color:#3e5170}.vgt-table.nocturnal thead th.sortable.sorting-asc{color:#fff}.vgt-table.nocturnal thead th.sortable.sorting-asc:after{border-bottom-color:#409eff}.vgt-table.nocturnal thead th.sortable.sorting-desc{color:#fff}.vgt-table.nocturnal thead th.sortable.sorting-desc:before{border-top-color:#409eff}.vgt-table.nocturnal.bordered td,.vgt-table.nocturnal.bordered th{border:1px solid #435169}.vgt-table.nocturnal .vgt-input,.vgt-table.nocturnal .vgt-select{color:#c7ced8;background-color:#232d3f;border:1px solid #435169}.vgt-table.nocturnal .vgt-input::placeholder,.vgt-table.nocturnal .vgt-select::placeholder{color:#c7ced8;opacity:.3}.vgt-wrap.nocturnal .vgt-wrap__footer{color:#c7ced8;border:1px solid #435169;background:linear-gradient(#2c394f,#2c394f)}.vgt-wrap.nocturnal .vgt-wrap__footer .footer__row-count{position:relative}.vgt-wrap.nocturnal .vgt-wrap__footer .footer__row-count__label{color:#8290a7}.vgt-wrap.nocturnal .vgt-wrap__footer .footer__row-count__select{color:#c7ced8;background:#232d3f;border:none;-webkit-appearance:none;-moz-appearance:none;appearance:none;padding-right:15px;padding-left:10px;border-radius:3px;text-align:center}.vgt-wrap.nocturnal .vgt-wrap__footer .footer__row-count__select:focus{border-color:#409eff}.vgt-wrap.nocturnal .vgt-wrap__footer .footer__row-count::after{content:"";display:block;position:absolute;height:0;width:0;right:6px;top:50%;margin-top:-1px;border-top:6px solid #c7ced8;border-left:6px solid transparent;border-right:6px solid transparent;border-bottom:none;pointer-events:none}.vgt-wrap.nocturnal .vgt-wrap__footer .footer__navigation__page-btn{color:#c7ced8}.vgt-wrap.nocturnal .vgt-wrap__footer .footer__navigation__page-btn.disabled .chevron.left:after,.vgt-wrap.nocturnal .vgt-wrap__footer .footer__navigation__page-btn.disabled:hover .chevron.left:after{border-right-color:#c7ced8}.vgt-wrap.nocturnal .vgt-wrap__footer .footer__navigation__page-btn.disabled .chevron.right:after,.vgt-wrap.nocturnal .vgt-wrap__footer .footer__navigation__page-btn.disabled:hover .chevron.right:after{border-left-color:#c7ced8}.vgt-wrap.nocturnal .vgt-wrap__footer .footer__navigation__info,.vgt-wrap.nocturnal .vgt-wrap__footer .footer__navigation__page-info{color:#8290a7}.vgt-wrap.nocturnal .vgt-global-search{border:1px solid #435169;background:linear-gradient(#2c394f,#2c394f)}.vgt-wrap.nocturnal .vgt-global-search__input .input__icon .magnifying-glass{border:2px solid #3f4c63}.vgt-wrap.nocturnal .vgt-global-search__input .input__icon .magnifying-glass:before{background:#3f4c63}.vgt-wrap.nocturnal .vgt-global-search__input .vgt-input,.vgt-wrap.nocturnal .vgt-global-search__input .vgt-select{color:#c7ced8;background-color:#232d3f;border:1px solid #435169}.vgt-wrap.nocturnal .vgt-global-search__input .vgt-input::placeholder,.vgt-wrap.nocturnal .vgt-global-search__input .vgt-select::placeholder{color:#c7ced8;opacity:.3}.vgt-table.black-rhino{border:1px solid #435169;background-color:#dfe5ee}.vgt-table.black-rhino tr.clickable:hover{background-color:#fff}.vgt-table.black-rhino td{border-bottom:1px solid #bbc5d6;color:#49515e}.vgt-table.black-rhino th.line-numbers,.vgt-table.black-rhino th.vgt-checkbox-col{color:#dae2f0;border-right:1px solid #435169;background:linear-gradient(#4c5c79,#4e5d7c)}.vgt-table.black-rhino thead th{color:#dae2f0;text-shadow:1px 1px #3e5170;border-bottom:1px solid #435169;background:linear-gradient(#4c5c79,#4e5d7c)}.vgt-table.black-rhino thead th.sortable:before{border-top-color:#607498}.vgt-table.black-rhino thead th.sortable:after{border-bottom-color:#607498}.vgt-table.black-rhino thead th.sortable.sorting-asc{color:#fff}.vgt-table.black-rhino thead th.sortable.sorting-asc:after{border-bottom-color:#409eff}.vgt-table.black-rhino thead th.sortable.sorting-desc:before{border-top-color:#409eff}.vgt-table.black-rhino.bordered td{border:1px solid #bbc5d6}.vgt-table.black-rhino.bordered th{border:1px solid #435169}.vgt-table.black-rhino .vgt-input,.vgt-table.black-rhino .vgt-select{color:#dae2f0;background-color:#34445f;border:1px solid transparent}.vgt-table.black-rhino .vgt-input::placeholder,.vgt-table.black-rhino .vgt-select::placeholder{color:#dae2f0;opacity:.3}.vgt-wrap.black-rhino .vgt-wrap__footer{color:#dae2f0;border:1px solid #435169;background:linear-gradient(#4c5c79,#4e5d7c)}.vgt-wrap.black-rhino .vgt-wrap__footer .footer__row-count{position:relative;padding-right:3px}.vgt-wrap.black-rhino .vgt-wrap__footer .footer__row-count__label{color:#98a5b9}.vgt-wrap.black-rhino .vgt-wrap__footer .footer__row-count__select{color:#49515e;background:#34445f;border:none;-webkit-appearance:none;-moz-appearance:none;appearance:none;padding-right:15px;padding-left:5px;border-radius:3px}.vgt-wrap.black-rhino .vgt-wrap__footer .footer__row-count__select::-ms-expand{display:none}.vgt-wrap.black-rhino .vgt-wrap__footer .footer__row-count__select:focus{border-color:#409eff}.vgt-wrap.black-rhino .vgt-wrap__footer .footer__row-count::after{content:"";display:block;position:absolute;height:0;width:0;right:6px;top:50%;margin-top:-1px;border-top:6px solid #49515e;border-left:6px solid transparent;border-right:6px solid transparent;border-bottom:none;pointer-events:none}.vgt-wrap.black-rhino .vgt-wrap__footer .footer__navigation__page-btn{color:#dae2f0}.vgt-wrap.black-rhino .vgt-wrap__footer .footer__navigation__page-btn.disabled .chevron.left:after,.vgt-wrap.black-rhino .vgt-wrap__footer .footer__navigation__page-btn.disabled:hover .chevron.left:after{border-right-color:#dae2f0}.vgt-wrap.black-rhino .vgt-wrap__footer .footer__navigation__page-btn.disabled .chevron.right:after,.vgt-wrap.black-rhino .vgt-wrap__footer .footer__navigation__page-btn.disabled:hover .chevron.right:after{border-left-color:#dae2f0}.vgt-wrap.black-rhino .vgt-wrap__footer .footer__navigation__info,.vgt-wrap.black-rhino .vgt-wrap__footer .footer__navigation__page-info{color:#dae2f0}.vgt-wrap.black-rhino .vgt-global-search{border:1px solid #435169;background:linear-gradient(#4c5c79,#4e5d7c)}.vgt-wrap.black-rhino .vgt-global-search__input .input__icon .magnifying-glass{border:2px solid #3f4c63}.vgt-wrap.black-rhino .vgt-global-search__input .input__icon .magnifying-glass:before{background:#3f4c63}.vgt-wrap.black-rhino .vgt-global-search__input .vgt-input,.vgt-wrap.black-rhino .vgt-global-search__input .vgt-select{color:#dae2f0;background-color:#44516c;border:1px solid transparent}.vgt-wrap.black-rhino .vgt-global-search__input .vgt-input::placeholder,.vgt-wrap.black-rhino .vgt-global-search__input .vgt-select::placeholder{color:#dae2f0;opacity:.3}.vgt-inner-wrap{border-radius:.25rem;box-shadow:0 1px 3px 0 rgba(50,50,93,.1),0 1px 2px 0 rgba(50,50,93,.06)}.vgt-table.polar-bear{border-spacing:0;border-collapse:separate;font-size:1rem;background-color:#fff;border:1px solid #e3e8ee;border-bottom:none;border-radius:.25rem}.vgt-table.polar-bear td{padding:1em .75em 1em .75em;border-bottom:1px solid #e4ebf3;color:#525f7f}.vgt-table.polar-bear td.vgt-right-align{text-align:right}.vgt-table.polar-bear th.line-numbers,.vgt-table.polar-bear th.vgt-checkbox-col{color:#394567;border-right:1px solid #e3e8ee;background:#f7fafc}.vgt-table.polar-bear thead th{color:#667b94;font-weight:600;border-bottom:1px solid #e3e8ee;background:#f7fafc}.vgt-table.polar-bear thead th.sorting-asc,.vgt-table.polar-bear thead th.sorting-desc{color:#5e72e4}.vgt-table.polar-bear thead th.sorting-desc:before{border-top:5px solid #7485e8}.vgt-table.polar-bear thead th.sorting-asc:after{border-bottom:5px solid #7485e8}.vgt-table.polar-bear thead th .vgt-input,.vgt-table.polar-bear thead th .vgt-select{height:2.75em;box-shadow:0 1px 2px 0 rgba(0,0,0,.05);border:1px solid #e4ebf3}.vgt-table.polar-bear thead th .vgt-input:focus,.vgt-table.polar-bear thead th .vgt-select:focus{outline:0;border-color:#cae0fe}.vgt-table.polar-bear thead tr:first-child th:first-child{border-top-left-radius:.25rem}.vgt-table.polar-bear thead tr:first-child th:last-child{border-top-right-radius:.25rem}.vgt-table.polar-bear.bordered td{border:1px solid #e3e8ee;background:#fff}.vgt-table.polar-bear.bordered th{border:1px solid #e3e8ee}.vgt-wrap.polar-bear .vgt-wrap__footer{color:#394567;border:1px solid #e3e8ee;border-bottom:0;border-top:0;background:linear-gradient(#f7fafc,#f7fafc)}.vgt-wrap.polar-bear .vgt-wrap__footer .footer__row-count{position:relative;padding-right:3px}.vgt-wrap.polar-bear .vgt-wrap__footer .footer__row-count__label{color:#98a5b9}.vgt-wrap.polar-bear .vgt-wrap__footer .footer__row-count__select{text-align:center;color:#525f7f;background:#fff;border:none;-webkit-appearance:none;-moz-appearance:none;appearance:none;padding:5px;padding-right:30px;border-radius:3px;box-shadow:0 1px 2px 0 rgba(0,0,0,.05);border:1px solid #e4ebf3}.vgt-wrap.polar-bear .vgt-wrap__footer .footer__row-count__select::-ms-expand{display:none}.vgt-wrap.polar-bear .vgt-wrap__footer .footer__row-count__select:focus{border-color:#5e72e4}.vgt-wrap.polar-bear .vgt-wrap__footer .footer__row-count::after{content:"";display:block;position:absolute;height:0;width:0;right:15px;top:50%;margin-top:-3px;border-top:6px solid #525f7f;border-left:6px solid transparent;border-right:6px solid transparent;border-bottom:none;pointer-events:none}.vgt-wrap.polar-bear .vgt-wrap__footer .footer__navigation__page-btn{color:#394567}.vgt-wrap.polar-bear .vgt-wrap__footer .footer__navigation__page-btn.disabled .chevron.left:after,.vgt-wrap.polar-bear .vgt-wrap__footer .footer__navigation__page-btn.disabled:hover .chevron.left:after{border-right-color:#394567}.vgt-wrap.polar-bear .vgt-wrap__footer .footer__navigation__page-btn.disabled .chevron.right:after,.vgt-wrap.polar-bear .vgt-wrap__footer .footer__navigation__page-btn.disabled:hover .chevron.right:after{border-left-color:#394567}.vgt-wrap.polar-bear .vgt-wrap__footer .footer__navigation__info,.vgt-wrap.polar-bear .vgt-wrap__footer .footer__navigation__page-info{color:#394567}.vgt-wrap.polar-bear .vgt-global-search{border:1px solid #e3e8ee;border-bottom:0;border-top-left-radius:3px;border-top-right-radius:3px;background:#f7fafc}.vgt-wrap.polar-bear .vgt-global-search__input .input__icon .magnifying-glass{border:2px solid #dde3ea}.vgt-wrap.polar-bear .vgt-global-search__input .input__icon .magnifying-glass:before{background:#dde3ea}.vgt-wrap.polar-bear .vgt-global-search__input .vgt-input,.vgt-wrap.polar-bear .vgt-global-search__input .vgt-select{height:2.75em;box-shadow:0 1px 2px 0 rgba(0,0,0,.05);border:1px solid #e4ebf3}.vgt-wrap.polar-bear .vgt-global-search__input .vgt-input::placeholder,.vgt-wrap.polar-bear .vgt-global-search__input .vgt-select::placeholder{color:#394567;opacity:.3}</style><style>/* Make clicks pass-through */
#nprogress {
  pointer-events: none;
}

#nprogress .bar {
  background: #29d;

  position: fixed;
  z-index: 1031;
  top: 0;
  left: 0;

  width: 100%;
  height: 2px;
}

/* Fancy blur effect */
#nprogress .peg {
  display: block;
  position: absolute;
  right: 0px;
  width: 100px;
  height: 100%;
  box-shadow: 0 0 10px #29d, 0 0 5px #29d;
  opacity: 1.0;

  -webkit-transform: rotate(3deg) translate(0px, -4px);
      -ms-transform: rotate(3deg) translate(0px, -4px);
          transform: rotate(3deg) translate(0px, -4px);
}

/* Remove these to get rid of the spinner */
#nprogress .spinner {
  display: block;
  position: fixed;
  z-index: 1031;
  top: 15px;
  right: 15px;
}

#nprogress .spinner-icon {
  width: 18px;
  height: 18px;
  box-sizing: border-box;

  border: solid 2px transparent;
  border-top-color: #29d;
  border-left-color: #29d;
  border-radius: 50%;

  -webkit-animation: nprogress-spinner 400ms linear infinite;
          animation: nprogress-spinner 400ms linear infinite;
}

.nprogress-custom-parent {
  overflow: hidden;
  position: relative;
}

.nprogress-custom-parent #nprogress .spinner,
.nprogress-custom-parent #nprogress .bar {
  position: absolute;
}

@-webkit-keyframes nprogress-spinner {
  0%   { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}
@keyframes nprogress-spinner {
  0%   { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

</style><style>@font-face {
    font-family: "icomoon";
    src: url(/fonts/icomoon.eot?6a6f7bd187c115ac4928375f88afe630);
    src: url(/fonts/icomoon.eot?6a6f7bd187c115ac4928375f88afe630?#iefix-rdmvgc) format("embedded-opentype"),
        url(/fonts/icomoon.woff?beb5072df50c81b5d0f77916e825bd01) format("woff"),
        url(/fonts/icomoon.ttf?da51bee3e2032af85b1529aa3af3fa36) format("truetype")
            /* url('icomoon.svg?-rdmvgc#icomoon') format('svg'); */;
    font-weight: normal;
    font-style: normal;
}

[class^="i-"],
[class*=" i-"] {
    font-family: "icomoon" !important;
    speak: none;
    font-style: normal;
    font-weight: normal;
    font-variant: normal;
    text-transform: none;
    line-height: 1;

    /* Better Font Rendering =========== */
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

.i-A-Z:before {
    content: "\e600";
}
.i-Aa:before {
    content: "\e601";
}
.i-Add-Bag:before {
    content: "\e602";
}
.i-Add-Basket:before {
    content: "\e603";
}
.i-Add-Cart:before {
    content: "\e604";
}
.i-Add-File:before {
    content: "\e605";
}
.i-Add-SpaceAfterParagraph:before {
    content: "\e606";
}
.i-Add-SpaceBeforeParagraph:before {
    content: "\e607";
}
.i-Add-User:before {
    content: "\e608";
}
.i-Add-UserStar:before {
    content: "\e609";
}
.i-Add-Window:before {
    content: "\e60a";
}
.i-Add:before {
    content: "\e60b";
}
.i-Address-Book:before {
    content: "\e60c";
}
.i-Address-Book2:before {
    content: "\e60d";
}
.i-Administrator:before {
    content: "\e60e";
}
.i-Aerobics-2:before {
    content: "\e60f";
}
.i-Aerobics-3:before {
    content: "\e610";
}
.i-Aerobics:before {
    content: "\e611";
}
.i-Affiliate:before {
    content: "\e612";
}
.i-Aim:before {
    content: "\e613";
}
.i-Air-Balloon:before {
    content: "\e614";
}
.i-Airbrush:before {
    content: "\e615";
}
.i-Airship:before {
    content: "\e616";
}
.i-Alarm-Clock:before {
    content: "\e617";
}
.i-Alarm-Clock2:before {
    content: "\e618";
}
.i-Alarm:before {
    content: "\e619";
}
.i-Alien-2:before {
    content: "\e61a";
}
.i-Alien:before {
    content: "\e61b";
}
.i-Aligator:before {
    content: "\e61c";
}
.i-Align-Center:before {
    content: "\e61d";
}
.i-Align-JustifyAll:before {
    content: "\e61e";
}
.i-Align-JustifyCenter:before {
    content: "\e61f";
}
.i-Align-JustifyLeft:before {
    content: "\e620";
}
.i-Align-JustifyRight:before {
    content: "\e621";
}
.i-Align-Left:before {
    content: "\e622";
}
.i-Align-Right:before {
    content: "\e623";
}
.i-Alpha:before {
    content: "\e624";
}
.i-Ambulance:before {
    content: "\e625";
}
.i-AMX:before {
    content: "\e626";
}
.i-Anchor-2:before {
    content: "\e627";
}
.i-Anchor:before {
    content: "\e628";
}
.i-Android-Store:before {
    content: "\e629";
}
.i-Android:before {
    content: "\e62a";
}
.i-Angel-Smiley:before {
    content: "\e62b";
}
.i-Angel:before {
    content: "\e62c";
}
.i-Angry:before {
    content: "\e62d";
}
.i-Apple-Bite:before {
    content: "\e62e";
}
.i-Apple-Store:before {
    content: "\e62f";
}
.i-Apple:before {
    content: "\e630";
}
.i-Approved-Window:before {
    content: "\e631";
}
.i-Aquarius-2:before {
    content: "\e632";
}
.i-Aquarius:before {
    content: "\e633";
}
.i-Archery-2:before {
    content: "\e634";
}
.i-Archery:before {
    content: "\e635";
}
.i-Argentina:before {
    content: "\e636";
}
.i-Aries-2:before {
    content: "\e637";
}
.i-Aries:before {
    content: "\e638";
}
.i-Army-Key:before {
    content: "\e639";
}
.i-Arrow-Around:before {
    content: "\e63a";
}
.i-Arrow-Back3:before {
    content: "\e63b";
}
.i-Arrow-Back:before {
    content: "\e63c";
}
.i-Arrow-Back2:before {
    content: "\e63d";
}
.i-Arrow-Barrier:before {
    content: "\e63e";
}
.i-Arrow-Circle:before {
    content: "\e63f";
}
.i-Arrow-Cross:before {
    content: "\e640";
}
.i-Arrow-Down:before {
    content: "\e641";
}
.i-Arrow-Down2:before {
    content: "\e642";
}
.i-Arrow-Down3:before {
    content: "\e643";
}
.i-Arrow-DowninCircle:before {
    content: "\e644";
}
.i-Arrow-Fork:before {
    content: "\e645";
}
.i-Arrow-Forward:before {
    content: "\e646";
}
.i-Arrow-Forward2:before {
    content: "\e647";
}
.i-Arrow-From:before {
    content: "\e648";
}
.i-Arrow-Inside:before {
    content: "\e649";
}
.i-Arrow-Inside45:before {
    content: "\e64a";
}
.i-Arrow-InsideGap:before {
    content: "\e64b";
}
.i-Arrow-InsideGap45:before {
    content: "\e64c";
}
.i-Arrow-Into:before {
    content: "\e64d";
}
.i-Arrow-Join:before {
    content: "\e64e";
}
.i-Arrow-Junction:before {
    content: "\e64f";
}
.i-Arrow-Left:before {
    content: "\e650";
}
.i-Arrow-Left2:before {
    content: "\e651";
}
.i-Arrow-LeftinCircle:before {
    content: "\e652";
}
.i-Arrow-Loop:before {
    content: "\e653";
}
.i-Arrow-Merge:before {
    content: "\e654";
}
.i-Arrow-Mix:before {
    content: "\e655";
}
.i-Arrow-Next:before {
    content: "\e656";
}
.i-Arrow-OutLeft:before {
    content: "\e657";
}
.i-Arrow-OutRight:before {
    content: "\e658";
}
.i-Arrow-Outside:before {
    content: "\e659";
}
.i-Arrow-Outside45:before {
    content: "\e65a";
}
.i-Arrow-OutsideGap:before {
    content: "\e65b";
}
.i-Arrow-OutsideGap45:before {
    content: "\e65c";
}
.i-Arrow-Over:before {
    content: "\e65d";
}
.i-Arrow-Refresh:before {
    content: "\e65e";
}
.i-Arrow-Refresh2:before {
    content: "\e65f";
}
.i-Arrow-Right:before {
    content: "\e660";
}
.i-Arrow-Right2:before {
    content: "\e661";
}
.i-Arrow-RightinCircle:before {
    content: "\e662";
}
.i-Arrow-Shuffle:before {
    content: "\e663";
}
.i-Arrow-Squiggly:before {
    content: "\e664";
}
.i-Arrow-Through:before {
    content: "\e665";
}
.i-Arrow-To:before {
    content: "\e666";
}
.i-Arrow-TurnLeft:before {
    content: "\e667";
}
.i-Arrow-TurnRight:before {
    content: "\e668";
}
.i-Arrow-Up:before {
    content: "\e669";
}
.i-Arrow-Up2:before {
    content: "\e66a";
}
.i-Arrow-Up3:before {
    content: "\e66b";
}
.i-Arrow-UpinCircle:before {
    content: "\e66c";
}
.i-Arrow-XLeft:before {
    content: "\e66d";
}
.i-Arrow-XRight:before {
    content: "\e66e";
}
.i-Ask:before {
    content: "\e66f";
}
.i-Assistant:before {
    content: "\e670";
}
.i-Astronaut:before {
    content: "\e671";
}
.i-At-Sign:before {
    content: "\e672";
}
.i-ATM:before {
    content: "\e673";
}
.i-Atom:before {
    content: "\e674";
}
.i-Audio:before {
    content: "\e675";
}
.i-Auto-Flash:before {
    content: "\e676";
}
.i-Autumn:before {
    content: "\e677";
}
.i-Baby-Clothes:before {
    content: "\e678";
}
.i-Baby-Clothes2:before {
    content: "\e679";
}
.i-Baby-Cry:before {
    content: "\e67a";
}
.i-Baby:before {
    content: "\e67b";
}
.i-Back2:before {
    content: "\e67c";
}
.i-Back-Media:before {
    content: "\e67d";
}
.i-Back-Music:before {
    content: "\e67e";
}
.i-Back:before {
    content: "\e67f";
}
.i-Background:before {
    content: "\e680";
}
.i-Bacteria:before {
    content: "\e681";
}
.i-Bag-Coins:before {
    content: "\e682";
}
.i-Bag-Items:before {
    content: "\e683";
}
.i-Bag-Quantity:before {
    content: "\e684";
}
.i-Bag:before {
    content: "\e685";
}
.i-Bakelite:before {
    content: "\e686";
}
.i-Ballet-Shoes:before {
    content: "\e687";
}
.i-Balloon:before {
    content: "\e688";
}
.i-Banana:before {
    content: "\e689";
}
.i-Band-Aid:before {
    content: "\e68a";
}
.i-Bank:before {
    content: "\e68b";
}
.i-Bar-Chart:before {
    content: "\e68c";
}
.i-Bar-Chart2:before {
    content: "\e68d";
}
.i-Bar-Chart3:before {
    content: "\e68e";
}
.i-Bar-Chart4:before {
    content: "\e68f";
}
.i-Bar-Chart5:before {
    content: "\e690";
}
.i-Bar-Code:before {
    content: "\e691";
}
.i-Barricade-2:before {
    content: "\e692";
}
.i-Barricade:before {
    content: "\e693";
}
.i-Baseball:before {
    content: "\e694";
}
.i-Basket-Ball:before {
    content: "\e695";
}
.i-Basket-Coins:before {
    content: "\e696";
}
.i-Basket-Items:before {
    content: "\e697";
}
.i-Basket-Quantity:before {
    content: "\e698";
}
.i-Bat-2:before {
    content: "\e699";
}
.i-Bat:before {
    content: "\e69a";
}
.i-Bathrobe:before {
    content: "\e69b";
}
.i-Batman-Mask:before {
    content: "\e69c";
}
.i-Battery-0:before {
    content: "\e69d";
}
.i-Battery-25:before {
    content: "\e69e";
}
.i-Battery-50:before {
    content: "\e69f";
}
.i-Battery-75:before {
    content: "\e6a0";
}
.i-Battery-100:before {
    content: "\e6a1";
}
.i-Battery-Charge:before {
    content: "\e6a2";
}
.i-Bear:before {
    content: "\e6a3";
}
.i-Beard-2:before {
    content: "\e6a4";
}
.i-Beard-3:before {
    content: "\e6a5";
}
.i-Beard:before {
    content: "\e6a6";
}
.i-Bebo:before {
    content: "\e6a7";
}
.i-Bee:before {
    content: "\e6a8";
}
.i-Beer-Glass:before {
    content: "\e6a9";
}
.i-Beer:before {
    content: "\e6aa";
}
.i-Bell-2:before {
    content: "\e6ab";
}
.i-Bell:before {
    content: "\e6ac";
}
.i-Belt-2:before {
    content: "\e6ad";
}
.i-Belt-3:before {
    content: "\e6ae";
}
.i-Belt:before {
    content: "\e6af";
}
.i-Berlin-Tower:before {
    content: "\e6b0";
}
.i-Beta:before {
    content: "\e6b1";
}
.i-Betvibes:before {
    content: "\e6b2";
}
.i-Bicycle-2:before {
    content: "\e6b3";
}
.i-Bicycle-3:before {
    content: "\e6b4";
}
.i-Bicycle:before {
    content: "\e6b5";
}
.i-Big-Bang:before {
    content: "\e6b6";
}
.i-Big-Data:before {
    content: "\e6b7";
}
.i-Bike-Helmet:before {
    content: "\e6b8";
}
.i-Bikini:before {
    content: "\e6b9";
}
.i-Bilk-Bottle2:before {
    content: "\e6ba";
}
.i-Billing:before {
    content: "\e6bb";
}
.i-Bing:before {
    content: "\e6bc";
}
.i-Binocular:before {
    content: "\e6bd";
}
.i-Bio-Hazard:before {
    content: "\e6be";
}
.i-Biotech:before {
    content: "\e6bf";
}
.i-Bird-DeliveringLetter:before {
    content: "\e6c0";
}
.i-Bird:before {
    content: "\e6c1";
}
.i-Birthday-Cake:before {
    content: "\e6c2";
}
.i-Bisexual:before {
    content: "\e6c3";
}
.i-Bishop:before {
    content: "\e6c4";
}
.i-Bitcoin:before {
    content: "\e6c5";
}
.i-Black-Cat:before {
    content: "\e6c6";
}
.i-Blackboard:before {
    content: "\e6c7";
}
.i-Blinklist:before {
    content: "\e6c8";
}
.i-Block-Cloud:before {
    content: "\e6c9";
}
.i-Block-Window:before {
    content: "\e6ca";
}
.i-Blogger:before {
    content: "\e6cb";
}
.i-Blood:before {
    content: "\e6cc";
}
.i-Blouse:before {
    content: "\e6cd";
}
.i-Blueprint:before {
    content: "\e6ce";
}
.i-Board:before {
    content: "\e6cf";
}
.i-Bodybuilding:before {
    content: "\e6d0";
}
.i-Bold-Text:before {
    content: "\e6d1";
}
.i-Bone:before {
    content: "\e6d2";
}
.i-Bones:before {
    content: "\e6d3";
}
.i-Book:before {
    content: "\e6d4";
}
.i-Bookmark:before {
    content: "\e6d5";
}
.i-Books-2:before {
    content: "\e6d6";
}
.i-Books:before {
    content: "\e6d7";
}
.i-Boom:before {
    content: "\e6d8";
}
.i-Boot-2:before {
    content: "\e6d9";
}
.i-Boot:before {
    content: "\e6da";
}
.i-Bottom-ToTop:before {
    content: "\e6db";
}
.i-Bow-2:before {
    content: "\e6dc";
}
.i-Bow-3:before {
    content: "\e6dd";
}
.i-Bow-4:before {
    content: "\e6de";
}
.i-Bow-5:before {
    content: "\e6df";
}
.i-Bow-6:before {
    content: "\e6e0";
}
.i-Bow:before {
    content: "\e6e1";
}
.i-Bowling-2:before {
    content: "\e6e2";
}
.i-Bowling:before {
    content: "\e6e3";
}
.i-Box2:before {
    content: "\e6e4";
}
.i-Box-Close:before {
    content: "\e6e5";
}
.i-Box-Full:before {
    content: "\e6e6";
}
.i-Box-Open:before {
    content: "\e6e7";
}
.i-Box-withFolders:before {
    content: "\e6e8";
}
.i-Box:before {
    content: "\e6e9";
}
.i-Boy:before {
    content: "\e6ea";
}
.i-Bra:before {
    content: "\e6eb";
}
.i-Brain-2:before {
    content: "\e6ec";
}
.i-Brain-3:before {
    content: "\e6ed";
}
.i-Brain:before {
    content: "\e6ee";
}
.i-Brazil:before {
    content: "\e6ef";
}
.i-Bread-2:before {
    content: "\e6f0";
}
.i-Bread:before {
    content: "\e6f1";
}
.i-Bridge:before {
    content: "\e6f2";
}
.i-Brightkite:before {
    content: "\e6f3";
}
.i-Broke-Link2:before {
    content: "\e6f4";
}
.i-Broken-Link:before {
    content: "\e6f5";
}
.i-Broom:before {
    content: "\e6f6";
}
.i-Brush:before {
    content: "\e6f7";
}
.i-Bucket:before {
    content: "\e6f8";
}
.i-Bug:before {
    content: "\e6f9";
}
.i-Building:before {
    content: "\e6fa";
}
.i-Bulleted-List:before {
    content: "\e6fb";
}
.i-Bus-2:before {
    content: "\e6fc";
}
.i-Bus:before {
    content: "\e6fd";
}
.i-Business-Man:before {
    content: "\e6fe";
}
.i-Business-ManWoman:before {
    content: "\e6ff";
}
.i-Business-Mens:before {
    content: "\e700";
}
.i-Business-Woman:before {
    content: "\e701";
}
.i-Butterfly:before {
    content: "\e702";
}
.i-Button:before {
    content: "\e703";
}
.i-Cable-Car:before {
    content: "\e704";
}
.i-Cake:before {
    content: "\e705";
}
.i-Calculator-2:before {
    content: "\e706";
}
.i-Calculator-3:before {
    content: "\e707";
}
.i-Calculator:before {
    content: "\e708";
}
.i-Calendar-2:before {
    content: "\e709";
}
.i-Calendar-3:before {
    content: "\e70a";
}
.i-Calendar-4:before {
    content: "\e70b";
}
.i-Calendar-Clock:before {
    content: "\e70c";
}
.i-Calendar:before {
    content: "\e70d";
}
.i-Camel:before {
    content: "\e70e";
}
.i-Camera-2:before {
    content: "\e70f";
}
.i-Camera-3:before {
    content: "\e710";
}
.i-Camera-4:before {
    content: "\e711";
}
.i-Camera-5:before {
    content: "\e712";
}
.i-Camera-Back:before {
    content: "\e713";
}
.i-Camera:before {
    content: "\e714";
}
.i-Can-2:before {
    content: "\e715";
}
.i-Can:before {
    content: "\e716";
}
.i-Canada:before {
    content: "\e717";
}
.i-Cancer-2:before {
    content: "\e718";
}
.i-Cancer-3:before {
    content: "\e719";
}
.i-Cancer:before {
    content: "\e71a";
}
.i-Candle:before {
    content: "\e71b";
}
.i-Candy-Cane:before {
    content: "\e71c";
}
.i-Candy:before {
    content: "\e71d";
}
.i-Cannon:before {
    content: "\e71e";
}
.i-Cap-2:before {
    content: "\e71f";
}
.i-Cap-3:before {
    content: "\e720";
}
.i-Cap-Smiley:before {
    content: "\e721";
}
.i-Cap:before {
    content: "\e722";
}
.i-Capricorn-2:before {
    content: "\e723";
}
.i-Capricorn:before {
    content: "\e724";
}
.i-Car-2:before {
    content: "\e725";
}
.i-Car-3:before {
    content: "\e726";
}
.i-Car-Coins:before {
    content: "\e727";
}
.i-Car-Items:before {
    content: "\e728";
}
.i-Car-Wheel:before {
    content: "\e729";
}
.i-Car:before {
    content: "\e72a";
}
.i-Cardigan:before {
    content: "\e72b";
}
.i-Cardiovascular:before {
    content: "\e72c";
}
.i-Cart-Quantity:before {
    content: "\e72d";
}
.i-Casette-Tape:before {
    content: "\e72e";
}
.i-Cash-Register:before {
    content: "\e72f";
}
.i-Cash-register2:before {
    content: "\e730";
}
.i-Castle:before {
    content: "\e731";
}
.i-Cat:before {
    content: "\e732";
}
.i-Cathedral:before {
    content: "\e733";
}
.i-Cauldron:before {
    content: "\e734";
}
.i-CD-2:before {
    content: "\e735";
}
.i-CD-Cover:before {
    content: "\e736";
}
.i-CD:before {
    content: "\e737";
}
.i-Cello:before {
    content: "\e738";
}
.i-Celsius:before {
    content: "\e739";
}
.i-Chacked-Flag:before {
    content: "\e73a";
}
.i-Chair:before {
    content: "\e73b";
}
.i-Charger:before {
    content: "\e73c";
}
.i-Check-2:before {
    content: "\e73d";
}
.i-Check:before {
    content: "\e73e";
}
.i-Checked-User:before {
    content: "\e73f";
}
.i-Checkmate:before {
    content: "\e740";
}
.i-Checkout-Bag:before {
    content: "\e741";
}
.i-Checkout-Basket:before {
    content: "\e742";
}
.i-Checkout:before {
    content: "\e743";
}
.i-Cheese:before {
    content: "\e744";
}
.i-Cheetah:before {
    content: "\e745";
}
.i-Chef-Hat:before {
    content: "\e746";
}
.i-Chef-Hat2:before {
    content: "\e747";
}
.i-Chef:before {
    content: "\e748";
}
.i-Chemical-2:before {
    content: "\e749";
}
.i-Chemical-3:before {
    content: "\e74a";
}
.i-Chemical-4:before {
    content: "\e74b";
}
.i-Chemical-5:before {
    content: "\e74c";
}
.i-Chemical:before {
    content: "\e74d";
}
.i-Chess-Board:before {
    content: "\e74e";
}
.i-Chess:before {
    content: "\e74f";
}
.i-Chicken:before {
    content: "\e750";
}
.i-Chile:before {
    content: "\e751";
}
.i-Chimney:before {
    content: "\e752";
}
.i-China:before {
    content: "\e753";
}
.i-Chinese-Temple:before {
    content: "\e754";
}
.i-Chip:before {
    content: "\e755";
}
.i-Chopsticks-2:before {
    content: "\e756";
}
.i-Chopsticks:before {
    content: "\e757";
}
.i-Christmas-Ball:before {
    content: "\e758";
}
.i-Christmas-Bell:before {
    content: "\e759";
}
.i-Christmas-Candle:before {
    content: "\e75a";
}
.i-Christmas-Hat:before {
    content: "\e75b";
}
.i-Christmas-Sleigh:before {
    content: "\e75c";
}
.i-Christmas-Snowman:before {
    content: "\e75d";
}
.i-Christmas-Sock:before {
    content: "\e75e";
}
.i-Christmas-Tree:before {
    content: "\e75f";
}
.i-Christmas:before {
    content: "\e760";
}
.i-Chrome:before {
    content: "\e761";
}
.i-Chrysler-Building:before {
    content: "\e762";
}
.i-Cinema:before {
    content: "\e763";
}
.i-Circular-Point:before {
    content: "\e764";
}
.i-City-Hall:before {
    content: "\e765";
}
.i-Clamp:before {
    content: "\e766";
}
.i-Clapperboard-Close:before {
    content: "\e767";
}
.i-Clapperboard-Open:before {
    content: "\e768";
}
.i-Claps:before {
    content: "\e769";
}
.i-Clef:before {
    content: "\e76a";
}
.i-Clinic:before {
    content: "\e76b";
}
.i-Clock-2:before {
    content: "\e76c";
}
.i-Clock-3:before {
    content: "\e76d";
}
.i-Clock-4:before {
    content: "\e76e";
}
.i-Clock-Back:before {
    content: "\e76f";
}
.i-Clock-Forward:before {
    content: "\e770";
}
.i-Clock:before {
    content: "\e771";
}
.i-Close-Window:before {
    content: "\e772";
}
.i-Close:before {
    content: "\e773";
}
.i-Clothing-Store:before {
    content: "\e774";
}
.i-Cloud--:before {
    content: "\e775";
}
.i-Cloud-:before {
    content: "\e776";
}
.i-Cloud-Camera:before {
    content: "\e777";
}
.i-Cloud-Computer:before {
    content: "\e778";
}
.i-Cloud-Email:before {
    content: "\e779";
}
.i-Cloud-Hail:before {
    content: "\e77a";
}
.i-Cloud-Laptop:before {
    content: "\e77b";
}
.i-Cloud-Lock:before {
    content: "\e77c";
}
.i-Cloud-Moon:before {
    content: "\e77d";
}
.i-Cloud-Music:before {
    content: "\e77e";
}
.i-Cloud-Picture:before {
    content: "\e77f";
}
.i-Cloud-Rain:before {
    content: "\e780";
}
.i-Cloud-Remove:before {
    content: "\e781";
}
.i-Cloud-Secure:before {
    content: "\e782";
}
.i-Cloud-Settings:before {
    content: "\e783";
}
.i-Cloud-Smartphone:before {
    content: "\e784";
}
.i-Cloud-Snow:before {
    content: "\e785";
}
.i-Cloud-Sun:before {
    content: "\e786";
}
.i-Cloud-Tablet:before {
    content: "\e787";
}
.i-Cloud-Video:before {
    content: "\e788";
}
.i-Cloud-Weather:before {
    content: "\e789";
}
.i-Cloud:before {
    content: "\e78a";
}
.i-Clouds-Weather:before {
    content: "\e78b";
}
.i-Clouds:before {
    content: "\e78c";
}
.i-Clown:before {
    content: "\e78d";
}
.i-CMYK:before {
    content: "\e78e";
}
.i-Coat:before {
    content: "\e78f";
}
.i-Cocktail:before {
    content: "\e790";
}
.i-Coconut:before {
    content: "\e791";
}
.i-Code-Window:before {
    content: "\e792";
}
.i-Coding:before {
    content: "\e793";
}
.i-Coffee-2:before {
    content: "\e794";
}
.i-Coffee-Bean:before {
    content: "\e795";
}
.i-Coffee-Machine:before {
    content: "\e796";
}
.i-Coffee-toGo:before {
    content: "\e797";
}
.i-Coffee:before {
    content: "\e798";
}
.i-Coffin:before {
    content: "\e799";
}
.i-Coin:before {
    content: "\e79a";
}
.i-Coins-2:before {
    content: "\e79b";
}
.i-Coins-3:before {
    content: "\e79c";
}
.i-Coins:before {
    content: "\e79d";
}
.i-Colombia:before {
    content: "\e79e";
}
.i-Colosseum:before {
    content: "\e79f";
}
.i-Column-2:before {
    content: "\e7a0";
}
.i-Column-3:before {
    content: "\e7a1";
}
.i-Column:before {
    content: "\e7a2";
}
.i-Comb-2:before {
    content: "\e7a3";
}
.i-Comb:before {
    content: "\e7a4";
}
.i-Communication-Tower:before {
    content: "\e7a5";
}
.i-Communication-Tower2:before {
    content: "\e7a6";
}
.i-Compass-2:before {
    content: "\e7a7";
}
.i-Compass-3:before {
    content: "\e7a8";
}
.i-Compass-4:before {
    content: "\e7a9";
}
.i-Compass-Rose:before {
    content: "\e7aa";
}
.i-Compass:before {
    content: "\e7ab";
}
.i-Computer-2:before {
    content: "\e7ac";
}
.i-Computer-3:before {
    content: "\e7ad";
}
.i-Computer-Secure:before {
    content: "\e7ae";
}
.i-Computer:before {
    content: "\e7af";
}
.i-Conference:before {
    content: "\e7b0";
}
.i-Confused:before {
    content: "\e7b1";
}
.i-Conservation:before {
    content: "\e7b2";
}
.i-Consulting:before {
    content: "\e7b3";
}
.i-Contrast:before {
    content: "\e7b4";
}
.i-Control-2:before {
    content: "\e7b5";
}
.i-Control:before {
    content: "\e7b6";
}
.i-Cookie-Man:before {
    content: "\e7b7";
}
.i-Cookies:before {
    content: "\e7b8";
}
.i-Cool-Guy:before {
    content: "\e7b9";
}
.i-Cool:before {
    content: "\e7ba";
}
.i-Copyright:before {
    content: "\e7bb";
}
.i-Costume:before {
    content: "\e7bc";
}
.i-Couple-Sign:before {
    content: "\e7bd";
}
.i-Cow:before {
    content: "\e7be";
}
.i-CPU:before {
    content: "\e7bf";
}
.i-Crane:before {
    content: "\e7c0";
}
.i-Cranium:before {
    content: "\e7c1";
}
.i-Credit-Card:before {
    content: "\e7c2";
}
.i-Credit-Card2:before {
    content: "\e7c3";
}
.i-Credit-Card3:before {
    content: "\e7c4";
}
.i-Cricket:before {
    content: "\e7c5";
}
.i-Criminal:before {
    content: "\e7c6";
}
.i-Croissant:before {
    content: "\e7c7";
}
.i-Crop-2:before {
    content: "\e7c8";
}
.i-Crop-3:before {
    content: "\e7c9";
}
.i-Crown-2:before {
    content: "\e7ca";
}
.i-Crown:before {
    content: "\e7cb";
}
.i-Crying:before {
    content: "\e7cc";
}
.i-Cube-Molecule:before {
    content: "\e7cd";
}
.i-Cube-Molecule2:before {
    content: "\e7ce";
}
.i-Cupcake:before {
    content: "\e7cf";
}
.i-Cursor-Click:before {
    content: "\e7d0";
}
.i-Cursor-Click2:before {
    content: "\e7d1";
}
.i-Cursor-Move:before {
    content: "\e7d2";
}
.i-Cursor-Move2:before {
    content: "\e7d3";
}
.i-Cursor-Select:before {
    content: "\e7d4";
}
.i-Cursor:before {
    content: "\e7d5";
}
.i-D-Eyeglasses:before {
    content: "\e7d6";
}
.i-D-Eyeglasses2:before {
    content: "\e7d7";
}
.i-Dam:before {
    content: "\e7d8";
}
.i-Danemark:before {
    content: "\e7d9";
}
.i-Danger-2:before {
    content: "\e7da";
}
.i-Danger:before {
    content: "\e7db";
}
.i-Dashboard:before {
    content: "\e7dc";
}
.i-Data-Backup:before {
    content: "\e7dd";
}
.i-Data-Block:before {
    content: "\e7de";
}
.i-Data-Center:before {
    content: "\e7df";
}
.i-Data-Clock:before {
    content: "\e7e0";
}
.i-Data-Cloud:before {
    content: "\e7e1";
}
.i-Data-Compress:before {
    content: "\e7e2";
}
.i-Data-Copy:before {
    content: "\e7e3";
}
.i-Data-Download:before {
    content: "\e7e4";
}
.i-Data-Financial:before {
    content: "\e7e5";
}
.i-Data-Key:before {
    content: "\e7e6";
}
.i-Data-Lock:before {
    content: "\e7e7";
}
.i-Data-Network:before {
    content: "\e7e8";
}
.i-Data-Password:before {
    content: "\e7e9";
}
.i-Data-Power:before {
    content: "\e7ea";
}
.i-Data-Refresh:before {
    content: "\e7eb";
}
.i-Data-Save:before {
    content: "\e7ec";
}
.i-Data-Search:before {
    content: "\e7ed";
}
.i-Data-Security:before {
    content: "\e7ee";
}
.i-Data-Settings:before {
    content: "\e7ef";
}
.i-Data-Sharing:before {
    content: "\e7f0";
}
.i-Data-Shield:before {
    content: "\e7f1";
}
.i-Data-Signal:before {
    content: "\e7f2";
}
.i-Data-Storage:before {
    content: "\e7f3";
}
.i-Data-Stream:before {
    content: "\e7f4";
}
.i-Data-Transfer:before {
    content: "\e7f5";
}
.i-Data-Unlock:before {
    content: "\e7f6";
}
.i-Data-Upload:before {
    content: "\e7f7";
}
.i-Data-Yes:before {
    content: "\e7f8";
}
.i-Data:before {
    content: "\e7f9";
}
.i-David-Star:before {
    content: "\e7fa";
}
.i-Daylight:before {
    content: "\e7fb";
}
.i-Death:before {
    content: "\e7fc";
}
.i-Debian:before {
    content: "\e7fd";
}
.i-Dec:before {
    content: "\e7fe";
}
.i-Decrase-Inedit:before {
    content: "\e7ff";
}
.i-Deer-2:before {
    content: "\e800";
}
.i-Deer:before {
    content: "\e801";
}
.i-Delete-File:before {
    content: "\e802";
}
.i-Delete-Window:before {
    content: "\e803";
}
.i-Delicious:before {
    content: "\e804";
}
.i-Depression:before {
    content: "\e805";
}
.i-Deviantart:before {
    content: "\e806";
}
.i-Device-SyncwithCloud:before {
    content: "\e807";
}
.i-Diamond:before {
    content: "\e808";
}
.i-Dice-2:before {
    content: "\e809";
}
.i-Dice:before {
    content: "\e80a";
}
.i-Digg:before {
    content: "\e80b";
}
.i-Digital-Drawing:before {
    content: "\e80c";
}
.i-Diigo:before {
    content: "\e80d";
}
.i-Dinosaur:before {
    content: "\e80e";
}
.i-Diploma-2:before {
    content: "\e80f";
}
.i-Diploma:before {
    content: "\e810";
}
.i-Direction-East:before {
    content: "\e811";
}
.i-Direction-North:before {
    content: "\e812";
}
.i-Direction-South:before {
    content: "\e813";
}
.i-Direction-West:before {
    content: "\e814";
}
.i-Director:before {
    content: "\e815";
}
.i-Disk:before {
    content: "\e816";
}
.i-Dj:before {
    content: "\e817";
}
.i-DNA-2:before {
    content: "\e818";
}
.i-DNA-Helix:before {
    content: "\e819";
}
.i-DNA:before {
    content: "\e81a";
}
.i-Doctor:before {
    content: "\e81b";
}
.i-Dog:before {
    content: "\e81c";
}
.i-Dollar-Sign:before {
    content: "\e81d";
}
.i-Dollar-Sign2:before {
    content: "\e81e";
}
.i-Dollar:before {
    content: "\e81f";
}
.i-Dolphin:before {
    content: "\e820";
}
.i-Domino:before {
    content: "\e821";
}
.i-Door-Hanger:before {
    content: "\e822";
}
.i-Door:before {
    content: "\e823";
}
.i-Doplr:before {
    content: "\e824";
}
.i-Double-Circle:before {
    content: "\e825";
}
.i-Double-Tap:before {
    content: "\e826";
}
.i-Doughnut:before {
    content: "\e827";
}
.i-Dove:before {
    content: "\e828";
}
.i-Down-2:before {
    content: "\e829";
}
.i-Down-3:before {
    content: "\e82a";
}
.i-Down-4:before {
    content: "\e82b";
}
.i-Down:before {
    content: "\e82c";
}
.i-Download-2:before {
    content: "\e82d";
}
.i-Download-fromCloud:before {
    content: "\e82e";
}
.i-Download-Window:before {
    content: "\e82f";
}
.i-Download:before {
    content: "\e830";
}
.i-Downward:before {
    content: "\e831";
}
.i-Drag-Down:before {
    content: "\e832";
}
.i-Drag-Left:before {
    content: "\e833";
}
.i-Drag-Right:before {
    content: "\e834";
}
.i-Drag-Up:before {
    content: "\e835";
}
.i-Drag:before {
    content: "\e836";
}
.i-Dress:before {
    content: "\e837";
}
.i-Drill-2:before {
    content: "\e838";
}
.i-Drill:before {
    content: "\e839";
}
.i-Drop:before {
    content: "\e83a";
}
.i-Dropbox:before {
    content: "\e83b";
}
.i-Drum:before {
    content: "\e83c";
}
.i-Dry:before {
    content: "\e83d";
}
.i-Duck:before {
    content: "\e83e";
}
.i-Dumbbell:before {
    content: "\e83f";
}
.i-Duplicate-Layer:before {
    content: "\e840";
}
.i-Duplicate-Window:before {
    content: "\e841";
}
.i-DVD:before {
    content: "\e842";
}
.i-Eagle:before {
    content: "\e843";
}
.i-Ear:before {
    content: "\e844";
}
.i-Earphones-2:before {
    content: "\e845";
}
.i-Earphones:before {
    content: "\e846";
}
.i-Eci-i:before {
    content: "\e847";
}
.i-Edit-Map:before {
    content: "\e848";
}
.i-Edit:before {
    content: "\e849";
}
.i-Eggs:before {
    content: "\e84a";
}
.i-Egypt:before {
    content: "\e84b";
}
.i-Eifel-Tower:before {
    content: "\e84c";
}
.i-eject-2:before {
    content: "\e84d";
}
.i-Eject:before {
    content: "\e84e";
}
.i-El-Castillo:before {
    content: "\e84f";
}
.i-Elbow:before {
    content: "\e850";
}
.i-Electric-Guitar:before {
    content: "\e851";
}
.i-Electricity:before {
    content: "\e852";
}
.i-Elephant:before {
    content: "\e853";
}
.i-Email:before {
    content: "\e854";
}
.i-Embassy:before {
    content: "\e855";
}
.i-Empire-StateBuilding:before {
    content: "\e856";
}
.i-Empty-Box:before {
    content: "\e857";
}
.i-End2:before {
    content: "\e858";
}
.i-End-2:before {
    content: "\e859";
}
.i-End:before {
    content: "\e85a";
}
.i-Endways:before {
    content: "\e85b";
}
.i-Engineering:before {
    content: "\e85c";
}
.i-Envelope-2:before {
    content: "\e85d";
}
.i-Envelope:before {
    content: "\e85e";
}
.i-Environmental-2:before {
    content: "\e85f";
}
.i-Environmental-3:before {
    content: "\e860";
}
.i-Environmental:before {
    content: "\e861";
}
.i-Equalizer:before {
    content: "\e862";
}
.i-Eraser-2:before {
    content: "\e863";
}
.i-Eraser-3:before {
    content: "\e864";
}
.i-Eraser:before {
    content: "\e865";
}
.i-Error-404Window:before {
    content: "\e866";
}
.i-Euro-Sign:before {
    content: "\e867";
}
.i-Euro-Sign2:before {
    content: "\e868";
}
.i-Euro:before {
    content: "\e869";
}
.i-Evernote:before {
    content: "\e86a";
}
.i-Evil:before {
    content: "\e86b";
}
.i-Explode:before {
    content: "\e86c";
}
.i-Eye-2:before {
    content: "\e86d";
}
.i-Eye-Blind:before {
    content: "\e86e";
}
.i-Eye-Invisible:before {
    content: "\e86f";
}
.i-Eye-Scan:before {
    content: "\e870";
}
.i-Eye-Visible:before {
    content: "\e871";
}
.i-Eye:before {
    content: "\e872";
}
.i-Eyebrow-2:before {
    content: "\e873";
}
.i-Eyebrow-3:before {
    content: "\e874";
}
.i-Eyebrow:before {
    content: "\e875";
}
.i-Eyeglasses-Smiley:before {
    content: "\e876";
}
.i-Eyeglasses-Smiley2:before {
    content: "\e877";
}
.i-Face-Style:before {
    content: "\e878";
}
.i-Face-Style2:before {
    content: "\e879";
}
.i-Face-Style3:before {
    content: "\e87a";
}
.i-Face-Style4:before {
    content: "\e87b";
}
.i-Face-Style5:before {
    content: "\e87c";
}
.i-Face-Style6:before {
    content: "\e87d";
}
.i-Facebook-2:before {
    content: "\e87e";
}
.i-Facebook:before {
    content: "\e87f";
}
.i-Factory-2:before {
    content: "\e880";
}
.i-Factory:before {
    content: "\e881";
}
.i-Fahrenheit:before {
    content: "\e882";
}
.i-Family-Sign:before {
    content: "\e883";
}
.i-Fan:before {
    content: "\e884";
}
.i-Farmer:before {
    content: "\e885";
}
.i-Fashion:before {
    content: "\e886";
}
.i-Favorite-Window:before {
    content: "\e887";
}
.i-Fax:before {
    content: "\e888";
}
.i-Feather:before {
    content: "\e889";
}
.i-Feedburner:before {
    content: "\e88a";
}
.i-Female-2:before {
    content: "\e88b";
}
.i-Female-Sign:before {
    content: "\e88c";
}
.i-Female:before {
    content: "\e88d";
}
.i-File-Block:before {
    content: "\e88e";
}
.i-File-Bookmark:before {
    content: "\e88f";
}
.i-File-Chart:before {
    content: "\e890";
}
.i-File-Clipboard:before {
    content: "\e891";
}
.i-File-ClipboardFileText:before {
    content: "\e892";
}
.i-File-ClipboardTextImage:before {
    content: "\e893";
}
.i-File-Cloud:before {
    content: "\e894";
}
.i-File-Copy:before {
    content: "\e895";
}
.i-File-Copy2:before {
    content: "\e896";
}
.i-File-CSV:before {
    content: "\e897";
}
.i-File-Download:before {
    content: "\e898";
}
.i-File-Edit:before {
    content: "\e899";
}
.i-File-Excel:before {
    content: "\e89a";
}
.i-File-Favorite:before {
    content: "\e89b";
}
.i-File-Fire:before {
    content: "\e89c";
}
.i-File-Graph:before {
    content: "\e89d";
}
.i-File-Hide:before {
    content: "\e89e";
}
.i-File-Horizontal:before {
    content: "\e89f";
}
.i-File-HorizontalText:before {
    content: "\e8a0";
}
.i-File-HTML:before {
    content: "\e8a1";
}
.i-File-JPG:before {
    content: "\e8a2";
}
.i-File-Link:before {
    content: "\e8a3";
}
.i-File-Loading:before {
    content: "\e8a4";
}
.i-File-Lock:before {
    content: "\e8a5";
}
.i-File-Love:before {
    content: "\e8a6";
}
.i-File-Music:before {
    content: "\e8a7";
}
.i-File-Network:before {
    content: "\e8a8";
}
.i-File-Pictures:before {
    content: "\e8a9";
}
.i-File-Pie:before {
    content: "\e8aa";
}
.i-File-Presentation:before {
    content: "\e8ab";
}
.i-File-Refresh:before {
    content: "\e8ac";
}
.i-File-Search:before {
    content: "\e8ad";
}
.i-File-Settings:before {
    content: "\e8ae";
}
.i-File-Share:before {
    content: "\e8af";
}
.i-File-TextImage:before {
    content: "\e8b0";
}
.i-File-Trash:before {
    content: "\e8b1";
}
.i-File-TXT:before {
    content: "\e8b2";
}
.i-File-Upload:before {
    content: "\e8b3";
}
.i-File-Video:before {
    content: "\e8b4";
}
.i-File-Word:before {
    content: "\e8b5";
}
.i-File-Zip:before {
    content: "\e8b6";
}
.i-File:before {
    content: "\e8b7";
}
.i-Files:before {
    content: "\e8b8";
}
.i-Film-Board:before {
    content: "\e8b9";
}
.i-Film-Cartridge:before {
    content: "\e8ba";
}
.i-Film-Strip:before {
    content: "\e8bb";
}
.i-Film-Video:before {
    content: "\e8bc";
}
.i-Film:before {
    content: "\e8bd";
}
.i-Filter-2:before {
    content: "\e8be";
}
.i-Filter:before {
    content: "\e8bf";
}
.i-Financial:before {
    content: "\e8c0";
}
.i-Find-User:before {
    content: "\e8c1";
}
.i-Finger-DragFourSides:before {
    content: "\e8c2";
}
.i-Finger-DragTwoSides:before {
    content: "\e8c3";
}
.i-Finger-Print:before {
    content: "\e8c4";
}
.i-Finger:before {
    content: "\e8c5";
}
.i-Fingerprint-2:before {
    content: "\e8c6";
}
.i-Fingerprint:before {
    content: "\e8c7";
}
.i-Fire-Flame:before {
    content: "\e8c8";
}
.i-Fire-Flame2:before {
    content: "\e8c9";
}
.i-Fire-Hydrant:before {
    content: "\e8ca";
}
.i-Fire-Staion:before {
    content: "\e8cb";
}
.i-Firefox:before {
    content: "\e8cc";
}
.i-Firewall:before {
    content: "\e8cd";
}
.i-First-Aid:before {
    content: "\e8ce";
}
.i-First:before {
    content: "\e8cf";
}
.i-Fish-Food:before {
    content: "\e8d0";
}
.i-Fish:before {
    content: "\e8d1";
}
.i-Fit-To:before {
    content: "\e8d2";
}
.i-Fit-To2:before {
    content: "\e8d3";
}
.i-Five-Fingers:before {
    content: "\e8d4";
}
.i-Five-FingersDrag:before {
    content: "\e8d5";
}
.i-Five-FingersDrag2:before {
    content: "\e8d6";
}
.i-Five-FingersTouch:before {
    content: "\e8d7";
}
.i-Flag-2:before {
    content: "\e8d8";
}
.i-Flag-3:before {
    content: "\e8d9";
}
.i-Flag-4:before {
    content: "\e8da";
}
.i-Flag-5:before {
    content: "\e8db";
}
.i-Flag-6:before {
    content: "\e8dc";
}
.i-Flag:before {
    content: "\e8dd";
}
.i-Flamingo:before {
    content: "\e8de";
}
.i-Flash-2:before {
    content: "\e8df";
}
.i-Flash-Video:before {
    content: "\e8e0";
}
.i-Flash:before {
    content: "\e8e1";
}
.i-Flashlight:before {
    content: "\e8e2";
}
.i-Flask-2:before {
    content: "\e8e3";
}
.i-Flask:before {
    content: "\e8e4";
}
.i-Flick:before {
    content: "\e8e5";
}
.i-Flickr:before {
    content: "\e8e6";
}
.i-Flowerpot:before {
    content: "\e8e7";
}
.i-Fluorescent:before {
    content: "\e8e8";
}
.i-Fog-Day:before {
    content: "\e8e9";
}
.i-Fog-Night:before {
    content: "\e8ea";
}
.i-Folder-Add:before {
    content: "\e8eb";
}
.i-Folder-Archive:before {
    content: "\e8ec";
}
.i-Folder-Binder:before {
    content: "\e8ed";
}
.i-Folder-Binder2:before {
    content: "\e8ee";
}
.i-Folder-Block:before {
    content: "\e8ef";
}
.i-Folder-Bookmark:before {
    content: "\e8f0";
}
.i-Folder-Close:before {
    content: "\e8f1";
}
.i-Folder-Cloud:before {
    content: "\e8f2";
}
.i-Folder-Delete:before {
    content: "\e8f3";
}
.i-Folder-Download:before {
    content: "\e8f4";
}
.i-Folder-Edit:before {
    content: "\e8f5";
}
.i-Folder-Favorite:before {
    content: "\e8f6";
}
.i-Folder-Fire:before {
    content: "\e8f7";
}
.i-Folder-Hide:before {
    content: "\e8f8";
}
.i-Folder-Link:before {
    content: "\e8f9";
}
.i-Folder-Loading:before {
    content: "\e8fa";
}
.i-Folder-Lock:before {
    content: "\e8fb";
}
.i-Folder-Love:before {
    content: "\e8fc";
}
.i-Folder-Music:before {
    content: "\e8fd";
}
.i-Folder-Network:before {
    content: "\e8fe";
}
.i-Folder-Open:before {
    content: "\e8ff";
}
.i-Folder-Open2:before {
    content: "\e900";
}
.i-Folder-Organizing:before {
    content: "\e901";
}
.i-Folder-Pictures:before {
    content: "\e902";
}
.i-Folder-Refresh:before {
    content: "\e903";
}
.i-Folder-Remove-:before {
    content: "\e904";
}
.i-Folder-Search:before {
    content: "\e905";
}
.i-Folder-Settings:before {
    content: "\e906";
}
.i-Folder-Share:before {
    content: "\e907";
}
.i-Folder-Trash:before {
    content: "\e908";
}
.i-Folder-Upload:before {
    content: "\e909";
}
.i-Folder-Video:before {
    content: "\e90a";
}
.i-Folder-WithDocument:before {
    content: "\e90b";
}
.i-Folder-Zip:before {
    content: "\e90c";
}
.i-Folder:before {
    content: "\e90d";
}
.i-Folders:before {
    content: "\e90e";
}
.i-Font-Color:before {
    content: "\e90f";
}
.i-Font-Name:before {
    content: "\e910";
}
.i-Font-Size:before {
    content: "\e911";
}
.i-Font-Style:before {
    content: "\e912";
}
.i-Font-StyleSubscript:before {
    content: "\e913";
}
.i-Font-StyleSuperscript:before {
    content: "\e914";
}
.i-Font-Window:before {
    content: "\e915";
}
.i-Foot-2:before {
    content: "\e916";
}
.i-Foot:before {
    content: "\e917";
}
.i-Football-2:before {
    content: "\e918";
}
.i-Football:before {
    content: "\e919";
}
.i-Footprint-2:before {
    content: "\e91a";
}
.i-Footprint-3:before {
    content: "\e91b";
}
.i-Footprint:before {
    content: "\e91c";
}
.i-Forest:before {
    content: "\e91d";
}
.i-Fork:before {
    content: "\e91e";
}
.i-Formspring:before {
    content: "\e91f";
}
.i-Formula:before {
    content: "\e920";
}
.i-Forsquare:before {
    content: "\e921";
}
.i-Forward:before {
    content: "\e922";
}
.i-Fountain-Pen:before {
    content: "\e923";
}
.i-Four-Fingers:before {
    content: "\e924";
}
.i-Four-FingersDrag:before {
    content: "\e925";
}
.i-Four-FingersDrag2:before {
    content: "\e926";
}
.i-Four-FingersTouch:before {
    content: "\e927";
}
.i-Fox:before {
    content: "\e928";
}
.i-Frankenstein:before {
    content: "\e929";
}
.i-French-Fries:before {
    content: "\e92a";
}
.i-Friendfeed:before {
    content: "\e92b";
}
.i-Friendster:before {
    content: "\e92c";
}
.i-Frog:before {
    content: "\e92d";
}
.i-Fruits:before {
    content: "\e92e";
}
.i-Fuel:before {
    content: "\e92f";
}
.i-Full-Bag:before {
    content: "\e930";
}
.i-Full-Basket:before {
    content: "\e931";
}
.i-Full-Cart:before {
    content: "\e932";
}
.i-Full-Moon:before {
    content: "\e933";
}
.i-Full-Screen:before {
    content: "\e934";
}
.i-Full-Screen2:before {
    content: "\e935";
}
.i-Full-View:before {
    content: "\e936";
}
.i-Full-View2:before {
    content: "\e937";
}
.i-Full-ViewWindow:before {
    content: "\e938";
}
.i-Function:before {
    content: "\e939";
}
.i-Funky:before {
    content: "\e93a";
}
.i-Funny-Bicycle:before {
    content: "\e93b";
}
.i-Furl:before {
    content: "\e93c";
}
.i-Gamepad-2:before {
    content: "\e93d";
}
.i-Gamepad:before {
    content: "\e93e";
}
.i-Gas-Pump:before {
    content: "\e93f";
}
.i-Gaugage-2:before {
    content: "\e940";
}
.i-Gaugage:before {
    content: "\e941";
}
.i-Gay:before {
    content: "\e942";
}
.i-Gear-2:before {
    content: "\e943";
}
.i-Gear:before {
    content: "\e944";
}
.i-Gears-2:before {
    content: "\e945";
}
.i-Gears:before {
    content: "\e946";
}
.i-Geek-2:before {
    content: "\e947";
}
.i-Geek:before {
    content: "\e948";
}
.i-Gemini-2:before {
    content: "\e949";
}
.i-Gemini:before {
    content: "\e94a";
}
.i-Genius:before {
    content: "\e94b";
}
.i-Gentleman:before {
    content: "\e94c";
}
.i-Geo--:before {
    content: "\e94d";
}
.i-Geo-:before {
    content: "\e94e";
}
.i-Geo-Close:before {
    content: "\e94f";
}
.i-Geo-Love:before {
    content: "\e950";
}
.i-Geo-Number:before {
    content: "\e951";
}
.i-Geo-Star:before {
    content: "\e952";
}
.i-Geo:before {
    content: "\e953";
}
.i-Geo2--:before {
    content: "\e954";
}
.i-Geo2-:before {
    content: "\e955";
}
.i-Geo2-Close:before {
    content: "\e956";
}
.i-Geo2-Love:before {
    content: "\e957";
}
.i-Geo2-Number:before {
    content: "\e958";
}
.i-Geo2-Star:before {
    content: "\e959";
}
.i-Geo2:before {
    content: "\e95a";
}
.i-Geo3--:before {
    content: "\e95b";
}
.i-Geo3-:before {
    content: "\e95c";
}
.i-Geo3-Close:before {
    content: "\e95d";
}
.i-Geo3-Love:before {
    content: "\e95e";
}
.i-Geo3-Number:before {
    content: "\e95f";
}
.i-Geo3-Star:before {
    content: "\e960";
}
.i-Geo3:before {
    content: "\e961";
}
.i-Gey:before {
    content: "\e962";
}
.i-Gift-Box:before {
    content: "\e963";
}
.i-Giraffe:before {
    content: "\e964";
}
.i-Girl:before {
    content: "\e965";
}
.i-Glass-Water:before {
    content: "\e966";
}
.i-Glasses-2:before {
    content: "\e967";
}
.i-Glasses-3:before {
    content: "\e968";
}
.i-Glasses:before {
    content: "\e969";
}
.i-Global-Position:before {
    content: "\e96a";
}
.i-Globe-2:before {
    content: "\e96b";
}
.i-Globe:before {
    content: "\e96c";
}
.i-Gloves:before {
    content: "\e96d";
}
.i-Go-Bottom:before {
    content: "\e96e";
}
.i-Go-Top:before {
    content: "\e96f";
}
.i-Goggles:before {
    content: "\e970";
}
.i-Golf-2:before {
    content: "\e971";
}
.i-Golf:before {
    content: "\e972";
}
.i-Google-Buzz:before {
    content: "\e973";
}
.i-Google-Drive:before {
    content: "\e974";
}
.i-Google-Play:before {
    content: "\e975";
}
.i-Google-Plus:before {
    content: "\e976";
}
.i-Google:before {
    content: "\e977";
}
.i-Gopro:before {
    content: "\e978";
}
.i-Gorilla:before {
    content: "\e979";
}
.i-Gowalla:before {
    content: "\e97a";
}
.i-Grave:before {
    content: "\e97b";
}
.i-Graveyard:before {
    content: "\e97c";
}
.i-Greece:before {
    content: "\e97d";
}
.i-Green-Energy:before {
    content: "\e97e";
}
.i-Green-House:before {
    content: "\e97f";
}
.i-Guitar:before {
    content: "\e980";
}
.i-Gun-2:before {
    content: "\e981";
}
.i-Gun-3:before {
    content: "\e982";
}
.i-Gun:before {
    content: "\e983";
}
.i-Gymnastics:before {
    content: "\e984";
}
.i-Hair-2:before {
    content: "\e985";
}
.i-Hair-3:before {
    content: "\e986";
}
.i-Hair-4:before {
    content: "\e987";
}
.i-Hair:before {
    content: "\e988";
}
.i-Half-Moon:before {
    content: "\e989";
}
.i-Halloween-HalfMoon:before {
    content: "\e98a";
}
.i-Halloween-Moon:before {
    content: "\e98b";
}
.i-Hamburger:before {
    content: "\e98c";
}
.i-Hammer:before {
    content: "\e98d";
}
.i-Hand-Touch:before {
    content: "\e98e";
}
.i-Hand-Touch2:before {
    content: "\e98f";
}
.i-Hand-TouchSmartphone:before {
    content: "\e990";
}
.i-Hand:before {
    content: "\e991";
}
.i-Hands:before {
    content: "\e992";
}
.i-Handshake:before {
    content: "\e993";
}
.i-Hanger:before {
    content: "\e994";
}
.i-Happy:before {
    content: "\e995";
}
.i-Hat-2:before {
    content: "\e996";
}
.i-Hat:before {
    content: "\e997";
}
.i-Haunted-House:before {
    content: "\e998";
}
.i-HD-Video:before {
    content: "\e999";
}
.i-HD:before {
    content: "\e99a";
}
.i-HDD:before {
    content: "\e99b";
}
.i-Headphone:before {
    content: "\e99c";
}
.i-Headphones:before {
    content: "\e99d";
}
.i-Headset:before {
    content: "\e99e";
}
.i-Heart-2:before {
    content: "\e99f";
}
.i-Heart:before {
    content: "\e9a0";
}
.i-Heels-2:before {
    content: "\e9a1";
}
.i-Heels:before {
    content: "\e9a2";
}
.i-Height-Window:before {
    content: "\e9a3";
}
.i-Helicopter-2:before {
    content: "\e9a4";
}
.i-Helicopter:before {
    content: "\e9a5";
}
.i-Helix-2:before {
    content: "\e9a6";
}
.i-Hello:before {
    content: "\e9a7";
}
.i-Helmet-2:before {
    content: "\e9a8";
}
.i-Helmet-3:before {
    content: "\e9a9";
}
.i-Helmet:before {
    content: "\e9aa";
}
.i-Hipo:before {
    content: "\e9ab";
}
.i-Hipster-Glasses:before {
    content: "\e9ac";
}
.i-Hipster-Glasses2:before {
    content: "\e9ad";
}
.i-Hipster-Glasses3:before {
    content: "\e9ae";
}
.i-Hipster-Headphones:before {
    content: "\e9af";
}
.i-Hipster-Men:before {
    content: "\e9b0";
}
.i-Hipster-Men2:before {
    content: "\e9b1";
}
.i-Hipster-Men3:before {
    content: "\e9b2";
}
.i-Hipster-Sunglasses:before {
    content: "\e9b3";
}
.i-Hipster-Sunglasses2:before {
    content: "\e9b4";
}
.i-Hipster-Sunglasses3:before {
    content: "\e9b5";
}
.i-Hokey:before {
    content: "\e9b6";
}
.i-Holly:before {
    content: "\e9b7";
}
.i-Home-2:before {
    content: "\e9b8";
}
.i-Home-3:before {
    content: "\e9b9";
}
.i-Home-4:before {
    content: "\e9ba";
}
.i-Home-5:before {
    content: "\e9bb";
}
.i-Home-Window:before {
    content: "\e9bc";
}
.i-Home:before {
    content: "\e9bd";
}
.i-Homosexual:before {
    content: "\e9be";
}
.i-Honey:before {
    content: "\e9bf";
}
.i-Hong-Kong:before {
    content: "\e9c0";
}
.i-Hoodie:before {
    content: "\e9c1";
}
.i-Horror:before {
    content: "\e9c2";
}
.i-Horse:before {
    content: "\e9c3";
}
.i-Hospital-2:before {
    content: "\e9c4";
}
.i-Hospital:before {
    content: "\e9c5";
}
.i-Host:before {
    content: "\e9c6";
}
.i-Hot-Dog:before {
    content: "\e9c7";
}
.i-Hotel:before {
    content: "\e9c8";
}
.i-Hour:before {
    content: "\e9c9";
}
.i-Hub:before {
    content: "\e9ca";
}
.i-Humor:before {
    content: "\e9cb";
}
.i-Hurt:before {
    content: "\e9cc";
}
.i-Ice-Cream:before {
    content: "\e9cd";
}
.i-ICQ:before {
    content: "\e9ce";
}
.i-ID-2:before {
    content: "\e9cf";
}
.i-ID-3:before {
    content: "\e9d0";
}
.i-ID-Card:before {
    content: "\e9d1";
}
.i-Idea-2:before {
    content: "\e9d2";
}
.i-Idea-3:before {
    content: "\e9d3";
}
.i-Idea-4:before {
    content: "\e9d4";
}
.i-Idea-5:before {
    content: "\e9d5";
}
.i-Idea:before {
    content: "\e9d6";
}
.i-Identification-Badge:before {
    content: "\e9d7";
}
.i-ImDB:before {
    content: "\e9d8";
}
.i-Inbox-Empty:before {
    content: "\e9d9";
}
.i-Inbox-Forward:before {
    content: "\e9da";
}
.i-Inbox-Full:before {
    content: "\e9db";
}
.i-Inbox-Into:before {
    content: "\e9dc";
}
.i-Inbox-Out:before {
    content: "\e9dd";
}
.i-Inbox-Reply:before {
    content: "\e9de";
}
.i-Inbox:before {
    content: "\e9df";
}
.i-Increase-Inedit:before {
    content: "\e9e0";
}
.i-Indent-FirstLine:before {
    content: "\e9e1";
}
.i-Indent-LeftMargin:before {
    content: "\e9e2";
}
.i-Indent-RightMargin:before {
    content: "\e9e3";
}
.i-India:before {
    content: "\e9e4";
}
.i-Info-Window:before {
    content: "\e9e5";
}
.i-Information:before {
    content: "\e9e6";
}
.i-Inifity:before {
    content: "\e9e7";
}
.i-Instagram:before {
    content: "\e9e8";
}
.i-Internet-2:before {
    content: "\e9e9";
}
.i-Internet-Explorer:before {
    content: "\e9ea";
}
.i-Internet-Smiley:before {
    content: "\e9eb";
}
.i-Internet:before {
    content: "\e9ec";
}
.i-iOS-Apple:before {
    content: "\e9ed";
}
.i-Israel:before {
    content: "\e9ee";
}
.i-Italic-Text:before {
    content: "\e9ef";
}
.i-Jacket-2:before {
    content: "\e9f0";
}
.i-Jacket:before {
    content: "\e9f1";
}
.i-Jamaica:before {
    content: "\e9f2";
}
.i-Japan:before {
    content: "\e9f3";
}
.i-Japanese-Gate:before {
    content: "\e9f4";
}
.i-Jeans:before {
    content: "\e9f5";
}
.i-Jeep-2:before {
    content: "\e9f6";
}
.i-Jeep:before {
    content: "\e9f7";
}
.i-Jet:before {
    content: "\e9f8";
}
.i-Joystick:before {
    content: "\e9f9";
}
.i-Juice:before {
    content: "\e9fa";
}
.i-Jump-Rope:before {
    content: "\e9fb";
}
.i-Kangoroo:before {
    content: "\e9fc";
}
.i-Kenya:before {
    content: "\e9fd";
}
.i-Key-2:before {
    content: "\e9fe";
}
.i-Key-3:before {
    content: "\e9ff";
}
.i-Key-Lock:before {
    content: "\ea00";
}
.i-Key:before {
    content: "\ea01";
}
.i-Keyboard:before {
    content: "\ea02";
}
.i-Keyboard3:before {
    content: "\ea03";
}
.i-Keypad:before {
    content: "\ea04";
}
.i-King-2:before {
    content: "\ea05";
}
.i-King:before {
    content: "\ea06";
}
.i-Kiss:before {
    content: "\ea07";
}
.i-Knee:before {
    content: "\ea08";
}
.i-Knife-2:before {
    content: "\ea09";
}
.i-Knife:before {
    content: "\ea0a";
}
.i-Knight:before {
    content: "\ea0b";
}
.i-Koala:before {
    content: "\ea0c";
}
.i-Korea:before {
    content: "\ea0d";
}
.i-Lamp:before {
    content: "\ea0e";
}
.i-Landscape-2:before {
    content: "\ea0f";
}
.i-Landscape:before {
    content: "\ea10";
}
.i-Lantern:before {
    content: "\ea11";
}
.i-Laptop-2:before {
    content: "\ea12";
}
.i-Laptop-3:before {
    content: "\ea13";
}
.i-Laptop-Phone:before {
    content: "\ea14";
}
.i-Laptop-Secure:before {
    content: "\ea15";
}
.i-Laptop-Tablet:before {
    content: "\ea16";
}
.i-Laptop:before {
    content: "\ea17";
}
.i-Laser:before {
    content: "\ea18";
}
.i-Last-FM:before {
    content: "\ea19";
}
.i-Last:before {
    content: "\ea1a";
}
.i-Laughing:before {
    content: "\ea1b";
}
.i-Layer-1635:before {
    content: "\ea1c";
}
.i-Layer-1646:before {
    content: "\ea1d";
}
.i-Layer-Backward:before {
    content: "\ea1e";
}
.i-Layer-Forward:before {
    content: "\ea1f";
}
.i-Leafs-2:before {
    content: "\ea20";
}
.i-Leafs:before {
    content: "\ea21";
}
.i-Leaning-Tower:before {
    content: "\ea22";
}
.i-Left--Right:before {
    content: "\ea23";
}
.i-Left--Right3:before {
    content: "\ea24";
}
.i-Left-2:before {
    content: "\ea25";
}
.i-Left-3:before {
    content: "\ea26";
}
.i-Left-4:before {
    content: "\ea27";
}
.i-Left-ToRight:before {
    content: "\ea28";
}
.i-Left:before {
    content: "\ea29";
}
.i-Leg-2:before {
    content: "\ea2a";
}
.i-Leg:before {
    content: "\ea2b";
}
.i-Lego:before {
    content: "\ea2c";
}
.i-Lemon:before {
    content: "\ea2d";
}
.i-Len-2:before {
    content: "\ea2e";
}
.i-Len-3:before {
    content: "\ea2f";
}
.i-Len:before {
    content: "\ea30";
}
.i-Leo-2:before {
    content: "\ea31";
}
.i-Leo:before {
    content: "\ea32";
}
.i-Leopard:before {
    content: "\ea33";
}
.i-Lesbian:before {
    content: "\ea34";
}
.i-Lesbians:before {
    content: "\ea35";
}
.i-Letter-Close:before {
    content: "\ea36";
}
.i-Letter-Open:before {
    content: "\ea37";
}
.i-Letter-Sent:before {
    content: "\ea38";
}
.i-Libra-2:before {
    content: "\ea39";
}
.i-Libra:before {
    content: "\ea3a";
}
.i-Library-2:before {
    content: "\ea3b";
}
.i-Library:before {
    content: "\ea3c";
}
.i-Life-Jacket:before {
    content: "\ea3d";
}
.i-Life-Safer:before {
    content: "\ea3e";
}
.i-Light-Bulb:before {
    content: "\ea3f";
}
.i-Light-Bulb2:before {
    content: "\ea40";
}
.i-Light-BulbLeaf:before {
    content: "\ea41";
}
.i-Lighthouse:before {
    content: "\ea42";
}
.i-Like-2:before {
    content: "\ea43";
}
.i-Like:before {
    content: "\ea44";
}
.i-Line-Chart:before {
    content: "\ea45";
}
.i-Line-Chart2:before {
    content: "\ea46";
}
.i-Line-Chart3:before {
    content: "\ea47";
}
.i-Line-Chart4:before {
    content: "\ea48";
}
.i-Line-Spacing:before {
    content: "\ea49";
}
.i-Line-SpacingText:before {
    content: "\ea4a";
}
.i-Link-2:before {
    content: "\ea4b";
}
.i-Link:before {
    content: "\ea4c";
}
.i-Linkedin-2:before {
    content: "\ea4d";
}
.i-Linkedin:before {
    content: "\ea4e";
}
.i-Linux:before {
    content: "\ea4f";
}
.i-Lion:before {
    content: "\ea50";
}
.i-Livejournal:before {
    content: "\ea51";
}
.i-Loading-2:before {
    content: "\ea52";
}
.i-Loading-3:before {
    content: "\ea53";
}
.i-Loading-Window:before {
    content: "\ea54";
}
.i-Loading:before {
    content: "\ea55";
}
.i-Location-2:before {
    content: "\ea56";
}
.i-Location:before {
    content: "\ea57";
}
.i-Lock-2:before {
    content: "\ea58";
}
.i-Lock-3:before {
    content: "\ea59";
}
.i-Lock-User:before {
    content: "\ea5a";
}
.i-Lock-Window:before {
    content: "\ea5b";
}
.i-Lock:before {
    content: "\ea5c";
}
.i-Lollipop-2:before {
    content: "\ea5d";
}
.i-Lollipop-3:before {
    content: "\ea5e";
}
.i-Lollipop:before {
    content: "\ea5f";
}
.i-Loop:before {
    content: "\ea60";
}
.i-Loud:before {
    content: "\ea61";
}
.i-Loudspeaker:before {
    content: "\ea62";
}
.i-Love-2:before {
    content: "\ea63";
}
.i-Love-User:before {
    content: "\ea64";
}
.i-Love-Window:before {
    content: "\ea65";
}
.i-Love:before {
    content: "\ea66";
}
.i-Lowercase-Text:before {
    content: "\ea67";
}
.i-Luggafe-Front:before {
    content: "\ea68";
}
.i-Luggage-2:before {
    content: "\ea69";
}
.i-Macro:before {
    content: "\ea6a";
}
.i-Magic-Wand:before {
    content: "\ea6b";
}
.i-Magnet:before {
    content: "\ea6c";
}
.i-Magnifi-Glass-:before {
    content: "\ea6d";
}
.i-Magnifi-Glass:before {
    content: "\ea6e";
}
.i-Magnifi-Glass2:before {
    content: "\ea6f";
}
.i-Mail-2:before {
    content: "\ea70";
}
.i-Mail-3:before {
    content: "\ea71";
}
.i-Mail-Add:before {
    content: "\ea72";
}
.i-Mail-Attachement:before {
    content: "\ea73";
}
.i-Mail-Block:before {
    content: "\ea74";
}
.i-Mail-Delete:before {
    content: "\ea75";
}
.i-Mail-Favorite:before {
    content: "\ea76";
}
.i-Mail-Forward:before {
    content: "\ea77";
}
.i-Mail-Gallery:before {
    content: "\ea78";
}
.i-Mail-Inbox:before {
    content: "\ea79";
}
.i-Mail-Link:before {
    content: "\ea7a";
}
.i-Mail-Lock:before {
    content: "\ea7b";
}
.i-Mail-Love:before {
    content: "\ea7c";
}
.i-Mail-Money:before {
    content: "\ea7d";
}
.i-Mail-Open:before {
    content: "\ea7e";
}
.i-Mail-Outbox:before {
    content: "\ea7f";
}
.i-Mail-Password:before {
    content: "\ea80";
}
.i-Mail-Photo:before {
    content: "\ea81";
}
.i-Mail-Read:before {
    content: "\ea82";
}
.i-Mail-Removex:before {
    content: "\ea83";
}
.i-Mail-Reply:before {
    content: "\ea84";
}
.i-Mail-ReplyAll:before {
    content: "\ea85";
}
.i-Mail-Search:before {
    content: "\ea86";
}
.i-Mail-Send:before {
    content: "\ea87";
}
.i-Mail-Settings:before {
    content: "\ea88";
}
.i-Mail-Unread:before {
    content: "\ea89";
}
.i-Mail-Video:before {
    content: "\ea8a";
}
.i-Mail-withAtSign:before {
    content: "\ea8b";
}
.i-Mail-WithCursors:before {
    content: "\ea8c";
}
.i-Mail:before {
    content: "\ea8d";
}
.i-Mailbox-Empty:before {
    content: "\ea8e";
}
.i-Mailbox-Full:before {
    content: "\ea8f";
}
.i-Male-2:before {
    content: "\ea90";
}
.i-Male-Sign:before {
    content: "\ea91";
}
.i-Male:before {
    content: "\ea92";
}
.i-MaleFemale:before {
    content: "\ea93";
}
.i-Man-Sign:before {
    content: "\ea94";
}
.i-Management:before {
    content: "\ea95";
}
.i-Mans-Underwear:before {
    content: "\ea96";
}
.i-Mans-Underwear2:before {
    content: "\ea97";
}
.i-Map-Marker:before {
    content: "\ea98";
}
.i-Map-Marker2:before {
    content: "\ea99";
}
.i-Map-Marker3:before {
    content: "\ea9a";
}
.i-Map:before {
    content: "\ea9b";
}
.i-Map2:before {
    content: "\ea9c";
}
.i-Marker-2:before {
    content: "\ea9d";
}
.i-Marker-3:before {
    content: "\ea9e";
}
.i-Marker:before {
    content: "\ea9f";
}
.i-Martini-Glass:before {
    content: "\eaa0";
}
.i-Mask:before {
    content: "\eaa1";
}
.i-Master-Card:before {
    content: "\eaa2";
}
.i-Maximize-Window:before {
    content: "\eaa3";
}
.i-Maximize:before {
    content: "\eaa4";
}
.i-Medal-2:before {
    content: "\eaa5";
}
.i-Medal-3:before {
    content: "\eaa6";
}
.i-Medal:before {
    content: "\eaa7";
}
.i-Medical-Sign:before {
    content: "\eaa8";
}
.i-Medicine-2:before {
    content: "\eaa9";
}
.i-Medicine-3:before {
    content: "\eaaa";
}
.i-Medicine:before {
    content: "\eaab";
}
.i-Megaphone:before {
    content: "\eaac";
}
.i-Memory-Card:before {
    content: "\eaad";
}
.i-Memory-Card2:before {
    content: "\eaae";
}
.i-Memory-Card3:before {
    content: "\eaaf";
}
.i-Men:before {
    content: "\eab0";
}
.i-Menorah:before {
    content: "\eab1";
}
.i-Mens:before {
    content: "\eab2";
}
.i-Metacafe:before {
    content: "\eab3";
}
.i-Mexico:before {
    content: "\eab4";
}
.i-Mic:before {
    content: "\eab5";
}
.i-Microphone-2:before {
    content: "\eab6";
}
.i-Microphone-3:before {
    content: "\eab7";
}
.i-Microphone-4:before {
    content: "\eab8";
}
.i-Microphone-5:before {
    content: "\eab9";
}
.i-Microphone-6:before {
    content: "\eaba";
}
.i-Microphone-7:before {
    content: "\eabb";
}
.i-Microphone:before {
    content: "\eabc";
}
.i-Microscope:before {
    content: "\eabd";
}
.i-Milk-Bottle:before {
    content: "\eabe";
}
.i-Mine:before {
    content: "\eabf";
}
.i-Minimize-Maximize-Close-Window:before {
    content: "\eac0";
}
.i-Minimize-Window:before {
    content: "\eac1";
}
.i-Minimize:before {
    content: "\eac2";
}
.i-Mirror:before {
    content: "\eac3";
}
.i-Mixer:before {
    content: "\eac4";
}
.i-Mixx:before {
    content: "\eac5";
}
.i-Money-2:before {
    content: "\eac6";
}
.i-Money-Bag:before {
    content: "\eac7";
}
.i-Money-Smiley:before {
    content: "\eac8";
}
.i-Money:before {
    content: "\eac9";
}
.i-Monitor-2:before {
    content: "\eaca";
}
.i-Monitor-3:before {
    content: "\eacb";
}
.i-Monitor-4:before {
    content: "\eacc";
}
.i-Monitor-5:before {
    content: "\eacd";
}
.i-Monitor-Analytics:before {
    content: "\eace";
}
.i-Monitor-Laptop:before {
    content: "\eacf";
}
.i-Monitor-phone:before {
    content: "\ead0";
}
.i-Monitor-Tablet:before {
    content: "\ead1";
}
.i-Monitor-Vertical:before {
    content: "\ead2";
}
.i-Monitor:before {
    content: "\ead3";
}
.i-Monitoring:before {
    content: "\ead4";
}
.i-Monkey:before {
    content: "\ead5";
}
.i-Monster:before {
    content: "\ead6";
}
.i-Morocco:before {
    content: "\ead7";
}
.i-Motorcycle:before {
    content: "\ead8";
}
.i-Mouse-2:before {
    content: "\ead9";
}
.i-Mouse-3:before {
    content: "\eada";
}
.i-Mouse-4:before {
    content: "\eadb";
}
.i-Mouse-Pointer:before {
    content: "\eadc";
}
.i-Mouse:before {
    content: "\eadd";
}
.i-Moustache-Smiley:before {
    content: "\eade";
}
.i-Movie-Ticket:before {
    content: "\eadf";
}
.i-Movie:before {
    content: "\eae0";
}
.i-Mp3-File:before {
    content: "\eae1";
}
.i-Museum:before {
    content: "\eae2";
}
.i-Mushroom:before {
    content: "\eae3";
}
.i-Music-Note:before {
    content: "\eae4";
}
.i-Music-Note2:before {
    content: "\eae5";
}
.i-Music-Note3:before {
    content: "\eae6";
}
.i-Music-Note4:before {
    content: "\eae7";
}
.i-Music-Player:before {
    content: "\eae8";
}
.i-Mustache-2:before {
    content: "\eae9";
}
.i-Mustache-3:before {
    content: "\eaea";
}
.i-Mustache-4:before {
    content: "\eaeb";
}
.i-Mustache-5:before {
    content: "\eaec";
}
.i-Mustache-6:before {
    content: "\eaed";
}
.i-Mustache-7:before {
    content: "\eaee";
}
.i-Mustache-8:before {
    content: "\eaef";
}
.i-Mustache:before {
    content: "\eaf0";
}
.i-Mute:before {
    content: "\eaf1";
}
.i-Myspace:before {
    content: "\eaf2";
}
.i-Navigat-Start:before {
    content: "\eaf3";
}
.i-Navigate-End:before {
    content: "\eaf4";
}
.i-Navigation-LeftWindow:before {
    content: "\eaf5";
}
.i-Navigation-RightWindow:before {
    content: "\eaf6";
}
.i-Nepal:before {
    content: "\eaf7";
}
.i-Netscape:before {
    content: "\eaf8";
}
.i-Network-Window:before {
    content: "\eaf9";
}
.i-Network:before {
    content: "\eafa";
}
.i-Neutron:before {
    content: "\eafb";
}
.i-New-Mail:before {
    content: "\eafc";
}
.i-New-Tab:before {
    content: "\eafd";
}
.i-Newspaper-2:before {
    content: "\eafe";
}
.i-Newspaper:before {
    content: "\eaff";
}
.i-Newsvine:before {
    content: "\eb00";
}
.i-Next2:before {
    content: "\eb01";
}
.i-Next-3:before {
    content: "\eb02";
}
.i-Next-Music:before {
    content: "\eb03";
}
.i-Next:before {
    content: "\eb04";
}
.i-No-Battery:before {
    content: "\eb05";
}
.i-No-Drop:before {
    content: "\eb06";
}
.i-No-Flash:before {
    content: "\eb07";
}
.i-No-Smoking:before {
    content: "\eb08";
}
.i-Noose:before {
    content: "\eb09";
}
.i-Normal-Text:before {
    content: "\eb0a";
}
.i-Note:before {
    content: "\eb0b";
}
.i-Notepad-2:before {
    content: "\eb0c";
}
.i-Notepad:before {
    content: "\eb0d";
}
.i-Nuclear:before {
    content: "\eb0e";
}
.i-Numbering-List:before {
    content: "\eb0f";
}
.i-Nurse:before {
    content: "\eb10";
}
.i-Office-Lamp:before {
    content: "\eb11";
}
.i-Office:before {
    content: "\eb12";
}
.i-Oil:before {
    content: "\eb13";
}
.i-Old-Camera:before {
    content: "\eb14";
}
.i-Old-Cassette:before {
    content: "\eb15";
}
.i-Old-Clock:before {
    content: "\eb16";
}
.i-Old-Radio:before {
    content: "\eb17";
}
.i-Old-Sticky:before {
    content: "\eb18";
}
.i-Old-Sticky2:before {
    content: "\eb19";
}
.i-Old-Telephone:before {
    content: "\eb1a";
}
.i-Old-TV:before {
    content: "\eb1b";
}
.i-On-Air:before {
    content: "\eb1c";
}
.i-On-Off-2:before {
    content: "\eb1d";
}
.i-On-Off-3:before {
    content: "\eb1e";
}
.i-On-off:before {
    content: "\eb1f";
}
.i-One-Finger:before {
    content: "\eb20";
}
.i-One-FingerTouch:before {
    content: "\eb21";
}
.i-One-Window:before {
    content: "\eb22";
}
.i-Open-Banana:before {
    content: "\eb23";
}
.i-Open-Book:before {
    content: "\eb24";
}
.i-Opera-House:before {
    content: "\eb25";
}
.i-Opera:before {
    content: "\eb26";
}
.i-Optimization:before {
    content: "\eb27";
}
.i-Orientation-2:before {
    content: "\eb28";
}
.i-Orientation-3:before {
    content: "\eb29";
}
.i-Orientation:before {
    content: "\eb2a";
}
.i-Orkut:before {
    content: "\eb2b";
}
.i-Ornament:before {
    content: "\eb2c";
}
.i-Over-Time:before {
    content: "\eb2d";
}
.i-Over-Time2:before {
    content: "\eb2e";
}
.i-Owl:before {
    content: "\eb2f";
}
.i-Pac-Man:before {
    content: "\eb30";
}
.i-Paint-Brush:before {
    content: "\eb31";
}
.i-Paint-Bucket:before {
    content: "\eb32";
}
.i-Paintbrush:before {
    content: "\eb33";
}
.i-Palette:before {
    content: "\eb34";
}
.i-Palm-Tree:before {
    content: "\eb35";
}
.i-Panda:before {
    content: "\eb36";
}
.i-Panorama:before {
    content: "\eb37";
}
.i-Pantheon:before {
    content: "\eb38";
}
.i-Pantone:before {
    content: "\eb39";
}
.i-Pants:before {
    content: "\eb3a";
}
.i-Paper-Plane:before {
    content: "\eb3b";
}
.i-Paper:before {
    content: "\eb3c";
}
.i-Parasailing:before {
    content: "\eb3d";
}
.i-Parrot:before {
    content: "\eb3e";
}
.i-Password-2shopping:before {
    content: "\eb3f";
}
.i-Password-Field:before {
    content: "\eb40";
}
.i-Password-shopping:before {
    content: "\eb41";
}
.i-Password:before {
    content: "\eb42";
}
.i-pause-2:before {
    content: "\eb43";
}
.i-Pause:before {
    content: "\eb44";
}
.i-Paw:before {
    content: "\eb45";
}
.i-Pawn:before {
    content: "\eb46";
}
.i-Paypal:before {
    content: "\eb47";
}
.i-Pen-2:before {
    content: "\eb48";
}
.i-Pen-3:before {
    content: "\eb49";
}
.i-Pen-4:before {
    content: "\eb4a";
}
.i-Pen-5:before {
    content: "\eb4b";
}
.i-Pen-6:before {
    content: "\eb4c";
}
.i-Pen:before {
    content: "\eb4d";
}
.i-Pencil-Ruler:before {
    content: "\eb4e";
}
.i-Pencil:before {
    content: "\eb4f";
}
.i-Penguin:before {
    content: "\eb50";
}
.i-Pentagon:before {
    content: "\eb51";
}
.i-People-onCloud:before {
    content: "\eb52";
}
.i-Pepper-withFire:before {
    content: "\eb53";
}
.i-Pepper:before {
    content: "\eb54";
}
.i-Petrol:before {
    content: "\eb55";
}
.i-Petronas-Tower:before {
    content: "\eb56";
}
.i-Philipines:before {
    content: "\eb57";
}
.i-Phone-2:before {
    content: "\eb58";
}
.i-Phone-3:before {
    content: "\eb59";
}
.i-Phone-3G:before {
    content: "\eb5a";
}
.i-Phone-4G:before {
    content: "\eb5b";
}
.i-Phone-Simcard:before {
    content: "\eb5c";
}
.i-Phone-SMS:before {
    content: "\eb5d";
}
.i-Phone-Wifi:before {
    content: "\eb5e";
}
.i-Phone:before {
    content: "\eb5f";
}
.i-Photo-2:before {
    content: "\eb60";
}
.i-Photo-3:before {
    content: "\eb61";
}
.i-Photo-Album:before {
    content: "\eb62";
}
.i-Photo-Album2:before {
    content: "\eb63";
}
.i-Photo-Album3:before {
    content: "\eb64";
}
.i-Photo:before {
    content: "\eb65";
}
.i-Photos:before {
    content: "\eb66";
}
.i-Physics:before {
    content: "\eb67";
}
.i-Pi:before {
    content: "\eb68";
}
.i-Piano:before {
    content: "\eb69";
}
.i-Picasa:before {
    content: "\eb6a";
}
.i-Pie-Chart:before {
    content: "\eb6b";
}
.i-Pie-Chart2:before {
    content: "\eb6c";
}
.i-Pie-Chart3:before {
    content: "\eb6d";
}
.i-Pilates-2:before {
    content: "\eb6e";
}
.i-Pilates-3:before {
    content: "\eb6f";
}
.i-Pilates:before {
    content: "\eb70";
}
.i-Pilot:before {
    content: "\eb71";
}
.i-Pinch:before {
    content: "\eb72";
}
.i-Ping-Pong:before {
    content: "\eb73";
}
.i-Pinterest:before {
    content: "\eb74";
}
.i-Pipe:before {
    content: "\eb75";
}
.i-Pipette:before {
    content: "\eb76";
}
.i-Piramids:before {
    content: "\eb77";
}
.i-Pisces-2:before {
    content: "\eb78";
}
.i-Pisces:before {
    content: "\eb79";
}
.i-Pizza-Slice:before {
    content: "\eb7a";
}
.i-Pizza:before {
    content: "\eb7b";
}
.i-Plane-2:before {
    content: "\eb7c";
}
.i-Plane:before {
    content: "\eb7d";
}
.i-Plant:before {
    content: "\eb7e";
}
.i-Plasmid:before {
    content: "\eb7f";
}
.i-Plaster:before {
    content: "\eb80";
}
.i-Plastic-CupPhone:before {
    content: "\eb81";
}
.i-Plastic-CupPhone2:before {
    content: "\eb82";
}
.i-Plate:before {
    content: "\eb83";
}
.i-Plates:before {
    content: "\eb84";
}
.i-Plaxo:before {
    content: "\eb85";
}
.i-Play-Music:before {
    content: "\eb86";
}
.i-Plug-In:before {
    content: "\eb87";
}
.i-Plug-In2:before {
    content: "\eb88";
}
.i-Plurk:before {
    content: "\eb89";
}
.i-Pointer:before {
    content: "\eb8a";
}
.i-Poland:before {
    content: "\eb8b";
}
.i-Police-Man:before {
    content: "\eb8c";
}
.i-Police-Station:before {
    content: "\eb8d";
}
.i-Police-Woman:before {
    content: "\eb8e";
}
.i-Police:before {
    content: "\eb8f";
}
.i-Polo-Shirt:before {
    content: "\eb90";
}
.i-Portrait:before {
    content: "\eb91";
}
.i-Portugal:before {
    content: "\eb92";
}
.i-Post-Mail:before {
    content: "\eb93";
}
.i-Post-Mail2:before {
    content: "\eb94";
}
.i-Post-Office:before {
    content: "\eb95";
}
.i-Post-Sign:before {
    content: "\eb96";
}
.i-Post-Sign2ways:before {
    content: "\eb97";
}
.i-Posterous:before {
    content: "\eb98";
}
.i-Pound-Sign:before {
    content: "\eb99";
}
.i-Pound-Sign2:before {
    content: "\eb9a";
}
.i-Pound:before {
    content: "\eb9b";
}
.i-Power-2:before {
    content: "\eb9c";
}
.i-Power-3:before {
    content: "\eb9d";
}
.i-Power-Cable:before {
    content: "\eb9e";
}
.i-Power-Station:before {
    content: "\eb9f";
}
.i-Power:before {
    content: "\eba0";
}
.i-Prater:before {
    content: "\eba1";
}
.i-Present:before {
    content: "\eba2";
}
.i-Presents:before {
    content: "\eba3";
}
.i-Press:before {
    content: "\eba4";
}
.i-Preview:before {
    content: "\eba5";
}
.i-Previous:before {
    content: "\eba6";
}
.i-Pricing:before {
    content: "\eba7";
}
.i-Printer:before {
    content: "\eba8";
}
.i-Professor:before {
    content: "\eba9";
}
.i-Profile:before {
    content: "\ebaa";
}
.i-Project:before {
    content: "\ebab";
}
.i-Projector-2:before {
    content: "\ebac";
}
.i-Projector:before {
    content: "\ebad";
}
.i-Pulse:before {
    content: "\ebae";
}
.i-Pumpkin:before {
    content: "\ebaf";
}
.i-Punk:before {
    content: "\ebb0";
}
.i-Punker:before {
    content: "\ebb1";
}
.i-Puzzle:before {
    content: "\ebb2";
}
.i-QIK:before {
    content: "\ebb3";
}
.i-QR-Code:before {
    content: "\ebb4";
}
.i-Queen-2:before {
    content: "\ebb5";
}
.i-Queen:before {
    content: "\ebb6";
}
.i-Quill-2:before {
    content: "\ebb7";
}
.i-Quill-3:before {
    content: "\ebb8";
}
.i-Quill:before {
    content: "\ebb9";
}
.i-Quotes-2:before {
    content: "\ebba";
}
.i-Quotes:before {
    content: "\ebbb";
}
.i-Radio:before {
    content: "\ebbc";
}
.i-Radioactive:before {
    content: "\ebbd";
}
.i-Rafting:before {
    content: "\ebbe";
}
.i-Rain-Drop:before {
    content: "\ebbf";
}
.i-Rainbow-2:before {
    content: "\ebc0";
}
.i-Rainbow:before {
    content: "\ebc1";
}
.i-Ram:before {
    content: "\ebc2";
}
.i-Razzor-Blade:before {
    content: "\ebc3";
}
.i-Receipt-2:before {
    content: "\ebc4";
}
.i-Receipt-3:before {
    content: "\ebc5";
}
.i-Receipt-4:before {
    content: "\ebc6";
}
.i-Receipt:before {
    content: "\ebc7";
}
.i-Record2:before {
    content: "\ebc8";
}
.i-Record-3:before {
    content: "\ebc9";
}
.i-Record-Music:before {
    content: "\ebca";
}
.i-Record:before {
    content: "\ebcb";
}
.i-Recycling-2:before {
    content: "\ebcc";
}
.i-Recycling:before {
    content: "\ebcd";
}
.i-Reddit:before {
    content: "\ebce";
}
.i-Redhat:before {
    content: "\ebcf";
}
.i-Redirect:before {
    content: "\ebd0";
}
.i-Redo:before {
    content: "\ebd1";
}
.i-Reel:before {
    content: "\ebd2";
}
.i-Refinery:before {
    content: "\ebd3";
}
.i-Refresh-Window:before {
    content: "\ebd4";
}
.i-Refresh:before {
    content: "\ebd5";
}
.i-Reload-2:before {
    content: "\ebd6";
}
.i-Reload-3:before {
    content: "\ebd7";
}
.i-Reload:before {
    content: "\ebd8";
}
.i-Remote-Controll:before {
    content: "\ebd9";
}
.i-Remote-Controll2:before {
    content: "\ebda";
}
.i-Remove-Bag:before {
    content: "\ebdb";
}
.i-Remove-Basket:before {
    content: "\ebdc";
}
.i-Remove-Cart:before {
    content: "\ebdd";
}
.i-Remove-File:before {
    content: "\ebde";
}
.i-Remove-User:before {
    content: "\ebdf";
}
.i-Remove-Window:before {
    content: "\ebe0";
}
.i-Remove:before {
    content: "\ebe1";
}
.i-Rename:before {
    content: "\ebe2";
}
.i-Repair:before {
    content: "\ebe3";
}
.i-Repeat-2:before {
    content: "\ebe4";
}
.i-Repeat-3:before {
    content: "\ebe5";
}
.i-Repeat-4:before {
    content: "\ebe6";
}
.i-Repeat-5:before {
    content: "\ebe7";
}
.i-Repeat-6:before {
    content: "\ebe8";
}
.i-Repeat-7:before {
    content: "\ebe9";
}
.i-Repeat:before {
    content: "\ebea";
}
.i-Reset:before {
    content: "\ebeb";
}
.i-Resize:before {
    content: "\ebec";
}
.i-Restore-Window:before {
    content: "\ebed";
}
.i-Retouching:before {
    content: "\ebee";
}
.i-Retro-Camera:before {
    content: "\ebef";
}
.i-Retro:before {
    content: "\ebf0";
}
.i-Retweet:before {
    content: "\ebf1";
}
.i-Reverbnation:before {
    content: "\ebf2";
}
.i-Rewind:before {
    content: "\ebf3";
}
.i-RGB:before {
    content: "\ebf4";
}
.i-Ribbon-2:before {
    content: "\ebf5";
}
.i-Ribbon-3:before {
    content: "\ebf6";
}
.i-Ribbon:before {
    content: "\ebf7";
}
.i-Right-2:before {
    content: "\ebf8";
}
.i-Right-3:before {
    content: "\ebf9";
}
.i-Right-4:before {
    content: "\ebfa";
}
.i-Right-ToLeft:before {
    content: "\ebfb";
}
.i-Right:before {
    content: "\ebfc";
}
.i-Road-2:before {
    content: "\ebfd";
}
.i-Road-3:before {
    content: "\ebfe";
}
.i-Road:before {
    content: "\ebff";
}
.i-Robot-2:before {
    content: "\ec00";
}
.i-Robot:before {
    content: "\ec01";
}
.i-Rock-andRoll:before {
    content: "\ec02";
}
.i-Rocket:before {
    content: "\ec03";
}
.i-Roller:before {
    content: "\ec04";
}
.i-Roof:before {
    content: "\ec05";
}
.i-Rook:before {
    content: "\ec06";
}
.i-Rotate-Gesture:before {
    content: "\ec07";
}
.i-Rotate-Gesture2:before {
    content: "\ec08";
}
.i-Rotate-Gesture3:before {
    content: "\ec09";
}
.i-Rotation-390:before {
    content: "\ec0a";
}
.i-Rotation:before {
    content: "\ec0b";
}
.i-Router-2:before {
    content: "\ec0c";
}
.i-Router:before {
    content: "\ec0d";
}
.i-RSS:before {
    content: "\ec0e";
}
.i-Ruler-2:before {
    content: "\ec0f";
}
.i-Ruler:before {
    content: "\ec10";
}
.i-Running-Shoes:before {
    content: "\ec11";
}
.i-Running:before {
    content: "\ec12";
}
.i-Safari:before {
    content: "\ec13";
}
.i-Safe-Box:before {
    content: "\ec14";
}
.i-Safe-Box2:before {
    content: "\ec15";
}
.i-Safety-PinClose:before {
    content: "\ec16";
}
.i-Safety-PinOpen:before {
    content: "\ec17";
}
.i-Sagittarus-2:before {
    content: "\ec18";
}
.i-Sagittarus:before {
    content: "\ec19";
}
.i-Sailing-Ship:before {
    content: "\ec1a";
}
.i-Sand-watch:before {
    content: "\ec1b";
}
.i-Sand-watch2:before {
    content: "\ec1c";
}
.i-Santa-Claus:before {
    content: "\ec1d";
}
.i-Santa-Claus2:before {
    content: "\ec1e";
}
.i-Santa-onSled:before {
    content: "\ec1f";
}
.i-Satelite-2:before {
    content: "\ec20";
}
.i-Satelite:before {
    content: "\ec21";
}
.i-Save-Window:before {
    content: "\ec22";
}
.i-Save:before {
    content: "\ec23";
}
.i-Saw:before {
    content: "\ec24";
}
.i-Saxophone:before {
    content: "\ec25";
}
.i-Scale:before {
    content: "\ec26";
}
.i-Scarf:before {
    content: "\ec27";
}
.i-Scissor:before {
    content: "\ec28";
}
.i-Scooter-Front:before {
    content: "\ec29";
}
.i-Scooter:before {
    content: "\ec2a";
}
.i-Scorpio-2:before {
    content: "\ec2b";
}
.i-Scorpio:before {
    content: "\ec2c";
}
.i-Scotland:before {
    content: "\ec2d";
}
.i-Screwdriver:before {
    content: "\ec2e";
}
.i-Scroll-Fast:before {
    content: "\ec2f";
}
.i-Scroll:before {
    content: "\ec30";
}
.i-Scroller-2:before {
    content: "\ec31";
}
.i-Scroller:before {
    content: "\ec32";
}
.i-Sea-Dog:before {
    content: "\ec33";
}
.i-Search-onCloud:before {
    content: "\ec34";
}
.i-Search-People:before {
    content: "\ec35";
}
.i-secound:before {
    content: "\ec36";
}
.i-secound2:before {
    content: "\ec37";
}
.i-Security-Block:before {
    content: "\ec38";
}
.i-Security-Bug:before {
    content: "\ec39";
}
.i-Security-Camera:before {
    content: "\ec3a";
}
.i-Security-Check:before {
    content: "\ec3b";
}
.i-Security-Settings:before {
    content: "\ec3c";
}
.i-Security-Smiley:before {
    content: "\ec3d";
}
.i-Securiy-Remove:before {
    content: "\ec3e";
}
.i-Seed:before {
    content: "\ec3f";
}
.i-Selfie:before {
    content: "\ec40";
}
.i-Serbia:before {
    content: "\ec41";
}
.i-Server-2:before {
    content: "\ec42";
}
.i-Server:before {
    content: "\ec43";
}
.i-Servers:before {
    content: "\ec44";
}
.i-Settings-Window:before {
    content: "\ec45";
}
.i-Sewing-Machine:before {
    content: "\ec46";
}
.i-Sexual:before {
    content: "\ec47";
}
.i-Share-onCloud:before {
    content: "\ec48";
}
.i-Share-Window:before {
    content: "\ec49";
}
.i-Share:before {
    content: "\ec4a";
}
.i-Sharethis:before {
    content: "\ec4b";
}
.i-Shark:before {
    content: "\ec4c";
}
.i-Sheep:before {
    content: "\ec4d";
}
.i-Sheriff-Badge:before {
    content: "\ec4e";
}
.i-Shield:before {
    content: "\ec4f";
}
.i-Ship-2:before {
    content: "\ec50";
}
.i-Ship:before {
    content: "\ec51";
}
.i-Shirt:before {
    content: "\ec52";
}
.i-Shoes-2:before {
    content: "\ec53";
}
.i-Shoes-3:before {
    content: "\ec54";
}
.i-Shoes:before {
    content: "\ec55";
}
.i-Shop-2:before {
    content: "\ec56";
}
.i-Shop-3:before {
    content: "\ec57";
}
.i-Shop-4:before {
    content: "\ec58";
}
.i-Shop:before {
    content: "\ec59";
}
.i-Shopping-Bag:before {
    content: "\ec5a";
}
.i-Shopping-Basket:before {
    content: "\ec5b";
}
.i-Shopping-Cart:before {
    content: "\ec5c";
}
.i-Short-Pants:before {
    content: "\ec5d";
}
.i-Shoutwire:before {
    content: "\ec5e";
}
.i-Shovel:before {
    content: "\ec5f";
}
.i-Shuffle-2:before {
    content: "\ec60";
}
.i-Shuffle-3:before {
    content: "\ec61";
}
.i-Shuffle-4:before {
    content: "\ec62";
}
.i-Shuffle:before {
    content: "\ec63";
}
.i-Shutter:before {
    content: "\ec64";
}
.i-Sidebar-Window:before {
    content: "\ec65";
}
.i-Signal:before {
    content: "\ec66";
}
.i-Singapore:before {
    content: "\ec67";
}
.i-Skate-Shoes:before {
    content: "\ec68";
}
.i-Skateboard-2:before {
    content: "\ec69";
}
.i-Skateboard:before {
    content: "\ec6a";
}
.i-Skeleton:before {
    content: "\ec6b";
}
.i-Ski:before {
    content: "\ec6c";
}
.i-Skirt:before {
    content: "\ec6d";
}
.i-Skrill:before {
    content: "\ec6e";
}
.i-Skull:before {
    content: "\ec6f";
}
.i-Skydiving:before {
    content: "\ec70";
}
.i-Skype:before {
    content: "\ec71";
}
.i-Sled-withGifts:before {
    content: "\ec72";
}
.i-Sled:before {
    content: "\ec73";
}
.i-Sleeping:before {
    content: "\ec74";
}
.i-Sleet:before {
    content: "\ec75";
}
.i-Slippers:before {
    content: "\ec76";
}
.i-Smart:before {
    content: "\ec77";
}
.i-Smartphone-2:before {
    content: "\ec78";
}
.i-Smartphone-3:before {
    content: "\ec79";
}
.i-Smartphone-4:before {
    content: "\ec7a";
}
.i-Smartphone-Secure:before {
    content: "\ec7b";
}
.i-Smartphone:before {
    content: "\ec7c";
}
.i-Smile:before {
    content: "\ec7d";
}
.i-Smoking-Area:before {
    content: "\ec7e";
}
.i-Smoking-Pipe:before {
    content: "\ec7f";
}
.i-Snake:before {
    content: "\ec80";
}
.i-Snorkel:before {
    content: "\ec81";
}
.i-Snow-2:before {
    content: "\ec82";
}
.i-Snow-Dome:before {
    content: "\ec83";
}
.i-Snow-Storm:before {
    content: "\ec84";
}
.i-Snow:before {
    content: "\ec85";
}
.i-Snowflake-2:before {
    content: "\ec86";
}
.i-Snowflake-3:before {
    content: "\ec87";
}
.i-Snowflake-4:before {
    content: "\ec88";
}
.i-Snowflake:before {
    content: "\ec89";
}
.i-Snowman:before {
    content: "\ec8a";
}
.i-Soccer-Ball:before {
    content: "\ec8b";
}
.i-Soccer-Shoes:before {
    content: "\ec8c";
}
.i-Socks:before {
    content: "\ec8d";
}
.i-Solar:before {
    content: "\ec8e";
}
.i-Sound-Wave:before {
    content: "\ec8f";
}
.i-Sound:before {
    content: "\ec90";
}
.i-Soundcloud:before {
    content: "\ec91";
}
.i-Soup:before {
    content: "\ec92";
}
.i-South-Africa:before {
    content: "\ec93";
}
.i-Space-Needle:before {
    content: "\ec94";
}
.i-Spain:before {
    content: "\ec95";
}
.i-Spam-Mail:before {
    content: "\ec96";
}
.i-Speach-Bubble:before {
    content: "\ec97";
}
.i-Speach-Bubble2:before {
    content: "\ec98";
}
.i-Speach-Bubble3:before {
    content: "\ec99";
}
.i-Speach-Bubble4:before {
    content: "\ec9a";
}
.i-Speach-Bubble5:before {
    content: "\ec9b";
}
.i-Speach-Bubble6:before {
    content: "\ec9c";
}
.i-Speach-Bubble7:before {
    content: "\ec9d";
}
.i-Speach-Bubble8:before {
    content: "\ec9e";
}
.i-Speach-Bubble9:before {
    content: "\ec9f";
}
.i-Speach-Bubble10:before {
    content: "\eca0";
}
.i-Speach-Bubble11:before {
    content: "\eca1";
}
.i-Speach-Bubble12:before {
    content: "\eca2";
}
.i-Speach-Bubble13:before {
    content: "\eca3";
}
.i-Speach-BubbleAsking:before {
    content: "\eca4";
}
.i-Speach-BubbleComic:before {
    content: "\eca5";
}
.i-Speach-BubbleComic2:before {
    content: "\eca6";
}
.i-Speach-BubbleComic3:before {
    content: "\eca7";
}
.i-Speach-BubbleComic4:before {
    content: "\eca8";
}
.i-Speach-BubbleDialog:before {
    content: "\eca9";
}
.i-Speach-Bubbles:before {
    content: "\ecaa";
}
.i-Speak-2:before {
    content: "\ecab";
}
.i-Speak:before {
    content: "\ecac";
}
.i-Speaker-2:before {
    content: "\ecad";
}
.i-Speaker:before {
    content: "\ecae";
}
.i-Spell-Check:before {
    content: "\ecaf";
}
.i-Spell-CheckABC:before {
    content: "\ecb0";
}
.i-Spermium:before {
    content: "\ecb1";
}
.i-Spider:before {
    content: "\ecb2";
}
.i-Spiderweb:before {
    content: "\ecb3";
}
.i-Split-FourSquareWindow:before {
    content: "\ecb4";
}
.i-Split-Horizontal:before {
    content: "\ecb5";
}
.i-Split-Horizontal2Window:before {
    content: "\ecb6";
}
.i-Split-Vertical:before {
    content: "\ecb7";
}
.i-Split-Vertical2:before {
    content: "\ecb8";
}
.i-Split-Window:before {
    content: "\ecb9";
}
.i-Spoder:before {
    content: "\ecba";
}
.i-Spoon:before {
    content: "\ecbb";
}
.i-Sport-Mode:before {
    content: "\ecbc";
}
.i-Sports-Clothings1:before {
    content: "\ecbd";
}
.i-Sports-Clothings2:before {
    content: "\ecbe";
}
.i-Sports-Shirt:before {
    content: "\ecbf";
}
.i-Spot:before {
    content: "\ecc0";
}
.i-Spray:before {
    content: "\ecc1";
}
.i-Spread:before {
    content: "\ecc2";
}
.i-Spring:before {
    content: "\ecc3";
}
.i-Spurl:before {
    content: "\ecc4";
}
.i-Spy:before {
    content: "\ecc5";
}
.i-Squirrel:before {
    content: "\ecc6";
}
.i-SSL:before {
    content: "\ecc7";
}
.i-St-BasilsCathedral:before {
    content: "\ecc8";
}
.i-St-PaulsCathedral:before {
    content: "\ecc9";
}
.i-Stamp-2:before {
    content: "\ecca";
}
.i-Stamp:before {
    content: "\eccb";
}
.i-Stapler:before {
    content: "\eccc";
}
.i-Star-Track:before {
    content: "\eccd";
}
.i-Star:before {
    content: "\ecce";
}
.i-Starfish:before {
    content: "\eccf";
}
.i-Start2:before {
    content: "\ecd0";
}
.i-Start-3:before {
    content: "\ecd1";
}
.i-Start-ways:before {
    content: "\ecd2";
}
.i-Start:before {
    content: "\ecd3";
}
.i-Statistic:before {
    content: "\ecd4";
}
.i-Stethoscope:before {
    content: "\ecd5";
}
.i-stop--2:before {
    content: "\ecd6";
}
.i-Stop-Music:before {
    content: "\ecd7";
}
.i-Stop:before {
    content: "\ecd8";
}
.i-Stopwatch-2:before {
    content: "\ecd9";
}
.i-Stopwatch:before {
    content: "\ecda";
}
.i-Storm:before {
    content: "\ecdb";
}
.i-Street-View:before {
    content: "\ecdc";
}
.i-Street-View2:before {
    content: "\ecdd";
}
.i-Strikethrough-Text:before {
    content: "\ecde";
}
.i-Stroller:before {
    content: "\ecdf";
}
.i-Structure:before {
    content: "\ece0";
}
.i-Student-Female:before {
    content: "\ece1";
}
.i-Student-Hat:before {
    content: "\ece2";
}
.i-Student-Hat2:before {
    content: "\ece3";
}
.i-Student-Male:before {
    content: "\ece4";
}
.i-Student-MaleFemale:before {
    content: "\ece5";
}
.i-Students:before {
    content: "\ece6";
}
.i-Studio-Flash:before {
    content: "\ece7";
}
.i-Studio-Lightbox:before {
    content: "\ece8";
}
.i-Stumbleupon:before {
    content: "\ece9";
}
.i-Suit:before {
    content: "\ecea";
}
.i-Suitcase:before {
    content: "\eceb";
}
.i-Sum-2:before {
    content: "\ecec";
}
.i-Sum:before {
    content: "\eced";
}
.i-Summer:before {
    content: "\ecee";
}
.i-Sun-CloudyRain:before {
    content: "\ecef";
}
.i-Sun:before {
    content: "\ecf0";
}
.i-Sunglasses-2:before {
    content: "\ecf1";
}
.i-Sunglasses-3:before {
    content: "\ecf2";
}
.i-Sunglasses-Smiley:before {
    content: "\ecf3";
}
.i-Sunglasses-Smiley2:before {
    content: "\ecf4";
}
.i-Sunglasses-W:before {
    content: "\ecf5";
}
.i-Sunglasses-W2:before {
    content: "\ecf6";
}
.i-Sunglasses-W3:before {
    content: "\ecf7";
}
.i-Sunglasses:before {
    content: "\ecf8";
}
.i-Sunrise:before {
    content: "\ecf9";
}
.i-Sunset:before {
    content: "\ecfa";
}
.i-Superman:before {
    content: "\ecfb";
}
.i-Support:before {
    content: "\ecfc";
}
.i-Surprise:before {
    content: "\ecfd";
}
.i-Sushi:before {
    content: "\ecfe";
}
.i-Sweden:before {
    content: "\ecff";
}
.i-Swimming-Short:before {
    content: "\ed00";
}
.i-Swimming:before {
    content: "\ed01";
}
.i-Swimmwear:before {
    content: "\ed02";
}
.i-Switch:before {
    content: "\ed03";
}
.i-Switzerland:before {
    content: "\ed04";
}
.i-Sync-Cloud:before {
    content: "\ed05";
}
.i-Sync:before {
    content: "\ed06";
}
.i-Synchronize-2:before {
    content: "\ed07";
}
.i-Synchronize:before {
    content: "\ed08";
}
.i-T-Shirt:before {
    content: "\ed09";
}
.i-Tablet-2:before {
    content: "\ed0a";
}
.i-Tablet-3:before {
    content: "\ed0b";
}
.i-Tablet-Orientation:before {
    content: "\ed0c";
}
.i-Tablet-Phone:before {
    content: "\ed0d";
}
.i-Tablet-Secure:before {
    content: "\ed0e";
}
.i-Tablet-Vertical:before {
    content: "\ed0f";
}
.i-Tablet:before {
    content: "\ed10";
}
.i-Tactic:before {
    content: "\ed11";
}
.i-Tag-2:before {
    content: "\ed12";
}
.i-Tag-3:before {
    content: "\ed13";
}
.i-Tag-4:before {
    content: "\ed14";
}
.i-Tag-5:before {
    content: "\ed15";
}
.i-Tag:before {
    content: "\ed16";
}
.i-Taj-Mahal:before {
    content: "\ed17";
}
.i-Talk-Man:before {
    content: "\ed18";
}
.i-Tap:before {
    content: "\ed19";
}
.i-Target-Market:before {
    content: "\ed1a";
}
.i-Target:before {
    content: "\ed1b";
}
.i-Taurus-2:before {
    content: "\ed1c";
}
.i-Taurus:before {
    content: "\ed1d";
}
.i-Taxi-2:before {
    content: "\ed1e";
}
.i-Taxi-Sign:before {
    content: "\ed1f";
}
.i-Taxi:before {
    content: "\ed20";
}
.i-Teacher:before {
    content: "\ed21";
}
.i-Teapot:before {
    content: "\ed22";
}
.i-Technorati:before {
    content: "\ed23";
}
.i-Teddy-Bear:before {
    content: "\ed24";
}
.i-Tee-Mug:before {
    content: "\ed25";
}
.i-Telephone-2:before {
    content: "\ed26";
}
.i-Telephone:before {
    content: "\ed27";
}
.i-Telescope:before {
    content: "\ed28";
}
.i-Temperature-2:before {
    content: "\ed29";
}
.i-Temperature-3:before {
    content: "\ed2a";
}
.i-Temperature:before {
    content: "\ed2b";
}
.i-Temple:before {
    content: "\ed2c";
}
.i-Tennis-Ball:before {
    content: "\ed2d";
}
.i-Tennis:before {
    content: "\ed2e";
}
.i-Tent:before {
    content: "\ed2f";
}
.i-Test-Tube:before {
    content: "\ed30";
}
.i-Test-Tube2:before {
    content: "\ed31";
}
.i-Testimonal:before {
    content: "\ed32";
}
.i-Text-Box:before {
    content: "\ed33";
}
.i-Text-Effect:before {
    content: "\ed34";
}
.i-Text-HighlightColor:before {
    content: "\ed35";
}
.i-Text-Paragraph:before {
    content: "\ed36";
}
.i-Thailand:before {
    content: "\ed37";
}
.i-The-WhiteHouse:before {
    content: "\ed38";
}
.i-This-SideUp:before {
    content: "\ed39";
}
.i-Thread:before {
    content: "\ed3a";
}
.i-Three-ArrowFork:before {
    content: "\ed3b";
}
.i-Three-Fingers:before {
    content: "\ed3c";
}
.i-Three-FingersDrag:before {
    content: "\ed3d";
}
.i-Three-FingersDrag2:before {
    content: "\ed3e";
}
.i-Three-FingersTouch:before {
    content: "\ed3f";
}
.i-Thumb:before {
    content: "\ed40";
}
.i-Thumbs-DownSmiley:before {
    content: "\ed41";
}
.i-Thumbs-UpSmiley:before {
    content: "\ed42";
}
.i-Thunder:before {
    content: "\ed43";
}
.i-Thunderstorm:before {
    content: "\ed44";
}
.i-Ticket:before {
    content: "\ed45";
}
.i-Tie-2:before {
    content: "\ed46";
}
.i-Tie-3:before {
    content: "\ed47";
}
.i-Tie-4:before {
    content: "\ed48";
}
.i-Tie:before {
    content: "\ed49";
}
.i-Tiger:before {
    content: "\ed4a";
}
.i-Time-Backup:before {
    content: "\ed4b";
}
.i-Time-Bomb:before {
    content: "\ed4c";
}
.i-Time-Clock:before {
    content: "\ed4d";
}
.i-Time-Fire:before {
    content: "\ed4e";
}
.i-Time-Machine:before {
    content: "\ed4f";
}
.i-Time-Window:before {
    content: "\ed50";
}
.i-Timer-2:before {
    content: "\ed51";
}
.i-Timer:before {
    content: "\ed52";
}
.i-To-Bottom:before {
    content: "\ed53";
}
.i-To-Bottom2:before {
    content: "\ed54";
}
.i-To-Left:before {
    content: "\ed55";
}
.i-To-Right:before {
    content: "\ed56";
}
.i-To-Top:before {
    content: "\ed57";
}
.i-To-Top2:before {
    content: "\ed58";
}
.i-Token-:before {
    content: "\ed59";
}
.i-Tomato:before {
    content: "\ed5a";
}
.i-Tongue:before {
    content: "\ed5b";
}
.i-Tooth-2:before {
    content: "\ed5c";
}
.i-Tooth:before {
    content: "\ed5d";
}
.i-Top-ToBottom:before {
    content: "\ed5e";
}
.i-Touch-Window:before {
    content: "\ed5f";
}
.i-Tourch:before {
    content: "\ed60";
}
.i-Tower-2:before {
    content: "\ed61";
}
.i-Tower-Bridge:before {
    content: "\ed62";
}
.i-Tower:before {
    content: "\ed63";
}
.i-Trace:before {
    content: "\ed64";
}
.i-Tractor:before {
    content: "\ed65";
}
.i-traffic-Light:before {
    content: "\ed66";
}
.i-Traffic-Light2:before {
    content: "\ed67";
}
.i-Train-2:before {
    content: "\ed68";
}
.i-Train:before {
    content: "\ed69";
}
.i-Tram:before {
    content: "\ed6a";
}
.i-Transform-2:before {
    content: "\ed6b";
}
.i-Transform-3:before {
    content: "\ed6c";
}
.i-Transform-4:before {
    content: "\ed6d";
}
.i-Transform:before {
    content: "\ed6e";
}
.i-Trash-withMen:before {
    content: "\ed6f";
}
.i-Tree-2:before {
    content: "\ed70";
}
.i-Tree-3:before {
    content: "\ed71";
}
.i-Tree-4:before {
    content: "\ed72";
}
.i-Tree-5:before {
    content: "\ed73";
}
.i-Tree:before {
    content: "\ed74";
}
.i-Trekking:before {
    content: "\ed75";
}
.i-Triangle-ArrowDown:before {
    content: "\ed76";
}
.i-Triangle-ArrowLeft:before {
    content: "\ed77";
}
.i-Triangle-ArrowRight:before {
    content: "\ed78";
}
.i-Triangle-ArrowUp:before {
    content: "\ed79";
}
.i-Tripod-2:before {
    content: "\ed7a";
}
.i-Tripod-andVideo:before {
    content: "\ed7b";
}
.i-Tripod-withCamera:before {
    content: "\ed7c";
}
.i-Tripod-withGopro:before {
    content: "\ed7d";
}
.i-Trophy-2:before {
    content: "\ed7e";
}
.i-Trophy:before {
    content: "\ed7f";
}
.i-Truck:before {
    content: "\ed80";
}
.i-Trumpet:before {
    content: "\ed81";
}
.i-Tumblr:before {
    content: "\ed82";
}
.i-Turkey:before {
    content: "\ed83";
}
.i-Turn-Down:before {
    content: "\ed84";
}
.i-Turn-Down2:before {
    content: "\ed85";
}
.i-Turn-DownFromLeft:before {
    content: "\ed86";
}
.i-Turn-DownFromRight:before {
    content: "\ed87";
}
.i-Turn-Left:before {
    content: "\ed88";
}
.i-Turn-Left3:before {
    content: "\ed89";
}
.i-Turn-Right:before {
    content: "\ed8a";
}
.i-Turn-Right3:before {
    content: "\ed8b";
}
.i-Turn-Up:before {
    content: "\ed8c";
}
.i-Turn-Up2:before {
    content: "\ed8d";
}
.i-Turtle:before {
    content: "\ed8e";
}
.i-Tuxedo:before {
    content: "\ed8f";
}
.i-TV:before {
    content: "\ed90";
}
.i-Twister:before {
    content: "\ed91";
}
.i-Twitter-2:before {
    content: "\ed92";
}
.i-Twitter:before {
    content: "\ed93";
}
.i-Two-Fingers:before {
    content: "\ed94";
}
.i-Two-FingersDrag:before {
    content: "\ed95";
}
.i-Two-FingersDrag2:before {
    content: "\ed96";
}
.i-Two-FingersScroll:before {
    content: "\ed97";
}
.i-Two-FingersTouch:before {
    content: "\ed98";
}
.i-Two-Windows:before {
    content: "\ed99";
}
.i-Type-Pass:before {
    content: "\ed9a";
}
.i-Ukraine:before {
    content: "\ed9b";
}
.i-Umbrela:before {
    content: "\ed9c";
}
.i-Umbrella-2:before {
    content: "\ed9d";
}
.i-Umbrella-3:before {
    content: "\ed9e";
}
.i-Under-LineText:before {
    content: "\ed9f";
}
.i-Undo:before {
    content: "\eda0";
}
.i-United-Kingdom:before {
    content: "\eda1";
}
.i-United-States:before {
    content: "\eda2";
}
.i-University-2:before {
    content: "\eda3";
}
.i-University:before {
    content: "\eda4";
}
.i-Unlike-2:before {
    content: "\eda5";
}
.i-Unlike:before {
    content: "\eda6";
}
.i-Unlock-2:before {
    content: "\eda7";
}
.i-Unlock-3:before {
    content: "\eda8";
}
.i-Unlock:before {
    content: "\eda9";
}
.i-Up--Down:before {
    content: "\edaa";
}
.i-Up--Down3:before {
    content: "\edab";
}
.i-Up-2:before {
    content: "\edac";
}
.i-Up-3:before {
    content: "\edad";
}
.i-Up-4:before {
    content: "\edae";
}
.i-Up:before {
    content: "\edaf";
}
.i-Upgrade:before {
    content: "\edb0";
}
.i-Upload-2:before {
    content: "\edb1";
}
.i-Upload-toCloud:before {
    content: "\edb2";
}
.i-Upload-Window:before {
    content: "\edb3";
}
.i-Upload:before {
    content: "\edb4";
}
.i-Uppercase-Text:before {
    content: "\edb5";
}
.i-Upward:before {
    content: "\edb6";
}
.i-URL-Window:before {
    content: "\edb7";
}
.i-Usb-2:before {
    content: "\edb8";
}
.i-Usb-Cable:before {
    content: "\edb9";
}
.i-Usb:before {
    content: "\edba";
}
.i-User:before {
    content: "\edbb";
}
.i-Ustream:before {
    content: "\edbc";
}
.i-Vase:before {
    content: "\edbd";
}
.i-Vector-2:before {
    content: "\edbe";
}
.i-Vector-3:before {
    content: "\edbf";
}
.i-Vector-4:before {
    content: "\edc0";
}
.i-Vector-5:before {
    content: "\edc1";
}
.i-Vector:before {
    content: "\edc2";
}
.i-Venn-Diagram:before {
    content: "\edc3";
}
.i-Vest-2:before {
    content: "\edc4";
}
.i-Vest:before {
    content: "\edc5";
}
.i-Viddler:before {
    content: "\edc6";
}
.i-Video-2:before {
    content: "\edc7";
}
.i-Video-3:before {
    content: "\edc8";
}
.i-Video-4:before {
    content: "\edc9";
}
.i-Video-5:before {
    content: "\edca";
}
.i-Video-6:before {
    content: "\edcb";
}
.i-Video-GameController:before {
    content: "\edcc";
}
.i-Video-Len:before {
    content: "\edcd";
}
.i-Video-Len2:before {
    content: "\edce";
}
.i-Video-Photographer:before {
    content: "\edcf";
}
.i-Video-Tripod:before {
    content: "\edd0";
}
.i-Video:before {
    content: "\edd1";
}
.i-Vietnam:before {
    content: "\edd2";
}
.i-View-Height:before {
    content: "\edd3";
}
.i-View-Width:before {
    content: "\edd4";
}
.i-Vimeo:before {
    content: "\edd5";
}
.i-Virgo-2:before {
    content: "\edd6";
}
.i-Virgo:before {
    content: "\edd7";
}
.i-Virus-2:before {
    content: "\edd8";
}
.i-Virus-3:before {
    content: "\edd9";
}
.i-Virus:before {
    content: "\edda";
}
.i-Visa:before {
    content: "\eddb";
}
.i-Voice:before {
    content: "\eddc";
}
.i-Voicemail:before {
    content: "\eddd";
}
.i-Volleyball:before {
    content: "\edde";
}
.i-Volume-Down:before {
    content: "\eddf";
}
.i-Volume-Up:before {
    content: "\ede0";
}
.i-VPN:before {
    content: "\ede1";
}
.i-Wacom-Tablet:before {
    content: "\ede2";
}
.i-Waiter:before {
    content: "\ede3";
}
.i-Walkie-Talkie:before {
    content: "\ede4";
}
.i-Wallet-2:before {
    content: "\ede5";
}
.i-Wallet-3:before {
    content: "\ede6";
}
.i-Wallet:before {
    content: "\ede7";
}
.i-Warehouse:before {
    content: "\ede8";
}
.i-Warning-Window:before {
    content: "\ede9";
}
.i-Watch-2:before {
    content: "\edea";
}
.i-Watch-3:before {
    content: "\edeb";
}
.i-Watch:before {
    content: "\edec";
}
.i-Wave-2:before {
    content: "\eded";
}
.i-Wave:before {
    content: "\edee";
}
.i-Webcam:before {
    content: "\edef";
}
.i-weight-Lift:before {
    content: "\edf0";
}
.i-Wheelbarrow:before {
    content: "\edf1";
}
.i-Wheelchair:before {
    content: "\edf2";
}
.i-Width-Window:before {
    content: "\edf3";
}
.i-Wifi-2:before {
    content: "\edf4";
}
.i-Wifi-Keyboard:before {
    content: "\edf5";
}
.i-Wifi:before {
    content: "\edf6";
}
.i-Wind-Turbine:before {
    content: "\edf7";
}
.i-Windmill:before {
    content: "\edf8";
}
.i-Window-2:before {
    content: "\edf9";
}
.i-Window:before {
    content: "\edfa";
}
.i-Windows-2:before {
    content: "\edfb";
}
.i-Windows-Microsoft:before {
    content: "\edfc";
}
.i-Windows:before {
    content: "\edfd";
}
.i-Windsock:before {
    content: "\edfe";
}
.i-Windy:before {
    content: "\edff";
}
.i-Wine-Bottle:before {
    content: "\ee00";
}
.i-Wine-Glass:before {
    content: "\ee01";
}
.i-Wink:before {
    content: "\ee02";
}
.i-Winter-2:before {
    content: "\ee03";
}
.i-Winter:before {
    content: "\ee04";
}
.i-Wireless:before {
    content: "\ee05";
}
.i-Witch-Hat:before {
    content: "\ee06";
}
.i-Witch:before {
    content: "\ee07";
}
.i-Wizard:before {
    content: "\ee08";
}
.i-Wolf:before {
    content: "\ee09";
}
.i-Woman-Sign:before {
    content: "\ee0a";
}
.i-WomanMan:before {
    content: "\ee0b";
}
.i-Womans-Underwear:before {
    content: "\ee0c";
}
.i-Womans-Underwear2:before {
    content: "\ee0d";
}
.i-Women:before {
    content: "\ee0e";
}
.i-Wonder-Woman:before {
    content: "\ee0f";
}
.i-Wordpress:before {
    content: "\ee10";
}
.i-Worker-Clothes:before {
    content: "\ee11";
}
.i-Worker:before {
    content: "\ee12";
}
.i-Wrap-Text:before {
    content: "\ee13";
}
.i-Wreath:before {
    content: "\ee14";
}
.i-Wrench:before {
    content: "\ee15";
}
.i-X-Box:before {
    content: "\ee16";
}
.i-X-ray:before {
    content: "\ee17";
}
.i-Xanga:before {
    content: "\ee18";
}
.i-Xing:before {
    content: "\ee19";
}
.i-Yacht:before {
    content: "\ee1a";
}
.i-Yahoo-Buzz:before {
    content: "\ee1b";
}
.i-Yahoo:before {
    content: "\ee1c";
}
.i-Yelp:before {
    content: "\ee1d";
}
.i-Yes:before {
    content: "\ee1e";
}
.i-Ying-Yang:before {
    content: "\ee1f";
}
.i-Youtube:before {
    content: "\ee20";
}
.i-Z-A:before {
    content: "\ee21";
}
.i-Zebra:before {
    content: "\ee22";
}
.i-Zombie:before {
    content: "\ee23";
}
.i-Zoom-Gesture:before {
    content: "\ee24";
}
.i-Zootool:before {
    content: "\ee25";
}
<style>@import url(https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900);</style>
<style>@import url(https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900);</style><style>/*!
 * Bootstrap v4.1.3 (https://getbootstrap.com/)
 * Copyright 2011-2018 The Bootstrap Authors
 * Copyright 2011-2018 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 */:root{--blue:#3b82f6;--indigo:#6366f1;--gray-dark:#1f2937;--purple:#8b5cf6;--pink:#ec4899;--red:#ef4444;--orange:#f97316;--yellow:#f59e0b;--green:#10b981;--teal:#14b8a6;--cyan:#06b6d4;--white:#fff;--gray:#4b5563;--primary:#ff630f;--secondary:#1f2937;--success:#10b981;--info:#3b82f6;--warning:#f59e0b;--danger:#ef4444;--light:#6b7280;--dark:#111827;--gray-100:#f3f4f6;--gray-200:#e5e7eb;--gray-300:#d1d5db;--gray-400:#9ca3af;--gray-500:#6b7280;--gray-600:#4b5563;--gray-700:#374151;--gray-800:#1f2937;--gray-900:#111827;--breakpoint-xs:0;--breakpoint-sm:576px;--breakpoint-md:768px;--breakpoint-lg:992px;--breakpoint-xl:1200px;--font-family-sans-serif:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";--font-family-monospace:SFMono-Regular,Menlo,Monaco,Consolas,"Liberation Mono","Courier New",monospace}*,:after,:before{box-sizing:border-box}html{-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;-ms-overflow-style:scrollbar;-webkit-tap-highlight-color:rgba(0,0,0,0);font-family:sans-serif;line-height:1.15}article,aside,figcaption,figure,footer,header,hgroup,main,nav,section{display:block}body{background-color:#fff;color:#111827;font-family:Nunito,sans-serif;font-size:.813rem;font-weight:400;line-height:1.5;margin:0;text-align:left}[tabindex="-1"]:focus{outline:0!important}hr{box-sizing:content-box;overflow:visible}h1,h2,h3,h4,h5,h6{margin-bottom:.5rem;margin-top:0}p{margin-bottom:1rem;margin-top:0}abbr[data-original-title],abbr[title]{border-bottom:0;cursor:help;text-decoration:underline;-webkit-text-decoration:underline dotted;text-decoration:underline dotted}address{font-style:normal;line-height:inherit}address,dl,ol,ul{margin-bottom:1rem}dl,ol,ul{margin-top:0}ol ol,ol ul,ul ol,ul ul{margin-bottom:0}dt{font-weight:700}dd{margin-bottom:.5rem;margin-left:0}blockquote{margin:0 0 1rem}dfn{font-style:italic}b,strong{font-weight:bolder}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sub{bottom:-.25em}sup{top:-.5em}a{-webkit-text-decoration-skip:objects;background-color:transparent;color:#ff630f;text-decoration:none}a:hover{color:#c24400;text-decoration:underline}a:not([href]):not([tabindex]),a:not([href]):not([tabindex]):focus,a:not([href]):not([tabindex]):hover{color:inherit;text-decoration:none}a:not([href]):not([tabindex]):focus{outline:0}code,kbd,pre,samp{font-family:SFMono-Regular,Menlo,Monaco,Consolas,Liberation Mono,Courier New,monospace;font-size:1em}pre{-ms-overflow-style:scrollbar;margin-bottom:1rem;margin-top:0;overflow:auto}figure{margin:0 0 1rem}img{border-style:none}img,svg{vertical-align:middle}svg{overflow:hidden}caption{caption-side:bottom;color:#4b5563;padding-bottom:.75rem;padding-top:.75rem;text-align:left}th{text-align:inherit}label{display:inline-block;margin-bottom:.5rem}button{border-radius:0}button:focus{outline:1px dotted;outline:5px auto -webkit-focus-ring-color}button,input,optgroup,select,textarea{font-family:inherit;font-size:inherit;line-height:inherit;margin:0}button,input{overflow:visible}button,select{text-transform:none}[type=reset],[type=submit],button,html [type=button]{-webkit-appearance:button}[type=button]::-moz-focus-inner,[type=reset]::-moz-focus-inner,[type=submit]::-moz-focus-inner,button::-moz-focus-inner{border-style:none;padding:0}input[type=checkbox],input[type=radio]{box-sizing:border-box;padding:0}input[type=date],input[type=datetime-local],input[type=month],input[type=time]{-webkit-appearance:listbox}textarea{overflow:auto;resize:vertical}fieldset{border:0;margin:0;min-width:0;padding:0}legend{color:inherit;display:block;font-size:1.5rem;line-height:inherit;margin-bottom:.5rem;max-width:100%;padding:0;white-space:normal;width:100%}progress{vertical-align:baseline}[type=number]::-webkit-inner-spin-button,[type=number]::-webkit-outer-spin-button{height:auto}[type=search]{-webkit-appearance:none;outline-offset:-2px}[type=search]::-webkit-search-cancel-button,[type=search]::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}output{display:inline-block}summary{cursor:pointer;display:list-item}template{display:none}[hidden]{display:none!important}.h1,.h2,.h3,.h4,.h5,.h6,h1,h2,h3,h4,h5,h6{color:inherit;font-family:inherit;font-weight:500;line-height:1.2;margin-bottom:.5rem}.h1,h1{font-size:2.0325rem}.h2,h2{font-size:1.626rem}.h3,h3{font-size:1.42275rem}.h4,h4{font-size:1.2195rem}.h5,h5{font-size:1.01625rem}.h6,h6{font-size:.813rem}.lead{font-size:1.01625rem}.display-4{font-weight:300;line-height:1.2}hr{margin-bottom:1rem;margin-top:1rem}.small,small{font-size:80%;font-weight:400}.mark,mark{background-color:#fcf8e3;padding:.2em}.list-inline,.list-unstyled{list-style:none;padding-left:0}.list-inline-item{display:inline-block}.list-inline-item:not(:last-child){margin-right:.5rem}.initialism{font-size:90%;text-transform:uppercase}.blockquote{font-size:1.01625rem}.blockquote-footer{color:#4b5563}.blockquote-footer:before{content:"\2014 \00A0"}.img-fluid,.img-thumbnail{height:auto;max-width:100%}.img-thumbnail{background-color:#fff;border:1px solid #d1d5db;border-radius:.25rem;padding:.25rem}.figure{display:inline-block}.figure-img{line-height:1;margin-bottom:.5rem}.figure-caption{color:#4b5563;font-size:90%}code{color:#ec4899;font-size:87.5%;word-break:break-word}a>code{color:inherit}kbd{background-color:#111827;border-radius:.2rem;color:#fff;font-size:87.5%;padding:.2rem .4rem}kbd kbd{font-size:100%;font-weight:700;padding:0}pre{color:#111827;display:block;font-size:87.5%}pre code{color:inherit;font-size:inherit;word-break:normal}.pre-scrollable{max-height:340px;overflow-y:scroll}.container{margin-left:auto;margin-right:auto;padding-left:15px;padding-right:15px;width:100%}@media (min-width:576px){.container{max-width:540px}}@media (min-width:768px){.container{max-width:720px}}@media (min-width:992px){.container{max-width:960px}}@media (min-width:1200px){.container{max-width:1140px}}.container-fluid{margin-left:auto;margin-right:auto;padding-left:15px;padding-right:15px;width:100%}.row{display:flex;flex-wrap:wrap;margin-left:-15px;margin-right:-15px}.no-gutters{margin-left:0;margin-right:0}.no-gutters>.col,.no-gutters>[class*=col-]{padding-left:0;padding-right:0}.col,.col-1,.col-10,.col-11,.col-12,.col-2,.col-3,.col-4,.col-5,.col-6,.col-7,.col-8,.col-9,.col-auto,.col-lg,.col-lg-1,.col-lg-10,.col-lg-11,.col-lg-12,.col-lg-2,.col-lg-3,.col-lg-4,.col-lg-5,.col-lg-6,.col-lg-7,.col-lg-8,.col-lg-9,.col-lg-auto,.col-md,.col-md-1,.col-md-10,.col-md-11,.col-md-12,.col-md-2,.col-md-3,.col-md-4,.col-md-5,.col-md-6,.col-md-7,.col-md-8,.col-md-9,.col-md-auto,.col-sm,.col-sm-1,.col-sm-10,.col-sm-11,.col-sm-12,.col-sm-2,.col-sm-3,.col-sm-4,.col-sm-5,.col-sm-6,.col-sm-7,.col-sm-8,.col-sm-9,.col-sm-auto,.col-xl,.col-xl-1,.col-xl-10,.col-xl-11,.col-xl-12,.col-xl-2,.col-xl-3,.col-xl-4,.col-xl-5,.col-xl-6,.col-xl-7,.col-xl-8,.col-xl-9,.col-xl-auto{min-height:1px;padding-left:15px;padding-right:15px;position:relative;width:100%}.col{flex-basis:0;flex-grow:1;max-width:100%}.col-auto{flex:0 0 auto;max-width:none;width:auto}.col-1{flex:0 0 8.33333333%;max-width:8.33333333%}.col-2{flex:0 0 16.66666667%;max-width:16.66666667%}.col-3{flex:0 0 25%;max-width:25%}.col-4{flex:0 0 33.33333333%;max-width:33.33333333%}.col-5{flex:0 0 41.66666667%;max-width:41.66666667%}.col-6{flex:0 0 50%;max-width:50%}.col-7{flex:0 0 58.33333333%;max-width:58.33333333%}.col-8{flex:0 0 66.66666667%;max-width:66.66666667%}.col-9{flex:0 0 75%;max-width:75%}.col-10{flex:0 0 83.33333333%;max-width:83.33333333%}.col-11{flex:0 0 91.66666667%;max-width:91.66666667%}.col-12{flex:0 0 100%;max-width:100%}.order-first{order:-1}.order-last{order:13}.order-0{order:0}.order-1{order:1}.order-2{order:2}.order-3{order:3}.order-4{order:4}.order-5{order:5}.order-6{order:6}.order-7{order:7}.order-8{order:8}.order-9{order:9}.order-10{order:10}.order-11{order:11}.order-12{order:12}.offset-1{margin-left:8.33333333%}.offset-2{margin-left:16.66666667%}.offset-3{margin-left:25%}.offset-4{margin-left:33.33333333%}.offset-5{margin-left:41.66666667%}.offset-6{margin-left:50%}.offset-7{margin-left:58.33333333%}.offset-8{margin-left:66.66666667%}.offset-9{margin-left:75%}.offset-10{margin-left:83.33333333%}.offset-11{margin-left:91.66666667%}@media (min-width:576px){.col-sm{flex-basis:0;flex-grow:1;max-width:100%}.col-sm-auto{flex:0 0 auto;max-width:none;width:auto}.col-sm-1{flex:0 0 8.33333333%;max-width:8.33333333%}.col-sm-2{flex:0 0 16.66666667%;max-width:16.66666667%}.col-sm-3{flex:0 0 25%;max-width:25%}.col-sm-4{flex:0 0 33.33333333%;max-width:33.33333333%}.col-sm-5{flex:0 0 41.66666667%;max-width:41.66666667%}.col-sm-6{flex:0 0 50%;max-width:50%}.col-sm-7{flex:0 0 58.33333333%;max-width:58.33333333%}.col-sm-8{flex:0 0 66.66666667%;max-width:66.66666667%}.col-sm-9{flex:0 0 75%;max-width:75%}.col-sm-10{flex:0 0 83.33333333%;max-width:83.33333333%}.col-sm-11{flex:0 0 91.66666667%;max-width:91.66666667%}.col-sm-12{flex:0 0 100%;max-width:100%}.order-sm-first{order:-1}.order-sm-last{order:13}.order-sm-0{order:0}.order-sm-1{order:1}.order-sm-2{order:2}.order-sm-3{order:3}.order-sm-4{order:4}.order-sm-5{order:5}.order-sm-6{order:6}.order-sm-7{order:7}.order-sm-8{order:8}.order-sm-9{order:9}.order-sm-10{order:10}.order-sm-11{order:11}.order-sm-12{order:12}.offset-sm-0{margin-left:0}.offset-sm-1{margin-left:8.33333333%}.offset-sm-2{margin-left:16.66666667%}.offset-sm-3{margin-left:25%}.offset-sm-4{margin-left:33.33333333%}.offset-sm-5{margin-left:41.66666667%}.offset-sm-6{margin-left:50%}.offset-sm-7{margin-left:58.33333333%}.offset-sm-8{margin-left:66.66666667%}.offset-sm-9{margin-left:75%}.offset-sm-10{margin-left:83.33333333%}.offset-sm-11{margin-left:91.66666667%}}@media (min-width:768px){.col-md{flex-basis:0;flex-grow:1;max-width:100%}.col-md-auto{flex:0 0 auto;max-width:none;width:auto}.col-md-1{flex:0 0 8.33333333%;max-width:8.33333333%}.col-md-2{flex:0 0 16.66666667%;max-width:16.66666667%}.col-md-3{flex:0 0 25%;max-width:25%}.col-md-4{flex:0 0 33.33333333%;max-width:33.33333333%}.col-md-5{flex:0 0 41.66666667%;max-width:41.66666667%}.col-md-6{flex:0 0 50%;max-width:50%}.col-md-7{flex:0 0 58.33333333%;max-width:58.33333333%}.col-md-8{flex:0 0 66.66666667%;max-width:66.66666667%}.col-md-9{flex:0 0 75%;max-width:75%}.col-md-10{flex:0 0 83.33333333%;max-width:83.33333333%}.col-md-11{flex:0 0 91.66666667%;max-width:91.66666667%}.col-md-12{flex:0 0 100%;max-width:100%}.order-md-first{order:-1}.order-md-last{order:13}.order-md-0{order:0}.order-md-1{order:1}.order-md-2{order:2}.order-md-3{order:3}.order-md-4{order:4}.order-md-5{order:5}.order-md-6{order:6}.order-md-7{order:7}.order-md-8{order:8}.order-md-9{order:9}.order-md-10{order:10}.order-md-11{order:11}.order-md-12{order:12}.offset-md-0{margin-left:0}.offset-md-1{margin-left:8.33333333%}.offset-md-2{margin-left:16.66666667%}.offset-md-3{margin-left:25%}.offset-md-4{margin-left:33.33333333%}.offset-md-5{margin-left:41.66666667%}.offset-md-6{margin-left:50%}.offset-md-7{margin-left:58.33333333%}.offset-md-8{margin-left:66.66666667%}.offset-md-9{margin-left:75%}.offset-md-10{margin-left:83.33333333%}.offset-md-11{margin-left:91.66666667%}}@media (min-width:992px){.col-lg{flex-basis:0;flex-grow:1;max-width:100%}.col-lg-auto{flex:0 0 auto;max-width:none;width:auto}.col-lg-1{flex:0 0 8.33333333%;max-width:8.33333333%}.col-lg-2{flex:0 0 16.66666667%;max-width:16.66666667%}.col-lg-3{flex:0 0 25%;max-width:25%}.col-lg-4{flex:0 0 33.33333333%;max-width:33.33333333%}.col-lg-5{flex:0 0 41.66666667%;max-width:41.66666667%}.col-lg-6{flex:0 0 50%;max-width:50%}.col-lg-7{flex:0 0 58.33333333%;max-width:58.33333333%}.col-lg-8{flex:0 0 66.66666667%;max-width:66.66666667%}.col-lg-9{flex:0 0 75%;max-width:75%}.col-lg-10{flex:0 0 83.33333333%;max-width:83.33333333%}.col-lg-11{flex:0 0 91.66666667%;max-width:91.66666667%}.col-lg-12{flex:0 0 100%;max-width:100%}.order-lg-first{order:-1}.order-lg-last{order:13}.order-lg-0{order:0}.order-lg-1{order:1}.order-lg-2{order:2}.order-lg-3{order:3}.order-lg-4{order:4}.order-lg-5{order:5}.order-lg-6{order:6}.order-lg-7{order:7}.order-lg-8{order:8}.order-lg-9{order:9}.order-lg-10{order:10}.order-lg-11{order:11}.order-lg-12{order:12}.offset-lg-0{margin-left:0}.offset-lg-1{margin-left:8.33333333%}.offset-lg-2{margin-left:16.66666667%}.offset-lg-3{margin-left:25%}.offset-lg-4{margin-left:33.33333333%}.offset-lg-5{margin-left:41.66666667%}.offset-lg-6{margin-left:50%}.offset-lg-7{margin-left:58.33333333%}.offset-lg-8{margin-left:66.66666667%}.offset-lg-9{margin-left:75%}.offset-lg-10{margin-left:83.33333333%}.offset-lg-11{margin-left:91.66666667%}}@media (min-width:1200px){.col-xl{flex-basis:0;flex-grow:1;max-width:100%}.col-xl-auto{flex:0 0 auto;max-width:none;width:auto}.col-xl-1{flex:0 0 8.33333333%;max-width:8.33333333%}.col-xl-2{flex:0 0 16.66666667%;max-width:16.66666667%}.col-xl-3{flex:0 0 25%;max-width:25%}.col-xl-4{flex:0 0 33.33333333%;max-width:33.33333333%}.col-xl-5{flex:0 0 41.66666667%;max-width:41.66666667%}.col-xl-6{flex:0 0 50%;max-width:50%}.col-xl-7{flex:0 0 58.33333333%;max-width:58.33333333%}.col-xl-8{flex:0 0 66.66666667%;max-width:66.66666667%}.col-xl-9{flex:0 0 75%;max-width:75%}.col-xl-10{flex:0 0 83.33333333%;max-width:83.33333333%}.col-xl-11{flex:0 0 91.66666667%;max-width:91.66666667%}.col-xl-12{flex:0 0 100%;max-width:100%}.order-xl-first{order:-1}.order-xl-last{order:13}.order-xl-0{order:0}.order-xl-1{order:1}.order-xl-2{order:2}.order-xl-3{order:3}.order-xl-4{order:4}.order-xl-5{order:5}.order-xl-6{order:6}.order-xl-7{order:7}.order-xl-8{order:8}.order-xl-9{order:9}.order-xl-10{order:10}.order-xl-11{order:11}.order-xl-12{order:12}.offset-xl-0{margin-left:0}.offset-xl-1{margin-left:8.33333333%}.offset-xl-2{margin-left:16.66666667%}.offset-xl-3{margin-left:25%}.offset-xl-4{margin-left:33.33333333%}.offset-xl-5{margin-left:41.66666667%}.offset-xl-6{margin-left:50%}.offset-xl-7{margin-left:58.33333333%}.offset-xl-8{margin-left:66.66666667%}.offset-xl-9{margin-left:75%}.offset-xl-10{margin-left:83.33333333%}.offset-xl-11{margin-left:91.66666667%}}.table{background-color:transparent;margin-bottom:1rem;width:100%}.table td,.table th{border-top:1px solid #d1d5db;padding:.75rem;vertical-align:top}.table thead th{border-bottom:2px solid #d1d5db}.table tbody+tbody{border-top:2px solid #d1d5db}.table .table{background-color:#fff}.table-sm td,.table-sm th{padding:.3rem}.table-bordered,.table-bordered td,.table-bordered th{border:1px solid #d1d5db}.table-bordered thead td,.table-bordered thead th{border-bottom-width:2px}.table-borderless tbody+tbody,.table-borderless td,.table-borderless th,.table-borderless thead th{border:0}.table-striped tbody tr:nth-of-type(odd){background-color:rgba(0,0,0,.05)}.table-hover tbody tr:hover{background-color:rgba(0,0,0,.075)}.table-primary,.table-primary>td,.table-primary>th{background-color:#ffd3bc}.table-hover .table-primary:hover,.table-hover .table-primary:hover>td,.table-hover .table-primary:hover>th{background-color:#ffc2a3}.table-secondary,.table-secondary>td,.table-secondary>th{background-color:#c0c3c7}.table-hover .table-secondary:hover,.table-hover .table-secondary:hover>td,.table-hover .table-secondary:hover>th{background-color:#b3b6bb}.table-success,.table-success>td,.table-success>th{background-color:#bcebdc}.table-hover .table-success:hover,.table-hover .table-success:hover>td,.table-hover .table-success:hover>th{background-color:#a8e5d2}.table-info,.table-info>td,.table-info>th{background-color:#c8dcfc}.table-hover .table-info:hover,.table-hover .table-info:hover>td,.table-hover .table-info:hover>th{background-color:#b0cdfb}.table-warning,.table-warning>td,.table-warning>th{background-color:#fce4bb}.table-hover .table-warning:hover,.table-hover .table-warning:hover>td,.table-hover .table-warning:hover>th{background-color:#fbdaa3}.table-danger,.table-danger>td,.table-danger>th{background-color:#fbcbcb}.table-hover .table-danger:hover,.table-hover .table-danger:hover>td,.table-hover .table-danger:hover>th{background-color:#f9b3b3}.table-light,.table-light>td,.table-light>th{background-color:#d6d8db}.table-hover .table-light:hover,.table-hover .table-light:hover>td,.table-hover .table-light:hover>th{background-color:#c8cbcf}.table-dark,.table-dark>td,.table-dark>th{background-color:#bcbec3}.table-hover .table-dark:hover,.table-hover .table-dark:hover>td,.table-hover .table-dark:hover>th{background-color:#afb1b7}.table-gray-100,.table-gray-100>td,.table-gray-100>th{background-color:#fcfcfc}.table-hover .table-gray-100:hover,.table-hover .table-gray-100:hover>td,.table-hover .table-gray-100:hover>th{background-color:#efefef}.table-gray-200,.table-gray-200>td,.table-gray-200>th{background-color:#f8f8f9}.table-hover .table-gray-200:hover,.table-hover .table-gray-200:hover>td,.table-hover .table-gray-200:hover>th{background-color:#eaeaed}.table-gray-300,.table-gray-300>td,.table-gray-300>th{background-color:#f2f3f5}.table-hover .table-gray-300:hover,.table-hover .table-gray-300:hover>td,.table-hover .table-gray-300:hover>th{background-color:#e4e6ea}.table-gray-400,.table-gray-400>td,.table-gray-400>th{background-color:#e3e5e9}.table-hover .table-gray-400:hover,.table-hover .table-gray-400:hover>td,.table-hover .table-gray-400:hover>th{background-color:#d5d8de}.table-gray-500,.table-gray-500>td,.table-gray-500>th{background-color:#d6d8db}.table-hover .table-gray-500:hover,.table-hover .table-gray-500:hover>td,.table-hover .table-gray-500:hover>th{background-color:#c8cbcf}.table-gray-600,.table-gray-600>td,.table-gray-600>th{background-color:#cdcfd3}.table-hover .table-gray-600:hover,.table-hover .table-gray-600:hover>td,.table-hover .table-gray-600:hover>th{background-color:#bfc2c7}.table-gray-700,.table-gray-700>td,.table-gray-700>th{background-color:#c7cace}.table-hover .table-gray-700:hover,.table-hover .table-gray-700:hover>td,.table-hover .table-gray-700:hover>th{background-color:#b9bdc2}.table-gray-800,.table-gray-800>td,.table-gray-800>th{background-color:#c0c3c7}.table-hover .table-gray-800:hover,.table-hover .table-gray-800:hover>td,.table-hover .table-gray-800:hover>th{background-color:#b3b6bb}.table-gray-900,.table-gray-900>td,.table-gray-900>th{background-color:#bcbec3}.table-hover .table-gray-900:hover,.table-hover .table-gray-900:hover>td,.table-hover .table-gray-900:hover>th{background-color:#afb1b7}.table-active,.table-active>td,.table-active>th,.table-hover .table-active:hover,.table-hover .table-active:hover>td,.table-hover .table-active:hover>th{background-color:rgba(0,0,0,.075)}.table .thead-dark th{background-color:#111827;border-color:#1d2842;color:#fff}.table .thead-light th{background-color:#e5e7eb;border-color:#d1d5db;color:#374151}.table-dark{background-color:#111827;color:#fff}.table-dark td,.table-dark th,.table-dark thead th{border-color:#1d2842}.table-dark.table-bordered{border:0}.table-dark.table-striped tbody tr:nth-of-type(odd){background-color:hsla(0,0%,100%,.05)}.table-dark.table-hover tbody tr:hover{background-color:hsla(0,0%,100%,.075)}@media (max-width:575.98px){.table-responsive-sm{-webkit-overflow-scrolling:touch;-ms-overflow-style:-ms-autohiding-scrollbar;display:block;overflow-x:auto;width:100%}.table-responsive-sm>.table-bordered{border:0}}@media (max-width:767.98px){.table-responsive-md{-webkit-overflow-scrolling:touch;-ms-overflow-style:-ms-autohiding-scrollbar;display:block;overflow-x:auto;width:100%}.table-responsive-md>.table-bordered{border:0}}@media (max-width:991.98px){.table-responsive-lg{-webkit-overflow-scrolling:touch;-ms-overflow-style:-ms-autohiding-scrollbar;display:block;overflow-x:auto;width:100%}.table-responsive-lg>.table-bordered{border:0}}@media (max-width:1199.98px){.table-responsive-xl{-webkit-overflow-scrolling:touch;-ms-overflow-style:-ms-autohiding-scrollbar;display:block;overflow-x:auto;width:100%}.table-responsive-xl>.table-bordered{border:0}}.table-responsive{-webkit-overflow-scrolling:touch;-ms-overflow-style:-ms-autohiding-scrollbar;display:block;overflow-x:auto;width:100%}.table-responsive>.table-bordered{border:0}.form-control{background-clip:padding-box;background-color:#fff;border-radius:.25rem;color:#374151;display:block;font-size:.813rem;height:calc(1.9695rem + 2px);line-height:1.5;padding:.375rem .75rem;transition:border-color .15s ease-in-out,box-shadow .15s ease-in-out;width:100%}@media screen and (prefers-reduced-motion:reduce){.form-control{transition:none}}.form-control::-ms-expand{background-color:transparent;border:0}.form-control:focus{background-color:#fff;border-color:#ffb68f;box-shadow:0 0 0 .2rem rgba(255,99,15,.25);color:#374151;outline:0}.form-control::-moz-placeholder{color:#4b5563;opacity:1}.form-control::placeholder{color:#4b5563;opacity:1}.form-control:disabled,.form-control[readonly]{background-color:#e5e7eb;opacity:1}select.form-control:focus::-ms-value{background-color:#fff;color:#374151}.form-control-file,.form-control-range{display:block;width:100%}.col-form-label{font-size:inherit;line-height:1.5;margin-bottom:0;padding-bottom:calc(.375rem + 1px);padding-top:calc(.375rem + 1px)}.col-form-label-lg{font-size:1.01625rem;line-height:1.5;padding-bottom:calc(.5rem + 1px);padding-top:calc(.5rem + 1px)}.col-form-label-sm{font-size:.711375rem;line-height:1.5;padding-bottom:calc(.25rem + 1px);padding-top:calc(.25rem + 1px)}.form-control-plaintext{background-color:transparent;border:solid transparent;border-width:1px 0;color:#111827;display:block;line-height:1.5;margin-bottom:0;padding-bottom:.375rem;padding-top:.375rem;width:100%}.form-control-plaintext.form-control-lg,.form-control-plaintext.form-control-sm{padding-left:0;padding-right:0}.form-control-sm{border-radius:.2rem;font-size:.711375rem;height:calc(1.56706rem + 2px);line-height:1.5;padding:.25rem .5rem}.form-control-lg{border-radius:.3rem;font-size:1.01625rem;height:calc(2.52438rem + 2px);line-height:1.5;padding:.5rem 1rem}select.form-control[multiple],select.form-control[size],textarea.form-control{height:auto}.form-group{margin-bottom:1rem}.form-text{display:block;margin-top:.25rem}.form-row{display:flex;flex-wrap:wrap;margin-left:-5px;margin-right:-5px}.form-row>.col,.form-row>[class*=col-]{padding-left:5px;padding-right:5px}.form-check{display:block;padding-left:1.25rem;position:relative}.form-check-input{margin-left:-1.25rem;margin-top:.3rem;position:absolute}.form-check-input:disabled~.form-check-label{color:#4b5563}.form-check-label{margin-bottom:0}.form-check-inline{align-items:center;display:inline-flex;margin-right:.75rem;padding-left:0}.form-check-inline .form-check-input{margin-left:0;margin-right:.3125rem;margin-top:0;position:static}.valid-feedback{color:#10b981;display:none;font-size:80%;margin-top:.25rem;width:100%}.valid-tooltip{background-color:rgba(16,185,129,.9);border-radius:.25rem;color:#fff;display:none;font-size:.711375rem;line-height:1.5;margin-top:.1rem;max-width:100%;padding:.25rem .5rem;position:absolute;top:100%;z-index:5}.custom-select.is-valid,.form-control.is-valid,.was-validated
.custom-select:valid,.was-validated .form-control:valid{border-color:#10b981}.custom-select.is-valid:focus,.form-control.is-valid:focus,.was-validated
.custom-select:valid:focus,.was-validated .form-control:valid:focus{border-color:#10b981;box-shadow:0 0 0 .2rem rgba(16,185,129,.25)}.custom-select.is-valid~.valid-feedback,.custom-select.is-valid~.valid-tooltip,.form-control.is-valid~.valid-feedback,.form-control.is-valid~.valid-tooltip,.was-validated
.custom-select:valid~.valid-feedback,.was-validated
.custom-select:valid~.valid-tooltip,.was-validated .form-control:valid~.valid-feedback,.was-validated .form-control:valid~.valid-tooltip{display:block}.form-control-file.is-valid~.valid-feedback,.form-control-file.is-valid~.valid-tooltip,.was-validated .form-control-file:valid~.valid-feedback,.was-validated .form-control-file:valid~.valid-tooltip{display:block}.form-check-input.is-valid~.form-check-label,.was-validated .form-check-input:valid~.form-check-label{color:#10b981}.form-check-input.is-valid~.valid-feedback,.form-check-input.is-valid~.valid-tooltip,.was-validated .form-check-input:valid~.valid-feedback,.was-validated .form-check-input:valid~.valid-tooltip{display:block}.custom-control-input.is-valid~.custom-control-label,.was-validated .custom-control-input:valid~.custom-control-label{color:#10b981}.custom-control-input.is-valid~.custom-control-label:before,.was-validated .custom-control-input:valid~.custom-control-label:before{background-color:#58f1be}.custom-control-input.is-valid~.valid-feedback,.custom-control-input.is-valid~.valid-tooltip,.was-validated .custom-control-input:valid~.valid-feedback,.was-validated .custom-control-input:valid~.valid-tooltip{display:block}.custom-control-input.is-valid:checked~.custom-control-label:before,.was-validated .custom-control-input:valid:checked~.custom-control-label:before{background-color:#14e8a2}.custom-control-input.is-valid:focus~.custom-control-label:before,.was-validated .custom-control-input:valid:focus~.custom-control-label:before{box-shadow:0 0 0 1px #fff,0 0 0 .2rem rgba(16,185,129,.25)}.custom-file-input.is-valid~.custom-file-label,.was-validated .custom-file-input:valid~.custom-file-label{border-color:#10b981}.custom-file-input.is-valid~.custom-file-label:after,.was-validated .custom-file-input:valid~.custom-file-label:after{border-color:inherit}.custom-file-input.is-valid~.valid-feedback,.custom-file-input.is-valid~.valid-tooltip,.was-validated .custom-file-input:valid~.valid-feedback,.was-validated .custom-file-input:valid~.valid-tooltip{display:block}.custom-file-input.is-valid:focus~.custom-file-label,.was-validated .custom-file-input:valid:focus~.custom-file-label{box-shadow:0 0 0 .2rem rgba(16,185,129,.25)}.invalid-feedback{color:#ef4444;display:none;font-size:80%;margin-top:.25rem;width:100%}.invalid-tooltip{background-color:rgba(239,68,68,.9);border-radius:.25rem;color:#fff;display:none;font-size:.711375rem;line-height:1.5;margin-top:.1rem;max-width:100%;padding:.25rem .5rem;position:absolute;top:100%;z-index:5}.custom-select.is-invalid,.form-control.is-invalid,.was-validated
.custom-select:invalid,.was-validated .form-control:invalid{border-color:#ef4444}.custom-select.is-invalid:focus,.form-control.is-invalid:focus,.was-validated
.custom-select:invalid:focus,.was-validated .form-control:invalid:focus{border-color:#ef4444;box-shadow:0 0 0 .2rem rgba(239,68,68,.25)}.custom-select.is-invalid~.invalid-feedback,.custom-select.is-invalid~.invalid-tooltip,.form-control.is-invalid~.invalid-feedback,.form-control.is-invalid~.invalid-tooltip,.was-validated
.custom-select:invalid~.invalid-feedback,.was-validated
.custom-select:invalid~.invalid-tooltip,.was-validated .form-control:invalid~.invalid-feedback,.was-validated .form-control:invalid~.invalid-tooltip{display:block}.form-control-file.is-invalid~.invalid-feedback,.form-control-file.is-invalid~.invalid-tooltip,.was-validated .form-control-file:invalid~.invalid-feedback,.was-validated .form-control-file:invalid~.invalid-tooltip{display:block}.form-check-input.is-invalid~.form-check-label,.was-validated .form-check-input:invalid~.form-check-label{color:#ef4444}.form-check-input.is-invalid~.invalid-feedback,.form-check-input.is-invalid~.invalid-tooltip,.was-validated .form-check-input:invalid~.invalid-feedback,.was-validated .form-check-input:invalid~.invalid-tooltip{display:block}.custom-control-input.is-invalid~.custom-control-label,.was-validated .custom-control-input:invalid~.custom-control-label{color:#ef4444}.custom-control-input.is-invalid~.custom-control-label:before,.was-validated .custom-control-input:invalid~.custom-control-label:before{background-color:#f9b9b9}.custom-control-input.is-invalid~.invalid-feedback,.custom-control-input.is-invalid~.invalid-tooltip,.was-validated .custom-control-input:invalid~.invalid-feedback,.was-validated .custom-control-input:invalid~.invalid-tooltip{display:block}.custom-control-input.is-invalid:checked~.custom-control-label:before,.was-validated .custom-control-input:invalid:checked~.custom-control-label:before{background-color:#f37373}.custom-control-input.is-invalid:focus~.custom-control-label:before,.was-validated .custom-control-input:invalid:focus~.custom-control-label:before{box-shadow:0 0 0 1px #fff,0 0 0 .2rem rgba(239,68,68,.25)}.custom-file-input.is-invalid~.custom-file-label,.was-validated .custom-file-input:invalid~.custom-file-label{border-color:#ef4444}.custom-file-input.is-invalid~.custom-file-label:after,.was-validated .custom-file-input:invalid~.custom-file-label:after{border-color:inherit}.custom-file-input.is-invalid~.invalid-feedback,.custom-file-input.is-invalid~.invalid-tooltip,.was-validated .custom-file-input:invalid~.invalid-feedback,.was-validated .custom-file-input:invalid~.invalid-tooltip{display:block}.custom-file-input.is-invalid:focus~.custom-file-label,.was-validated .custom-file-input:invalid:focus~.custom-file-label{box-shadow:0 0 0 .2rem rgba(239,68,68,.25)}.form-inline{align-items:center;display:flex;flex-flow:row wrap}.form-inline .form-check{width:100%}@media (min-width:576px){.form-inline label{justify-content:center}.form-inline .form-group,.form-inline label{align-items:center;display:flex;margin-bottom:0}.form-inline .form-group{flex:0 0 auto;flex-flow:row wrap}.form-inline .form-control{display:inline-block;vertical-align:middle;width:auto}.form-inline .form-control-plaintext{display:inline-block}.form-inline .custom-select,.form-inline .input-group{width:auto}.form-inline .form-check{align-items:center;display:flex;justify-content:center;padding-left:0;width:auto}.form-inline .form-check-input{margin-left:0;margin-right:.25rem;margin-top:0;position:relative}.form-inline .custom-control{align-items:center;justify-content:center}.form-inline .custom-control-label{margin-bottom:0}}.btn{border:1px solid transparent;border-radius:.25rem;display:inline-block;font-size:.813rem;font-weight:400;line-height:1.5;padding:.375rem .75rem;text-align:center;transition:color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;-webkit-user-select:none;-moz-user-select:none;user-select:none;vertical-align:middle;white-space:nowrap}@media screen and (prefers-reduced-motion:reduce){.btn{transition:none}}.btn:focus,.btn:hover{text-decoration:none}.btn.focus,.btn:focus{box-shadow:0 0 0 .2rem rgba(255,99,15,.25);outline:0}.btn.disabled,.btn:disabled{opacity:.65}.btn:not(:disabled):not(.disabled){cursor:pointer}a.btn.disabled,fieldset:disabled a.btn{pointer-events:none}.btn-primary{background-color:#ff630f;border-color:#ff630f;color:#fff}.btn-primary:hover{background-color:#e85100;border-color:#db4d00;color:#fff}.btn-primary.focus,.btn-primary:focus{box-shadow:0 0 0 .2rem rgba(255,99,15,.5)}.btn-primary.disabled,.btn-primary:disabled{background-color:#ff630f;border-color:#ff630f;color:#fff}.btn-primary:not(:disabled):not(.disabled).active,.btn-primary:not(:disabled):not(.disabled):active,.show>.btn-primary.dropdown-toggle{background-color:#db4d00;border-color:#ce4800;color:#fff}.btn-primary:not(:disabled):not(.disabled).active:focus,.btn-primary:not(:disabled):not(.disabled):active:focus,.show>.btn-primary.dropdown-toggle:focus{box-shadow:0 0 0 .2rem rgba(255,99,15,.5)}.btn-secondary{background-color:#1f2937;border-color:#1f2937;color:#fff}.btn-secondary:hover{background-color:#11171f;border-color:#0d1116;color:#fff}.btn-secondary.focus,.btn-secondary:focus{box-shadow:0 0 0 .2rem rgba(31,41,55,.5)}.btn-secondary.disabled,.btn-secondary:disabled{background-color:#1f2937;border-color:#1f2937;color:#fff}.btn-secondary:not(:disabled):not(.disabled).active,.btn-secondary:not(:disabled):not(.disabled):active,.show>.btn-secondary.dropdown-toggle{background-color:#0d1116;border-color:#080b0e;color:#fff}.btn-secondary:not(:disabled):not(.disabled).active:focus,.btn-secondary:not(:disabled):not(.disabled):active:focus,.show>.btn-secondary.dropdown-toggle:focus{box-shadow:0 0 0 .2rem rgba(31,41,55,.5)}.btn-success{background-color:#10b981;border-color:#10b981;color:#fff}.btn-success:hover{background-color:#0d9668;border-color:#0c8a60;color:#fff}.btn-success.focus,.btn-success:focus{box-shadow:0 0 0 .2rem rgba(16,185,129,.5)}.btn-success.disabled,.btn-success:disabled{background-color:#10b981;border-color:#10b981;color:#fff}.btn-success:not(:disabled):not(.disabled).active,.btn-success:not(:disabled):not(.disabled):active,.show>.btn-success.dropdown-toggle{background-color:#0c8a60;border-color:#0b7e58;color:#fff}.btn-success:not(:disabled):not(.disabled).active:focus,.btn-success:not(:disabled):not(.disabled):active:focus,.show>.btn-success.dropdown-toggle:focus{box-shadow:0 0 0 .2rem rgba(16,185,129,.5)}.btn-info{background-color:#3b82f6;border-color:#3b82f6;color:#fff}.btn-info:hover{background-color:#166bf4;border-color:#0b63f3;color:#fff}.btn-info.focus,.btn-info:focus{box-shadow:0 0 0 .2rem rgba(59,130,246,.5)}.btn-info.disabled,.btn-info:disabled{background-color:#3b82f6;border-color:#3b82f6;color:#fff}.btn-info:not(:disabled):not(.disabled).active,.btn-info:not(:disabled):not(.disabled):active,.show>.btn-info.dropdown-toggle{background-color:#0b63f3;border-color:#0b5ee7;color:#fff}.btn-info:not(:disabled):not(.disabled).active:focus,.btn-info:not(:disabled):not(.disabled):active:focus,.show>.btn-info.dropdown-toggle:focus{box-shadow:0 0 0 .2rem rgba(59,130,246,.5)}.btn-warning{background-color:#f59e0b;border-color:#f59e0b;color:#111827}.btn-warning:hover{background-color:#d18709;border-color:#c57f08;color:#fff}.btn-warning.focus,.btn-warning:focus{box-shadow:0 0 0 .2rem rgba(245,158,11,.5)}.btn-warning.disabled,.btn-warning:disabled{background-color:#f59e0b;border-color:#f59e0b;color:#111827}.btn-warning:not(:disabled):not(.disabled).active,.btn-warning:not(:disabled):not(.disabled):active,.show>.btn-warning.dropdown-toggle{background-color:#c57f08;border-color:#b97708;color:#fff}.btn-warning:not(:disabled):not(.disabled).active:focus,.btn-warning:not(:disabled):not(.disabled):active:focus,.show>.btn-warning.dropdown-toggle:focus{box-shadow:0 0 0 .2rem rgba(245,158,11,.5)}.btn-danger{background-color:#ef4444;border-color:#ef4444;color:#fff}.btn-danger:hover{background-color:#ec2121;border-color:#eb1515;color:#fff}.btn-danger.focus,.btn-danger:focus{box-shadow:0 0 0 .2rem rgba(239,68,68,.5)}.btn-danger.disabled,.btn-danger:disabled{background-color:#ef4444;border-color:#ef4444;color:#fff}.btn-danger:not(:disabled):not(.disabled).active,.btn-danger:not(:disabled):not(.disabled):active,.show>.btn-danger.dropdown-toggle{background-color:#eb1515;border-color:#e01313;color:#fff}.btn-danger:not(:disabled):not(.disabled).active:focus,.btn-danger:not(:disabled):not(.disabled):active:focus,.show>.btn-danger.dropdown-toggle:focus{box-shadow:0 0 0 .2rem rgba(239,68,68,.5)}.btn-light{background-color:#6b7280;border-color:#6b7280;color:#fff}.btn-light:hover{background-color:#5a5f6b;border-color:#545964;color:#fff}.btn-light.focus,.btn-light:focus{box-shadow:0 0 0 .2rem hsla(220,9%,46%,.5)}.btn-light.disabled,.btn-light:disabled{background-color:#6b7280;border-color:#6b7280;color:#fff}.btn-light:not(:disabled):not(.disabled).active,.btn-light:not(:disabled):not(.disabled):active,.show>.btn-light.dropdown-toggle{background-color:#545964;border-color:#4e535d;color:#fff}.btn-light:not(:disabled):not(.disabled).active:focus,.btn-light:not(:disabled):not(.disabled):active:focus,.show>.btn-light.dropdown-toggle:focus{box-shadow:0 0 0 .2rem hsla(220,9%,46%,.5)}.btn-dark{background-color:#111827;border-color:#111827;color:#fff}.btn-dark:hover{background-color:#05080c;border-color:#020203;color:#fff}.btn-dark.focus,.btn-dark:focus{box-shadow:0 0 0 .2rem rgba(17,24,39,.5)}.btn-dark.disabled,.btn-dark:disabled{background-color:#111827;border-color:#111827;color:#fff}.btn-dark:not(:disabled):not(.disabled).active,.btn-dark:not(:disabled):not(.disabled):active,.show>.btn-dark.dropdown-toggle{background-color:#020203;border-color:#000;color:#fff}.btn-dark:not(:disabled):not(.disabled).active:focus,.btn-dark:not(:disabled):not(.disabled):active:focus,.show>.btn-dark.dropdown-toggle:focus{box-shadow:0 0 0 .2rem rgba(17,24,39,.5)}.btn-gray-100{background-color:#f3f4f6;border-color:#f3f4f6;color:#111827}.btn-gray-100:hover{background-color:#dde0e6;border-color:#d6d9e0;color:#111827}.btn-gray-100.focus,.btn-gray-100:focus{box-shadow:0 0 0 .2rem rgba(243,244,246,.5)}.btn-gray-100.disabled,.btn-gray-100:disabled{background-color:#f3f4f6;border-color:#f3f4f6;color:#111827}.btn-gray-100:not(:disabled):not(.disabled).active,.btn-gray-100:not(:disabled):not(.disabled):active,.show>.btn-gray-100.dropdown-toggle{background-color:#d6d9e0;border-color:#cfd3db;color:#111827}.btn-gray-100:not(:disabled):not(.disabled).active:focus,.btn-gray-100:not(:disabled):not(.disabled):active:focus,.show>.btn-gray-100.dropdown-toggle:focus{box-shadow:0 0 0 .2rem rgba(243,244,246,.5)}.btn-gray-200{background-color:#e5e7eb;border-color:#e5e7eb;color:#111827}.btn-gray-200:hover{background-color:#cfd3da;border-color:#c8ccd5;color:#111827}.btn-gray-200.focus,.btn-gray-200:focus{box-shadow:0 0 0 .2rem rgba(229,231,235,.5)}.btn-gray-200.disabled,.btn-gray-200:disabled{background-color:#e5e7eb;border-color:#e5e7eb;color:#111827}.btn-gray-200:not(:disabled):not(.disabled).active,.btn-gray-200:not(:disabled):not(.disabled):active,.show>.btn-gray-200.dropdown-toggle{background-color:#c8ccd5;border-color:#c1c6cf;color:#111827}.btn-gray-200:not(:disabled):not(.disabled).active:focus,.btn-gray-200:not(:disabled):not(.disabled):active:focus,.show>.btn-gray-200.dropdown-toggle:focus{box-shadow:0 0 0 .2rem rgba(229,231,235,.5)}.btn-gray-300{background-color:#d1d5db;border-color:#d1d5db;color:#111827}.btn-gray-300:hover{background-color:#bcc1ca;border-color:#b4bbc5;color:#111827}.btn-gray-300.focus,.btn-gray-300:focus{box-shadow:0 0 0 .2rem rgba(209,213,219,.5)}.btn-gray-300.disabled,.btn-gray-300:disabled{background-color:#d1d5db;border-color:#d1d5db;color:#111827}.btn-gray-300:not(:disabled):not(.disabled).active,.btn-gray-300:not(:disabled):not(.disabled):active,.show>.btn-gray-300.dropdown-toggle{background-color:#b4bbc5;border-color:#adb4bf;color:#111827}.btn-gray-300:not(:disabled):not(.disabled).active:focus,.btn-gray-300:not(:disabled):not(.disabled):active:focus,.show>.btn-gray-300.dropdown-toggle:focus{box-shadow:0 0 0 .2rem rgba(209,213,219,.5)}.btn-gray-400{background-color:#9ca3af;border-color:#9ca3af;color:#111827}.btn-gray-400:hover{background-color:#878f9e;border-color:#808998;color:#fff}.btn-gray-400.focus,.btn-gray-400:focus{box-shadow:0 0 0 .2rem rgba(156,163,175,.5)}.btn-gray-400.disabled,.btn-gray-400:disabled{background-color:#9ca3af;border-color:#9ca3af;color:#111827}.btn-gray-400:not(:disabled):not(.disabled).active,.btn-gray-400:not(:disabled):not(.disabled):active,.show>.btn-gray-400.dropdown-toggle{background-color:#808998;border-color:#798293;color:#fff}.btn-gray-400:not(:disabled):not(.disabled).active:focus,.btn-gray-400:not(:disabled):not(.disabled):active:focus,.show>.btn-gray-400.dropdown-toggle:focus{box-shadow:0 0 0 .2rem rgba(156,163,175,.5)}.btn-gray-500{background-color:#6b7280;border-color:#6b7280;color:#fff}.btn-gray-500:hover{background-color:#5a5f6b;border-color:#545964;color:#fff}.btn-gray-500.focus,.btn-gray-500:focus{box-shadow:0 0 0 .2rem hsla(220,9%,46%,.5)}.btn-gray-500.disabled,.btn-gray-500:disabled{background-color:#6b7280;border-color:#6b7280;color:#fff}.btn-gray-500:not(:disabled):not(.disabled).active,.btn-gray-500:not(:disabled):not(.disabled):active,.show>.btn-gray-500.dropdown-toggle{background-color:#545964;border-color:#4e535d;color:#fff}.btn-gray-500:not(:disabled):not(.disabled).active:focus,.btn-gray-500:not(:disabled):not(.disabled):active:focus,.show>.btn-gray-500.dropdown-toggle:focus{box-shadow:0 0 0 .2rem hsla(220,9%,46%,.5)}.btn-gray-600{background-color:#4b5563;border-color:#4b5563;color:#fff}.btn-gray-600:hover{background-color:#3b424d;border-color:#353c46;color:#fff}.btn-gray-600.focus,.btn-gray-600:focus{box-shadow:0 0 0 .2rem rgba(75,85,99,.5)}.btn-gray-600.disabled,.btn-gray-600:disabled{background-color:#4b5563;border-color:#4b5563;color:#fff}.btn-gray-600:not(:disabled):not(.disabled).active,.btn-gray-600:not(:disabled):not(.disabled):active,.show>.btn-gray-600.dropdown-toggle{background-color:#353c46;border-color:#30363f;color:#fff}.btn-gray-600:not(:disabled):not(.disabled).active:focus,.btn-gray-600:not(:disabled):not(.disabled):active:focus,.show>.btn-gray-600.dropdown-toggle:focus{box-shadow:0 0 0 .2rem rgba(75,85,99,.5)}.btn-gray-700{background-color:#374151;border-color:#374151;color:#fff}.btn-gray-700:hover{background-color:#282f3a;border-color:#222933;color:#fff}.btn-gray-700.focus,.btn-gray-700:focus{box-shadow:0 0 0 .2rem rgba(55,65,81,.5)}.btn-gray-700.disabled,.btn-gray-700:disabled{background-color:#374151;border-color:#374151;color:#fff}.btn-gray-700:not(:disabled):not(.disabled).active,.btn-gray-700:not(:disabled):not(.disabled):active,.show>.btn-gray-700.dropdown-toggle{background-color:#222933;border-color:#1d232b;color:#fff}.btn-gray-700:not(:disabled):not(.disabled).active:focus,.btn-gray-700:not(:disabled):not(.disabled):active:focus,.show>.btn-gray-700.dropdown-toggle:focus{box-shadow:0 0 0 .2rem rgba(55,65,81,.5)}.btn-gray-800{background-color:#1f2937;border-color:#1f2937;color:#fff}.btn-gray-800:hover{background-color:#11171f;border-color:#0d1116;color:#fff}.btn-gray-800.focus,.btn-gray-800:focus{box-shadow:0 0 0 .2rem rgba(31,41,55,.5)}.btn-gray-800.disabled,.btn-gray-800:disabled{background-color:#1f2937;border-color:#1f2937;color:#fff}.btn-gray-800:not(:disabled):not(.disabled).active,.btn-gray-800:not(:disabled):not(.disabled):active,.show>.btn-gray-800.dropdown-toggle{background-color:#0d1116;border-color:#080b0e;color:#fff}.btn-gray-800:not(:disabled):not(.disabled).active:focus,.btn-gray-800:not(:disabled):not(.disabled):active:focus,.show>.btn-gray-800.dropdown-toggle:focus{box-shadow:0 0 0 .2rem rgba(31,41,55,.5)}.btn-gray-900{background-color:#111827;border-color:#111827;color:#fff}.btn-gray-900:hover{background-color:#05080c;border-color:#020203;color:#fff}.btn-gray-900.focus,.btn-gray-900:focus{box-shadow:0 0 0 .2rem rgba(17,24,39,.5)}.btn-gray-900.disabled,.btn-gray-900:disabled{background-color:#111827;border-color:#111827;color:#fff}.btn-gray-900:not(:disabled):not(.disabled).active,.btn-gray-900:not(:disabled):not(.disabled):active,.show>.btn-gray-900.dropdown-toggle{background-color:#020203;border-color:#000;color:#fff}.btn-gray-900:not(:disabled):not(.disabled).active:focus,.btn-gray-900:not(:disabled):not(.disabled):active:focus,.show>.btn-gray-900.dropdown-toggle:focus{box-shadow:0 0 0 .2rem rgba(17,24,39,.5)}.btn-outline-primary{background-color:transparent;background-image:none;border-color:#ff630f;color:#ff630f}.btn-outline-primary:hover{background-color:#ff630f;border-color:#ff630f;color:#fff}.btn-outline-primary.focus,.btn-outline-primary:focus{box-shadow:0 0 0 .2rem rgba(255,99,15,.5)}.btn-outline-primary.disabled,.btn-outline-primary:disabled{background-color:transparent;color:#ff630f}.btn-outline-primary:not(:disabled):not(.disabled).active,.btn-outline-primary:not(:disabled):not(.disabled):active,.show>.btn-outline-primary.dropdown-toggle{background-color:#ff630f;border-color:#ff630f;color:#fff}.btn-outline-primary:not(:disabled):not(.disabled).active:focus,.btn-outline-primary:not(:disabled):not(.disabled):active:focus,.show>.btn-outline-primary.dropdown-toggle:focus{box-shadow:0 0 0 .2rem rgba(255,99,15,.5)}.btn-outline-secondary{background-color:transparent;background-image:none;border-color:#1f2937;color:#1f2937}.btn-outline-secondary:hover{background-color:#1f2937;border-color:#1f2937;color:#fff}.btn-outline-secondary.focus,.btn-outline-secondary:focus{box-shadow:0 0 0 .2rem rgba(31,41,55,.5)}.btn-outline-secondary.disabled,.btn-outline-secondary:disabled{background-color:transparent;color:#1f2937}.btn-outline-secondary:not(:disabled):not(.disabled).active,.btn-outline-secondary:not(:disabled):not(.disabled):active,.show>.btn-outline-secondary.dropdown-toggle{background-color:#1f2937;border-color:#1f2937;color:#fff}.btn-outline-secondary:not(:disabled):not(.disabled).active:focus,.btn-outline-secondary:not(:disabled):not(.disabled):active:focus,.show>.btn-outline-secondary.dropdown-toggle:focus{box-shadow:0 0 0 .2rem rgba(31,41,55,.5)}.btn-outline-success{background-color:transparent;background-image:none;border-color:#10b981;color:#10b981}.btn-outline-success:hover{background-color:#10b981;border-color:#10b981;color:#fff}.btn-outline-success.focus,.btn-outline-success:focus{box-shadow:0 0 0 .2rem rgba(16,185,129,.5)}.btn-outline-success.disabled,.btn-outline-success:disabled{background-color:transparent;color:#10b981}.btn-outline-success:not(:disabled):not(.disabled).active,.btn-outline-success:not(:disabled):not(.disabled):active,.show>.btn-outline-success.dropdown-toggle{background-color:#10b981;border-color:#10b981;color:#fff}.btn-outline-success:not(:disabled):not(.disabled).active:focus,.btn-outline-success:not(:disabled):not(.disabled):active:focus,.show>.btn-outline-success.dropdown-toggle:focus{box-shadow:0 0 0 .2rem rgba(16,185,129,.5)}.btn-outline-info{background-color:transparent;background-image:none;border-color:#3b82f6;color:#3b82f6}.btn-outline-info:hover{background-color:#3b82f6;border-color:#3b82f6;color:#fff}.btn-outline-info.focus,.btn-outline-info:focus{box-shadow:0 0 0 .2rem rgba(59,130,246,.5)}.btn-outline-info.disabled,.btn-outline-info:disabled{background-color:transparent;color:#3b82f6}.btn-outline-info:not(:disabled):not(.disabled).active,.btn-outline-info:not(:disabled):not(.disabled):active,.show>.btn-outline-info.dropdown-toggle{background-color:#3b82f6;border-color:#3b82f6;color:#fff}.btn-outline-info:not(:disabled):not(.disabled).active:focus,.btn-outline-info:not(:disabled):not(.disabled):active:focus,.show>.btn-outline-info.dropdown-toggle:focus{box-shadow:0 0 0 .2rem rgba(59,130,246,.5)}.btn-outline-warning{background-color:transparent;background-image:none;border-color:#f59e0b;color:#f59e0b}.btn-outline-warning:hover{background-color:#f59e0b;border-color:#f59e0b;color:#111827}.btn-outline-warning.focus,.btn-outline-warning:focus{box-shadow:0 0 0 .2rem rgba(245,158,11,.5)}.btn-outline-warning.disabled,.btn-outline-warning:disabled{background-color:transparent;color:#f59e0b}.btn-outline-warning:not(:disabled):not(.disabled).active,.btn-outline-warning:not(:disabled):not(.disabled):active,.show>.btn-outline-warning.dropdown-toggle{background-color:#f59e0b;border-color:#f59e0b;color:#111827}.btn-outline-warning:not(:disabled):not(.disabled).active:focus,.btn-outline-warning:not(:disabled):not(.disabled):active:focus,.show>.btn-outline-warning.dropdown-toggle:focus{box-shadow:0 0 0 .2rem rgba(245,158,11,.5)}.btn-outline-danger{background-color:transparent;background-image:none;border-color:#ef4444;color:#ef4444}.btn-outline-danger:hover{background-color:#ef4444;border-color:#ef4444;color:#fff}.btn-outline-danger.focus,.btn-outline-danger:focus{box-shadow:0 0 0 .2rem rgba(239,68,68,.5)}.btn-outline-danger.disabled,.btn-outline-danger:disabled{background-color:transparent;color:#ef4444}.btn-outline-danger:not(:disabled):not(.disabled).active,.btn-outline-danger:not(:disabled):not(.disabled):active,.show>.btn-outline-danger.dropdown-toggle{background-color:#ef4444;border-color:#ef4444;color:#fff}.btn-outline-danger:not(:disabled):not(.disabled).active:focus,.btn-outline-danger:not(:disabled):not(.disabled):active:focus,.show>.btn-outline-danger.dropdown-toggle:focus{box-shadow:0 0 0 .2rem rgba(239,68,68,.5)}.btn-outline-light{background-color:transparent;background-image:none;border-color:#6b7280;color:#6b7280}.btn-outline-light:hover{background-color:#6b7280;border-color:#6b7280;color:#fff}.btn-outline-light.focus,.btn-outline-light:focus{box-shadow:0 0 0 .2rem hsla(220,9%,46%,.5)}.btn-outline-light.disabled,.btn-outline-light:disabled{background-color:transparent;color:#6b7280}.btn-outline-light:not(:disabled):not(.disabled).active,.btn-outline-light:not(:disabled):not(.disabled):active,.show>.btn-outline-light.dropdown-toggle{background-color:#6b7280;border-color:#6b7280;color:#fff}.btn-outline-light:not(:disabled):not(.disabled).active:focus,.btn-outline-light:not(:disabled):not(.disabled):active:focus,.show>.btn-outline-light.dropdown-toggle:focus{box-shadow:0 0 0 .2rem hsla(220,9%,46%,.5)}.btn-outline-dark{background-color:transparent;background-image:none;border-color:#111827;color:#111827}.btn-outline-dark:hover{background-color:#111827;border-color:#111827;color:#fff}.btn-outline-dark.focus,.btn-outline-dark:focus{box-shadow:0 0 0 .2rem rgba(17,24,39,.5)}.btn-outline-dark.disabled,.btn-outline-dark:disabled{background-color:transparent;color:#111827}.btn-outline-dark:not(:disabled):not(.disabled).active,.btn-outline-dark:not(:disabled):not(.disabled):active,.show>.btn-outline-dark.dropdown-toggle{background-color:#111827;border-color:#111827;color:#fff}.btn-outline-dark:not(:disabled):not(.disabled).active:focus,.btn-outline-dark:not(:disabled):not(.disabled):active:focus,.show>.btn-outline-dark.dropdown-toggle:focus{box-shadow:0 0 0 .2rem rgba(17,24,39,.5)}.btn-outline-gray-100{background-color:transparent;background-image:none;border-color:#f3f4f6;color:#f3f4f6}.btn-outline-gray-100:hover{background-color:#f3f4f6;border-color:#f3f4f6;color:#111827}.btn-outline-gray-100.focus,.btn-outline-gray-100:focus{box-shadow:0 0 0 .2rem rgba(243,244,246,.5)}.btn-outline-gray-100.disabled,.btn-outline-gray-100:disabled{background-color:transparent;color:#f3f4f6}.btn-outline-gray-100:not(:disabled):not(.disabled).active,.btn-outline-gray-100:not(:disabled):not(.disabled):active,.show>.btn-outline-gray-100.dropdown-toggle{background-color:#f3f4f6;border-color:#f3f4f6;color:#111827}.btn-outline-gray-100:not(:disabled):not(.disabled).active:focus,.btn-outline-gray-100:not(:disabled):not(.disabled):active:focus,.show>.btn-outline-gray-100.dropdown-toggle:focus{box-shadow:0 0 0 .2rem rgba(243,244,246,.5)}.btn-outline-gray-200{background-color:transparent;background-image:none;border-color:#e5e7eb;color:#e5e7eb}.btn-outline-gray-200:hover{background-color:#e5e7eb;border-color:#e5e7eb;color:#111827}.btn-outline-gray-200.focus,.btn-outline-gray-200:focus{box-shadow:0 0 0 .2rem rgba(229,231,235,.5)}.btn-outline-gray-200.disabled,.btn-outline-gray-200:disabled{background-color:transparent;color:#e5e7eb}.btn-outline-gray-200:not(:disabled):not(.disabled).active,.btn-outline-gray-200:not(:disabled):not(.disabled):active,.show>.btn-outline-gray-200.dropdown-toggle{background-color:#e5e7eb;border-color:#e5e7eb;color:#111827}.btn-outline-gray-200:not(:disabled):not(.disabled).active:focus,.btn-outline-gray-200:not(:disabled):not(.disabled):active:focus,.show>.btn-outline-gray-200.dropdown-toggle:focus{box-shadow:0 0 0 .2rem rgba(229,231,235,.5)}.btn-outline-gray-300{background-color:transparent;background-image:none;border-color:#d1d5db;color:#d1d5db}.btn-outline-gray-300:hover{background-color:#d1d5db;border-color:#d1d5db;color:#111827}.btn-outline-gray-300.focus,.btn-outline-gray-300:focus{box-shadow:0 0 0 .2rem rgba(209,213,219,.5)}.btn-outline-gray-300.disabled,.btn-outline-gray-300:disabled{background-color:transparent;color:#d1d5db}.btn-outline-gray-300:not(:disabled):not(.disabled).active,.btn-outline-gray-300:not(:disabled):not(.disabled):active,.show>.btn-outline-gray-300.dropdown-toggle{background-color:#d1d5db;border-color:#d1d5db;color:#111827}.btn-outline-gray-300:not(:disabled):not(.disabled).active:focus,.btn-outline-gray-300:not(:disabled):not(.disabled):active:focus,.show>.btn-outline-gray-300.dropdown-toggle:focus{box-shadow:0 0 0 .2rem rgba(209,213,219,.5)}.btn-outline-gray-400{background-color:transparent;background-image:none;border-color:#9ca3af;color:#9ca3af}.btn-outline-gray-400:hover{background-color:#9ca3af;border-color:#9ca3af;color:#111827}.btn-outline-gray-400.focus,.btn-outline-gray-400:focus{box-shadow:0 0 0 .2rem rgba(156,163,175,.5)}.btn-outline-gray-400.disabled,.btn-outline-gray-400:disabled{background-color:transparent;color:#9ca3af}.btn-outline-gray-400:not(:disabled):not(.disabled).active,.btn-outline-gray-400:not(:disabled):not(.disabled):active,.show>.btn-outline-gray-400.dropdown-toggle{background-color:#9ca3af;border-color:#9ca3af;color:#111827}.btn-outline-gray-400:not(:disabled):not(.disabled).active:focus,.btn-outline-gray-400:not(:disabled):not(.disabled):active:focus,.show>.btn-outline-gray-400.dropdown-toggle:focus{box-shadow:0 0 0 .2rem rgba(156,163,175,.5)}.btn-outline-gray-500{background-color:transparent;background-image:none;border-color:#6b7280;color:#6b7280}.btn-outline-gray-500:hover{background-color:#6b7280;border-color:#6b7280;color:#fff}.btn-outline-gray-500.focus,.btn-outline-gray-500:focus{box-shadow:0 0 0 .2rem hsla(220,9%,46%,.5)}.btn-outline-gray-500.disabled,.btn-outline-gray-500:disabled{background-color:transparent;color:#6b7280}.btn-outline-gray-500:not(:disabled):not(.disabled).active,.btn-outline-gray-500:not(:disabled):not(.disabled):active,.show>.btn-outline-gray-500.dropdown-toggle{background-color:#6b7280;border-color:#6b7280;color:#fff}.btn-outline-gray-500:not(:disabled):not(.disabled).active:focus,.btn-outline-gray-500:not(:disabled):not(.disabled):active:focus,.show>.btn-outline-gray-500.dropdown-toggle:focus{box-shadow:0 0 0 .2rem hsla(220,9%,46%,.5)}.btn-outline-gray-600{background-color:transparent;background-image:none;border-color:#4b5563;color:#4b5563}.btn-outline-gray-600:hover{background-color:#4b5563;border-color:#4b5563;color:#fff}.btn-outline-gray-600.focus,.btn-outline-gray-600:focus{box-shadow:0 0 0 .2rem rgba(75,85,99,.5)}.btn-outline-gray-600.disabled,.btn-outline-gray-600:disabled{background-color:transparent;color:#4b5563}.btn-outline-gray-600:not(:disabled):not(.disabled).active,.btn-outline-gray-600:not(:disabled):not(.disabled):active,.show>.btn-outline-gray-600.dropdown-toggle{background-color:#4b5563;border-color:#4b5563;color:#fff}.btn-outline-gray-600:not(:disabled):not(.disabled).active:focus,.btn-outline-gray-600:not(:disabled):not(.disabled):active:focus,.show>.btn-outline-gray-600.dropdown-toggle:focus{box-shadow:0 0 0 .2rem rgba(75,85,99,.5)}.btn-outline-gray-700{background-color:transparent;background-image:none;border-color:#374151;color:#374151}.btn-outline-gray-700:hover{background-color:#374151;border-color:#374151;color:#fff}.btn-outline-gray-700.focus,.btn-outline-gray-700:focus{box-shadow:0 0 0 .2rem rgba(55,65,81,.5)}.btn-outline-gray-700.disabled,.btn-outline-gray-700:disabled{background-color:transparent;color:#374151}.btn-outline-gray-700:not(:disabled):not(.disabled).active,.btn-outline-gray-700:not(:disabled):not(.disabled):active,.show>.btn-outline-gray-700.dropdown-toggle{background-color:#374151;border-color:#374151;color:#fff}.btn-outline-gray-700:not(:disabled):not(.disabled).active:focus,.btn-outline-gray-700:not(:disabled):not(.disabled):active:focus,.show>.btn-outline-gray-700.dropdown-toggle:focus{box-shadow:0 0 0 .2rem rgba(55,65,81,.5)}.btn-outline-gray-800{background-color:transparent;background-image:none;border-color:#1f2937;color:#1f2937}.btn-outline-gray-800:hover{background-color:#1f2937;border-color:#1f2937;color:#fff}.btn-outline-gray-800.focus,.btn-outline-gray-800:focus{box-shadow:0 0 0 .2rem rgba(31,41,55,.5)}.btn-outline-gray-800.disabled,.btn-outline-gray-800:disabled{background-color:transparent;color:#1f2937}.btn-outline-gray-800:not(:disabled):not(.disabled).active,.btn-outline-gray-800:not(:disabled):not(.disabled):active,.show>.btn-outline-gray-800.dropdown-toggle{background-color:#1f2937;border-color:#1f2937;color:#fff}.btn-outline-gray-800:not(:disabled):not(.disabled).active:focus,.btn-outline-gray-800:not(:disabled):not(.disabled):active:focus,.show>.btn-outline-gray-800.dropdown-toggle:focus{box-shadow:0 0 0 .2rem rgba(31,41,55,.5)}.btn-outline-gray-900{background-color:transparent;background-image:none;border-color:#111827;color:#111827}.btn-outline-gray-900:hover{background-color:#111827;border-color:#111827;color:#fff}.btn-outline-gray-900.focus,.btn-outline-gray-900:focus{box-shadow:0 0 0 .2rem rgba(17,24,39,.5)}.btn-outline-gray-900.disabled,.btn-outline-gray-900:disabled{background-color:transparent;color:#111827}.btn-outline-gray-900:not(:disabled):not(.disabled).active,.btn-outline-gray-900:not(:disabled):not(.disabled):active,.show>.btn-outline-gray-900.dropdown-toggle{background-color:#111827;border-color:#111827;color:#fff}.btn-outline-gray-900:not(:disabled):not(.disabled).active:focus,.btn-outline-gray-900:not(:disabled):not(.disabled):active:focus,.show>.btn-outline-gray-900.dropdown-toggle:focus{box-shadow:0 0 0 .2rem rgba(17,24,39,.5)}.btn-link{background-color:transparent;color:#ff630f;font-weight:400}.btn-link:hover{background-color:transparent;color:#c24400}.btn-link.focus,.btn-link:focus,.btn-link:hover{border-color:transparent;text-decoration:underline}.btn-link.focus,.btn-link:focus{box-shadow:none}.btn-link.disabled,.btn-link:disabled{color:#4b5563;pointer-events:none}.btn-group-lg>.btn,.btn-lg{border-radius:.3rem;font-size:1.01625rem;line-height:1.5;padding:.5rem 1rem}.btn-group-sm>.btn,.btn-sm{border-radius:.2rem;font-size:.711375rem;line-height:1.5;padding:.25rem .5rem}.btn-block{display:block;width:100%}.btn-block+.btn-block{margin-top:.5rem}input[type=button].btn-block,input[type=reset].btn-block,input[type=submit].btn-block{width:100%}.fade{transition:opacity .15s linear}@media screen and (prefers-reduced-motion:reduce){.fade{transition:none}}.fade:not(.show){opacity:0}.collapse:not(.show){display:none}.collapsing{height:0;overflow:hidden;position:relative;transition:height .35s ease}@media screen and (prefers-reduced-motion:reduce){.collapsing{transition:none}}.dropdown,.dropleft,.dropright,.dropup{position:relative}.dropdown-toggle:after{margin-left:.255em}.dropdown-toggle:empty:after{margin-left:0}.dropdown-menu{background-clip:padding-box;background-color:#fff;border:1px solid rgba(0,0,0,.15);border-radius:.25rem;color:#111827;display:none;float:left;font-size:.813rem;left:0;list-style:none;margin:.125rem 0 0;min-width:10rem;padding:.5rem 0;position:absolute;text-align:left;top:100%;z-index:1000}.dropdown-menu-right{left:auto;right:0}.dropup .dropdown-menu{bottom:100%;margin-bottom:.125rem;margin-top:0;top:auto}.dropup .dropdown-toggle:after{border-bottom:.3em solid;border-left:.3em solid transparent;border-right:.3em solid transparent;border-top:0;content:"";display:inline-block;height:0;margin-left:.255em;vertical-align:.255em;width:0}.dropup .dropdown-toggle:empty:after{margin-left:0}.dropright .dropdown-menu{left:100%;margin-left:.125rem;margin-top:0;right:auto;top:0}.dropright .dropdown-toggle:after{border-bottom:.3em solid transparent;border-left:.3em solid;border-right:0;border-top:.3em solid transparent;content:"";display:inline-block;height:0;margin-left:.255em;vertical-align:.255em;width:0}.dropright .dropdown-toggle:empty:after{margin-left:0}.dropright .dropdown-toggle:after{vertical-align:0}.dropleft .dropdown-menu{left:auto;margin-right:.125rem;margin-top:0;right:100%;top:0}.dropleft .dropdown-toggle:after{content:"";display:inline-block;display:none;height:0;margin-left:.255em;vertical-align:.255em;width:0}.dropleft .dropdown-toggle:before{border-bottom:.3em solid transparent;border-right:.3em solid;border-top:.3em solid transparent;content:"";display:inline-block;height:0;margin-right:.255em;vertical-align:.255em;width:0}.dropleft .dropdown-toggle:empty:after{margin-left:0}.dropleft .dropdown-toggle:before{vertical-align:0}.dropdown-menu[x-placement^=bottom],.dropdown-menu[x-placement^=left],.dropdown-menu[x-placement^=right],.dropdown-menu[x-placement^=top]{bottom:auto;right:auto}.dropdown-divider{border-top:1px solid #e5e7eb;height:0;margin:.5rem 0;overflow:hidden}.dropdown-item{background-color:transparent;border:0;clear:both;color:#111827;display:block;font-weight:400;padding:.25rem 1.5rem;text-align:inherit;white-space:nowrap;width:100%}.dropdown-item:focus,.dropdown-item:hover{background-color:#f3f4f6;color:#090d15;text-decoration:none}.dropdown-item.active,.dropdown-item:active{background-color:#ff630f;color:#fff;text-decoration:none}.dropdown-item.disabled,.dropdown-item:disabled{background-color:transparent;color:#4b5563}.dropdown-menu.show{display:block}.dropdown-header{color:#4b5563;display:block;font-size:.711375rem;margin-bottom:0;padding:.5rem 1.5rem;white-space:nowrap}.dropdown-item-text{color:#111827;display:block;padding:.25rem 1.5rem}.btn-group,.btn-group-vertical{display:inline-flex;position:relative;vertical-align:middle}.btn-group-vertical>.btn,.btn-group>.btn{flex:0 1 auto;position:relative}.btn-group-vertical>.btn.active,.btn-group-vertical>.btn:active,.btn-group-vertical>.btn:focus,.btn-group-vertical>.btn:hover,.btn-group>.btn.active,.btn-group>.btn:active,.btn-group>.btn:focus,.btn-group>.btn:hover{z-index:1}.btn-group .btn+.btn,.btn-group .btn+.btn-group,.btn-group .btn-group+.btn,.btn-group .btn-group+.btn-group,.btn-group-vertical .btn+.btn,.btn-group-vertical .btn+.btn-group,.btn-group-vertical .btn-group+.btn,.btn-group-vertical .btn-group+.btn-group{margin-left:-1px}.btn-toolbar{display:flex;flex-wrap:wrap;justify-content:flex-start}.btn-toolbar .input-group{width:auto}.btn-group>.btn:first-child{margin-left:0}.btn-group>.btn-group:not(:last-child)>.btn,.btn-group>.btn:not(:last-child):not(.dropdown-toggle){border-bottom-right-radius:0;border-top-right-radius:0}.btn-group>.btn-group:not(:first-child)>.btn,.btn-group>.btn:not(:first-child){border-bottom-left-radius:0;border-top-left-radius:0}.dropdown-toggle-split{padding-left:.5625rem;padding-right:.5625rem}.dropdown-toggle-split:after,.dropright .dropdown-toggle-split:after,.dropup .dropdown-toggle-split:after{margin-left:0}.dropleft .dropdown-toggle-split:before{margin-right:0}.btn-group-sm>.btn+.dropdown-toggle-split,.btn-sm+.dropdown-toggle-split{padding-left:.375rem;padding-right:.375rem}.btn-group-lg>.btn+.dropdown-toggle-split,.btn-lg+.dropdown-toggle-split{padding-left:.75rem;padding-right:.75rem}.btn-group-vertical{align-items:flex-start;flex-direction:column;justify-content:center}.btn-group-vertical .btn,.btn-group-vertical .btn-group{width:100%}.btn-group-vertical>.btn+.btn,.btn-group-vertical>.btn+.btn-group,.btn-group-vertical>.btn-group+.btn,.btn-group-vertical>.btn-group+.btn-group{margin-left:0;margin-top:-1px}.btn-group-vertical>.btn-group:not(:last-child)>.btn,.btn-group-vertical>.btn:not(:last-child):not(.dropdown-toggle){border-bottom-left-radius:0;border-bottom-right-radius:0}.btn-group-vertical>.btn-group:not(:first-child)>.btn,.btn-group-vertical>.btn:not(:first-child){border-top-left-radius:0;border-top-right-radius:0}.btn-group-toggle>.btn,.btn-group-toggle>.btn-group>.btn{margin-bottom:0}.btn-group-toggle>.btn input[type=checkbox],.btn-group-toggle>.btn input[type=radio],.btn-group-toggle>.btn-group>.btn input[type=checkbox],.btn-group-toggle>.btn-group>.btn input[type=radio]{clip:rect(0,0,0,0);pointer-events:none;position:absolute}.input-group{align-items:stretch;display:flex;flex-wrap:wrap;position:relative;width:100%}.input-group>.custom-file,.input-group>.custom-select,.input-group>.form-control{flex:1 1 auto;margin-bottom:0;position:relative;width:1%}.input-group>.custom-file+.custom-file,.input-group>.custom-file+.custom-select,.input-group>.custom-file+.form-control,.input-group>.custom-select+.custom-file,.input-group>.custom-select+.custom-select,.input-group>.custom-select+.form-control,.input-group>.form-control+.custom-file,.input-group>.form-control+.custom-select,.input-group>.form-control+.form-control{margin-left:-1px}.input-group>.custom-file .custom-file-input:focus~.custom-file-label,.input-group>.custom-select:focus,.input-group>.form-control:focus{z-index:3}.input-group>.custom-file .custom-file-input:focus{z-index:4}.input-group>.custom-select:not(:last-child),.input-group>.form-control:not(:last-child){border-bottom-right-radius:0;border-top-right-radius:0}.input-group>.custom-select:not(:first-child),.input-group>.form-control:not(:first-child){border-bottom-left-radius:0;border-top-left-radius:0}.input-group>.custom-file{align-items:center;display:flex}.input-group>.custom-file:not(:last-child) .custom-file-label,.input-group>.custom-file:not(:last-child) .custom-file-label:after{border-bottom-right-radius:0;border-top-right-radius:0}.input-group>.custom-file:not(:first-child) .custom-file-label{border-bottom-left-radius:0;border-top-left-radius:0}.input-group-append,.input-group-prepend{display:flex}.input-group-append .btn,.input-group-prepend .btn{position:relative;z-index:2}.input-group-append .btn+.btn,.input-group-append .btn+.input-group-text,.input-group-append .input-group-text+.btn,.input-group-append .input-group-text+.input-group-text,.input-group-prepend .btn+.btn,.input-group-prepend .btn+.input-group-text,.input-group-prepend .input-group-text+.btn,.input-group-prepend .input-group-text+.input-group-text{margin-left:-1px}.input-group-prepend{margin-right:-1px}.input-group-append{margin-left:-1px}.input-group-text{align-items:center;background-color:#e5e7eb;border:1px solid #9ca3af;border-radius:.25rem;color:#374151;display:flex;font-size:.813rem;font-weight:400;line-height:1.5;margin-bottom:0;padding:.375rem .75rem;text-align:center;white-space:nowrap}.input-group-text input[type=checkbox],.input-group-text input[type=radio]{margin-top:0}.input-group-lg>.form-control,.input-group-lg>.input-group-append>.btn,.input-group-lg>.input-group-append>.input-group-text,.input-group-lg>.input-group-prepend>.btn,.input-group-lg>.input-group-prepend>.input-group-text{border-radius:.3rem;font-size:1.01625rem;height:calc(2.52438rem + 2px);line-height:1.5;padding:.5rem 1rem}.input-group-sm>.form-control,.input-group-sm>.input-group-append>.btn,.input-group-sm>.input-group-append>.input-group-text,.input-group-sm>.input-group-prepend>.btn,.input-group-sm>.input-group-prepend>.input-group-text{border-radius:.2rem;font-size:.711375rem;height:calc(1.56706rem + 2px);line-height:1.5;padding:.25rem .5rem}.input-group>.input-group-append:last-child>.btn:not(:last-child):not(.dropdown-toggle),.input-group>.input-group-append:last-child>.input-group-text:not(:last-child),.input-group>.input-group-append:not(:last-child)>.btn,.input-group>.input-group-append:not(:last-child)>.input-group-text,.input-group>.input-group-prepend>.btn,.input-group>.input-group-prepend>.input-group-text{border-bottom-right-radius:0;border-top-right-radius:0}.input-group>.input-group-append>.btn,.input-group>.input-group-append>.input-group-text,.input-group>.input-group-prepend:first-child>.btn:not(:first-child),.input-group>.input-group-prepend:first-child>.input-group-text:not(:first-child),.input-group>.input-group-prepend:not(:first-child)>.btn,.input-group>.input-group-prepend:not(:first-child)>.input-group-text{border-bottom-left-radius:0;border-top-left-radius:0}.custom-control{display:block;min-height:1.2195rem;padding-left:1.5rem;position:relative}.custom-control-inline{display:inline-flex;margin-right:1rem}.custom-control-input{opacity:0;position:absolute;z-index:-1}.custom-control-input:checked~.custom-control-label:before{background-color:#ff630f;color:#fff}.custom-control-input:focus~.custom-control-label:before{box-shadow:0 0 0 1px #fff,0 0 0 .2rem rgba(255,99,15,.25)}.custom-control-input:active~.custom-control-label:before{background-color:#ffd7c2;color:#fff}.custom-control-input:disabled~.custom-control-label{color:#4b5563}.custom-control-input:disabled~.custom-control-label:before{background-color:#e5e7eb}.custom-control-label{margin-bottom:0;position:relative}.custom-control-label:before{background-color:#d1d5db;pointer-events:none;-webkit-user-select:none;-moz-user-select:none;user-select:none}.custom-control-label:after,.custom-control-label:before{content:"";display:block;height:1rem;left:-1.5rem;position:absolute;top:.10975rem;width:1rem}.custom-control-label:after{background-position:50%;background-repeat:no-repeat;background-size:50% 50%}.custom-checkbox .custom-control-label:before{border-radius:.25rem}.custom-checkbox .custom-control-input:checked~.custom-control-label:before{background-color:#ff630f}.custom-checkbox .custom-control-input:checked~.custom-control-label:after{background-image:url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 8 8'%3E%3Cpath fill='%23fff' d='M6.564.75l-3.59 3.612-1.538-1.55L0 4.26 2.974 7.25 8 2.193z'/%3E%3C/svg%3E")}.custom-checkbox .custom-control-input:indeterminate~.custom-control-label:before{background-color:#ff630f}.custom-checkbox .custom-control-input:indeterminate~.custom-control-label:after{background-image:url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 4 4'%3E%3Cpath stroke='%23fff' d='M0 2h4'/%3E%3C/svg%3E")}.custom-checkbox .custom-control-input:disabled:checked~.custom-control-label:before{background-color:rgba(255,99,15,.5)}.custom-checkbox .custom-control-input:disabled:indeterminate~.custom-control-label:before{background-color:rgba(255,99,15,.5)}.custom-radio .custom-control-label:before{border-radius:50%}.custom-radio .custom-control-input:checked~.custom-control-label:before{background-color:#ff630f}.custom-radio .custom-control-input:checked~.custom-control-label:after{background-image:url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='-4 -4 8 8'%3E%3Ccircle r='3' fill='%23fff'/%3E%3C/svg%3E")}.custom-radio .custom-control-input:disabled:checked~.custom-control-label:before{background-color:rgba(255,99,15,.5)}.custom-select{background:#fff url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 4 5'%3E%3Cpath fill='%231F2937' d='M2 0L0 2h4zm0 5L0 3h4z'/%3E%3C/svg%3E") no-repeat right .75rem center;background-size:8px 10px;border:1px solid #9ca3af;border-radius:.25rem;color:#374151;display:inline-block;height:calc(1.9695rem + 2px);line-height:1.5;padding:.375rem 1.75rem .375rem .75rem;vertical-align:middle;width:100%}.custom-select:focus{border-color:#ffb68f;box-shadow:0 0 0 .2rem rgba(255,182,143,.5);outline:0}.custom-select:focus::-ms-value{background-color:#fff;color:#374151}.custom-select[multiple],.custom-select[size]:not([size="1"]){background-image:none;height:auto;padding-right:.75rem}.custom-select:disabled{background-color:#e5e7eb;color:#4b5563}.custom-select::-ms-expand{opacity:0}.custom-select-sm{font-size:75%;height:calc(1.56706rem + 2px)}.custom-select-lg,.custom-select-sm{padding-bottom:.375rem;padding-top:.375rem}.custom-select-lg{font-size:125%;height:calc(2.52438rem + 2px)}.custom-file{display:inline-block;margin-bottom:0}.custom-file,.custom-file-input{height:calc(1.9695rem + 2px);position:relative;width:100%}.custom-file-input{margin:0;opacity:0;z-index:2}.custom-file-input:focus~.custom-file-label{border-color:#ffb68f;box-shadow:0 0 0 .2rem rgba(255,99,15,.25)}.custom-file-input:focus~.custom-file-label:after{border-color:#ffb68f}.custom-file-input:disabled~.custom-file-label{background-color:#e5e7eb}.custom-file-input:lang(en)~.custom-file-label:after{content:"Browse"}.custom-file-label{background-color:#fff;border:1px solid #9ca3af;border-radius:.25rem;height:calc(1.9695rem + 2px);left:0;z-index:1}.custom-file-label,.custom-file-label:after{color:#374151;line-height:1.5;padding:.375rem .75rem;position:absolute;right:0;top:0}.custom-file-label:after{background-color:#e5e7eb;border-left:1px solid #9ca3af;border-radius:0 .25rem .25rem 0;bottom:0;content:"Browse";display:block;height:1.9695rem;z-index:3}.custom-range{-webkit-appearance:none;-moz-appearance:none;appearance:none;background-color:transparent;padding-left:0;width:100%}.custom-range:focus{outline:none}.custom-range:focus::-webkit-slider-thumb{box-shadow:0 0 0 1px #fff,0 0 0 .2rem rgba(255,99,15,.25)}.custom-range:focus::-moz-range-thumb{box-shadow:0 0 0 1px #fff,0 0 0 .2rem rgba(255,99,15,.25)}.custom-range:focus::-ms-thumb{box-shadow:0 0 0 1px #fff,0 0 0 .2rem rgba(255,99,15,.25)}.custom-range::-moz-focus-outer{border:0}.custom-range::-webkit-slider-thumb{-webkit-appearance:none;appearance:none;background-color:#ff630f;border:0;border-radius:1rem;height:1rem;margin-top:-.25rem;-webkit-transition:background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;transition:background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;width:1rem}@media screen and (prefers-reduced-motion:reduce){.custom-range::-webkit-slider-thumb{-webkit-transition:none;transition:none}}.custom-range::-webkit-slider-thumb:active{background-color:#ffd7c2}.custom-range::-webkit-slider-runnable-track{background-color:#d1d5db;border-color:transparent;border-radius:1rem;color:transparent;cursor:pointer;height:.5rem;width:100%}.custom-range::-moz-range-thumb{-moz-appearance:none;appearance:none;background-color:#ff630f;border:0;border-radius:1rem;height:1rem;-moz-transition:background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;transition:background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;width:1rem}@media screen and (prefers-reduced-motion:reduce){.custom-range::-moz-range-thumb{-moz-transition:none;transition:none}}.custom-range::-moz-range-thumb:active{background-color:#ffd7c2}.custom-range::-moz-range-track{background-color:#d1d5db;border-color:transparent;border-radius:1rem;color:transparent;cursor:pointer;height:.5rem;width:100%}.custom-range::-ms-thumb{appearance:none;background-color:#ff630f;border:0;border-radius:1rem;height:1rem;margin-left:.2rem;margin-right:.2rem;margin-top:0;-ms-transition:background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;transition:background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;width:1rem}@media screen and (prefers-reduced-motion:reduce){.custom-range::-ms-thumb{-ms-transition:none;transition:none}}.custom-range::-ms-thumb:active{background-color:#ffd7c2}.custom-range::-ms-track{background-color:transparent;border-color:transparent;border-width:.5rem;color:transparent;cursor:pointer;height:.5rem;width:100%}.custom-range::-ms-fill-lower,.custom-range::-ms-fill-upper{background-color:#d1d5db;border-radius:1rem}.custom-range::-ms-fill-upper{margin-right:15px}.custom-control-label:before,.custom-file-label,.custom-select{transition:background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out}@media screen and (prefers-reduced-motion:reduce){.custom-control-label:before,.custom-file-label,.custom-select{transition:none}}.nav{display:flex;flex-wrap:wrap;list-style:none;margin-bottom:0;padding-left:0}.nav-link{display:block;padding:.5rem 1rem}.nav-link:focus,.nav-link:hover{text-decoration:none}.nav-link.disabled{color:#4b5563}.nav-tabs{border-bottom:1px solid #d1d5db}.nav-tabs .nav-item{margin-bottom:-1px}.nav-tabs .nav-link{border:1px solid transparent;border-top-left-radius:.25rem;border-top-right-radius:.25rem}.nav-tabs .nav-link:focus,.nav-tabs .nav-link:hover{border-color:#e5e7eb #e5e7eb #d1d5db}.nav-tabs .nav-link.disabled{background-color:transparent;border-color:transparent;color:#4b5563}.nav-tabs .nav-item.show .nav-link,.nav-tabs .nav-link.active{background-color:#fff;border-color:#d1d5db #d1d5db #fff;color:#374151}.nav-tabs .dropdown-menu{border-top-left-radius:0;border-top-right-radius:0;margin-top:-1px}.nav-pills .nav-link{border-radius:.25rem}.nav-pills .nav-link.active,.nav-pills .show>.nav-link{background-color:#ff630f;color:#fff}.nav-fill .nav-item{flex:1 1 auto;text-align:center}.nav-justified .nav-item{flex-basis:0;flex-grow:1;text-align:center}.tab-content>.tab-pane{display:none}.tab-content>.active{display:block}.navbar{padding:.5rem 1rem;position:relative}.navbar,.navbar>.container,.navbar>.container-fluid{align-items:center;display:flex;flex-wrap:wrap;justify-content:space-between}.navbar-brand{display:inline-block;font-size:1.01625rem;line-height:inherit;margin-right:1rem;padding-bottom:.3475625rem;padding-top:.3475625rem;white-space:nowrap}.navbar-brand:focus,.navbar-brand:hover{text-decoration:none}.navbar-nav{display:flex;flex-direction:column;list-style:none;margin-bottom:0;padding-left:0}.navbar-nav .nav-link{padding-left:0;padding-right:0}.navbar-nav .dropdown-menu{float:none;position:static}.navbar-text{display:inline-block;padding-bottom:.5rem;padding-top:.5rem}.navbar-collapse{align-items:center;flex-basis:100%;flex-grow:1}.navbar-toggler{background-color:transparent;border:1px solid transparent;border-radius:.25rem;font-size:1.01625rem;line-height:1;padding:.25rem .75rem}.navbar-toggler:focus,.navbar-toggler:hover{text-decoration:none}.navbar-toggler:not(:disabled):not(.disabled){cursor:pointer}.navbar-toggler-icon{background:no-repeat 50%;background-size:100% 100%;content:"";display:inline-block;height:1.5em;vertical-align:middle;width:1.5em}@media (max-width:575.98px){.navbar-expand-sm>.container,.navbar-expand-sm>.container-fluid{padding-left:0;padding-right:0}}@media (min-width:576px){.navbar-expand-sm{flex-flow:row nowrap;justify-content:flex-start}.navbar-expand-sm .navbar-nav{flex-direction:row}.navbar-expand-sm .navbar-nav .dropdown-menu{position:absolute}.navbar-expand-sm .navbar-nav .nav-link{padding-left:.5rem;padding-right:.5rem}.navbar-expand-sm>.container,.navbar-expand-sm>.container-fluid{flex-wrap:nowrap}.navbar-expand-sm .navbar-collapse{display:flex!important;flex-basis:auto}.navbar-expand-sm .navbar-toggler{display:none}}@media (max-width:767.98px){.navbar-expand-md>.container,.navbar-expand-md>.container-fluid{padding-left:0;padding-right:0}}@media (min-width:768px){.navbar-expand-md{flex-flow:row nowrap;justify-content:flex-start}.navbar-expand-md .navbar-nav{flex-direction:row}.navbar-expand-md .navbar-nav .dropdown-menu{position:absolute}.navbar-expand-md .navbar-nav .nav-link{padding-left:.5rem;padding-right:.5rem}.navbar-expand-md>.container,.navbar-expand-md>.container-fluid{flex-wrap:nowrap}.navbar-expand-md .navbar-collapse{display:flex!important;flex-basis:auto}.navbar-expand-md .navbar-toggler{display:none}}@media (max-width:991.98px){.navbar-expand-lg>.container,.navbar-expand-lg>.container-fluid{padding-left:0;padding-right:0}}@media (min-width:992px){.navbar-expand-lg{flex-flow:row nowrap;justify-content:flex-start}.navbar-expand-lg .navbar-nav{flex-direction:row}.navbar-expand-lg .navbar-nav .dropdown-menu{position:absolute}.navbar-expand-lg .navbar-nav .nav-link{padding-left:.5rem;padding-right:.5rem}.navbar-expand-lg>.container,.navbar-expand-lg>.container-fluid{flex-wrap:nowrap}.navbar-expand-lg .navbar-collapse{display:flex!important;flex-basis:auto}.navbar-expand-lg .navbar-toggler{display:none}}@media (max-width:1199.98px){.navbar-expand-xl>.container,.navbar-expand-xl>.container-fluid{padding-left:0;padding-right:0}}@media (min-width:1200px){.navbar-expand-xl{flex-flow:row nowrap;justify-content:flex-start}.navbar-expand-xl .navbar-nav{flex-direction:row}.navbar-expand-xl .navbar-nav .dropdown-menu{position:absolute}.navbar-expand-xl .navbar-nav .nav-link{padding-left:.5rem;padding-right:.5rem}.navbar-expand-xl>.container,.navbar-expand-xl>.container-fluid{flex-wrap:nowrap}.navbar-expand-xl .navbar-collapse{display:flex!important;flex-basis:auto}.navbar-expand-xl .navbar-toggler{display:none}}.navbar-expand{flex-flow:row nowrap;justify-content:flex-start}.navbar-expand>.container,.navbar-expand>.container-fluid{padding-left:0;padding-right:0}.navbar-expand .navbar-nav{flex-direction:row}.navbar-expand .navbar-nav .dropdown-menu{position:absolute}.navbar-expand .navbar-nav .nav-link{padding-left:.5rem;padding-right:.5rem}.navbar-expand>.container,.navbar-expand>.container-fluid{flex-wrap:nowrap}.navbar-expand .navbar-collapse{display:flex!important;flex-basis:auto}.navbar-expand .navbar-toggler{display:none}.navbar-light .navbar-brand,.navbar-light .navbar-brand:focus,.navbar-light .navbar-brand:hover{color:rgba(0,0,0,.9)}.navbar-light .navbar-nav .nav-link{color:rgba(0,0,0,.5)}.navbar-light .navbar-nav .nav-link:focus,.navbar-light .navbar-nav .nav-link:hover{color:rgba(0,0,0,.7)}.navbar-light .navbar-nav .nav-link.disabled{color:rgba(0,0,0,.3)}.navbar-light .navbar-nav .active>.nav-link,.navbar-light .navbar-nav .nav-link.active,.navbar-light .navbar-nav .nav-link.show,.navbar-light .navbar-nav .show>.nav-link{color:rgba(0,0,0,.9)}.navbar-light .navbar-toggler{border-color:rgba(0,0,0,.1);color:rgba(0,0,0,.5)}.navbar-light .navbar-toggler-icon{background-image:url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(0, 0, 0, 0.5)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E")}.navbar-light .navbar-text{color:rgba(0,0,0,.5)}.navbar-light .navbar-text a,.navbar-light .navbar-text a:focus,.navbar-light .navbar-text a:hover{color:rgba(0,0,0,.9)}.navbar-dark .navbar-brand,.navbar-dark .navbar-brand:focus,.navbar-dark .navbar-brand:hover{color:#fff}.navbar-dark .navbar-nav .nav-link{color:hsla(0,0%,100%,.5)}.navbar-dark .navbar-nav .nav-link:focus,.navbar-dark .navbar-nav .nav-link:hover{color:hsla(0,0%,100%,.75)}.navbar-dark .navbar-nav .nav-link.disabled{color:hsla(0,0%,100%,.25)}.navbar-dark .navbar-nav .active>.nav-link,.navbar-dark .navbar-nav .nav-link.active,.navbar-dark .navbar-nav .nav-link.show,.navbar-dark .navbar-nav .show>.nav-link{color:#fff}.navbar-dark .navbar-toggler{border-color:hsla(0,0%,100%,.1);color:hsla(0,0%,100%,.5)}.navbar-dark .navbar-toggler-icon{background-image:url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(255, 255, 255, 0.5)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E")}.navbar-dark .navbar-text{color:hsla(0,0%,100%,.5)}.navbar-dark .navbar-text a,.navbar-dark .navbar-text a:focus,.navbar-dark .navbar-text a:hover{color:#fff}.card{word-wrap:break-word;background-clip:border-box;background-color:#fff;border:1px solid rgba(0,0,0,.125);display:flex;flex-direction:column;min-width:0;position:relative}.card>hr{margin-left:0;margin-right:0}.card>.list-group:first-child .list-group-item:first-child{border-top-left-radius:10px;border-top-right-radius:10px}.card>.list-group:last-child .list-group-item:last-child{border-bottom-left-radius:10px;border-bottom-right-radius:10px}.card-body{flex:1 1 auto;padding:1.25rem}.card-title{margin-bottom:.75rem}.card-subtitle{margin-top:-.375rem}.card-subtitle,.card-text:last-child{margin-bottom:0}.card-link:hover{text-decoration:none}.card-link+.card-link{margin-left:1.25rem}.card-header{background-color:rgba(0,0,0,.03);border-bottom:1px solid rgba(0,0,0,.125);margin-bottom:0;padding:.75rem 1.25rem}.card-header:first-child{border-radius:9px 9px 0 0}.card-header+.list-group .list-group-item:first-child{border-top:0}.card-footer{background-color:rgba(0,0,0,.03);border-top:1px solid rgba(0,0,0,.125);padding:.75rem 1.25rem}.card-footer:last-child{border-radius:0 0 9px 9px}.card-header-tabs{border-bottom:0;margin-bottom:-.75rem}.card-header-pills,.card-header-tabs{margin-left:-.625rem;margin-right:-.625rem}.card-img-overlay{bottom:0;left:0;padding:1.25rem;position:absolute;right:0;top:0}.card-img{border-radius:9px;width:100%}.card-img-top{border-top-left-radius:9px;border-top-right-radius:9px;width:100%}.card-img-bottom{border-bottom-left-radius:9px;border-bottom-right-radius:9px;width:100%}.card-deck{display:flex;flex-direction:column}.card-deck .card{margin-bottom:15px}@media (min-width:576px){.card-deck{flex-flow:row wrap;margin-left:-15px;margin-right:-15px}.card-deck .card{display:flex;flex:1 0 0%;flex-direction:column;margin-bottom:0;margin-left:15px;margin-right:15px}}.card-group{display:flex;flex-direction:column}.card-group>.card{margin-bottom:15px}@media (min-width:576px){.card-group{flex-flow:row wrap}.card-group>.card{flex:1 0 0%;margin-bottom:0}.card-group>.card+.card{border-left:0;margin-left:0}.card-group>.card:first-child{border-bottom-right-radius:0;border-top-right-radius:0}.card-group>.card:first-child .card-header,.card-group>.card:first-child .card-img-top{border-top-right-radius:0}.card-group>.card:first-child .card-footer,.card-group>.card:first-child .card-img-bottom{border-bottom-right-radius:0}.card-group>.card:last-child{border-bottom-left-radius:0;border-top-left-radius:0}.card-group>.card:last-child .card-header,.card-group>.card:last-child .card-img-top{border-top-left-radius:0}.card-group>.card:last-child .card-footer,.card-group>.card:last-child .card-img-bottom{border-bottom-left-radius:0}.card-group>.card:only-child{border-radius:10px}.card-group>.card:only-child .card-header,.card-group>.card:only-child .card-img-top{border-top-left-radius:10px;border-top-right-radius:10px}.card-group>.card:only-child .card-footer,.card-group>.card:only-child .card-img-bottom{border-bottom-left-radius:10px;border-bottom-right-radius:10px}.card-group>.card:not(:first-child):not(:last-child):not(:only-child),.card-group>.card:not(:first-child):not(:last-child):not(:only-child) .card-footer,.card-group>.card:not(:first-child):not(:last-child):not(:only-child) .card-header,.card-group>.card:not(:first-child):not(:last-child):not(:only-child) .card-img-bottom,.card-group>.card:not(:first-child):not(:last-child):not(:only-child) .card-img-top{border-radius:0}}.card-columns .card{margin-bottom:.75rem}@media (min-width:576px){.card-columns{-moz-column-count:3;column-count:3;-moz-column-gap:1.25rem;column-gap:1.25rem;orphans:1;widows:1}.card-columns .card{display:inline-block;width:100%}}.accordion .card:not(:first-of-type):not(:last-of-type){border-bottom:0;border-radius:0}.accordion .card:not(:first-of-type) .card-header:first-child{border-radius:0}.accordion .card:first-of-type{border-bottom:0;border-bottom-left-radius:0;border-bottom-right-radius:0}.accordion .card:last-of-type{border-top-left-radius:0;border-top-right-radius:0}.breadcrumb{background-color:#e5e7eb;border-radius:.25rem;display:flex;flex-wrap:wrap;list-style:none;margin-bottom:1rem;padding:.75rem 1rem}.breadcrumb-item+.breadcrumb-item{padding-left:.5rem}.breadcrumb-item+.breadcrumb-item:before{color:#4b5563;content:"/";display:inline-block;padding-right:.5rem}.breadcrumb-item+.breadcrumb-item:hover:before{text-decoration:underline;text-decoration:none}.breadcrumb-item.active{color:#4b5563}.pagination{border-radius:.25rem;display:flex;list-style:none;padding-left:0}.page-link{background-color:#fff;border:1px solid #d1d5db;color:#ff630f;display:block;line-height:1.25;margin-left:-1px;padding:.5rem .75rem;position:relative}.page-link:hover{background-color:#e5e7eb;border-color:#d1d5db;color:#c24400;text-decoration:none;z-index:2}.page-link:focus{box-shadow:0 0 0 .2rem rgba(255,99,15,.25);outline:0;z-index:2}.page-link:not(:disabled):not(.disabled){cursor:pointer}.page-item:first-child .page-link{border-bottom-left-radius:.25rem;border-top-left-radius:.25rem;margin-left:0}.page-item:last-child .page-link{border-bottom-right-radius:.25rem;border-top-right-radius:.25rem}.page-item.active .page-link{background-color:#ff630f;border-color:#ff630f;color:#fff;z-index:1}.page-item.disabled .page-link{background-color:#fff;border-color:#d1d5db;color:#4b5563;cursor:auto;pointer-events:none}.pagination-lg .page-link{font-size:1.01625rem;line-height:1.5;padding:.75rem 1.5rem}.pagination-lg .page-item:first-child .page-link{border-bottom-left-radius:.3rem;border-top-left-radius:.3rem}.pagination-lg .page-item:last-child .page-link{border-bottom-right-radius:.3rem;border-top-right-radius:.3rem}.pagination-sm .page-link{font-size:.711375rem;line-height:1.5;padding:.25rem .5rem}.pagination-sm .page-item:first-child .page-link{border-bottom-left-radius:.2rem;border-top-left-radius:.2rem}.pagination-sm .page-item:last-child .page-link{border-bottom-right-radius:.2rem;border-top-right-radius:.2rem}.badge{border-radius:.25rem;display:inline-block;font-size:75%;font-weight:700;line-height:1;padding:.25em .4em;text-align:center;vertical-align:baseline;white-space:nowrap}.badge:empty{display:none}.btn .badge{position:relative;top:-1px}.badge-pill{border-radius:10rem;padding-left:.6em;padding-right:.6em}.badge-primary{background-color:#ff630f;color:#fff}.badge-primary[href]:focus,.badge-primary[href]:hover{background-color:#db4d00;color:#fff;text-decoration:none}.badge-secondary{background-color:#1f2937;color:#fff}.badge-secondary[href]:focus,.badge-secondary[href]:hover{background-color:#0d1116;color:#fff;text-decoration:none}.badge-success{background-color:#10b981;color:#fff}.badge-success[href]:focus,.badge-success[href]:hover{background-color:#0c8a60;color:#fff;text-decoration:none}.badge-info{background-color:#3b82f6;color:#fff}.badge-info[href]:focus,.badge-info[href]:hover{background-color:#0b63f3;color:#fff;text-decoration:none}.badge-warning{background-color:#f59e0b;color:#111827}.badge-warning[href]:focus,.badge-warning[href]:hover{background-color:#c57f08;color:#111827;text-decoration:none}.badge-danger{background-color:#ef4444;color:#fff}.badge-danger[href]:focus,.badge-danger[href]:hover{background-color:#eb1515;color:#fff;text-decoration:none}.badge-light{background-color:#6b7280;color:#fff}.badge-light[href]:focus,.badge-light[href]:hover{background-color:#545964;color:#fff;text-decoration:none}.badge-dark{background-color:#111827;color:#fff}.badge-dark[href]:focus,.badge-dark[href]:hover{background-color:#020203;color:#fff;text-decoration:none}.badge-gray-100{background-color:#f3f4f6;color:#111827}.badge-gray-100[href]:focus,.badge-gray-100[href]:hover{background-color:#d6d9e0;color:#111827;text-decoration:none}.badge-gray-200{background-color:#e5e7eb;color:#111827}.badge-gray-200[href]:focus,.badge-gray-200[href]:hover{background-color:#c8ccd5;color:#111827;text-decoration:none}.badge-gray-300{background-color:#d1d5db;color:#111827}.badge-gray-300[href]:focus,.badge-gray-300[href]:hover{background-color:#b4bbc5;color:#111827;text-decoration:none}.badge-gray-400{background-color:#9ca3af;color:#111827}.badge-gray-400[href]:focus,.badge-gray-400[href]:hover{background-color:#808998;color:#111827;text-decoration:none}.badge-gray-500{background-color:#6b7280;color:#fff}.badge-gray-500[href]:focus,.badge-gray-500[href]:hover{background-color:#545964;color:#fff;text-decoration:none}.badge-gray-600{background-color:#4b5563;color:#fff}.badge-gray-600[href]:focus,.badge-gray-600[href]:hover{background-color:#353c46;color:#fff;text-decoration:none}.badge-gray-700{background-color:#374151;color:#fff}.badge-gray-700[href]:focus,.badge-gray-700[href]:hover{background-color:#222933;color:#fff;text-decoration:none}.badge-gray-800{background-color:#1f2937;color:#fff}.badge-gray-800[href]:focus,.badge-gray-800[href]:hover{background-color:#0d1116;color:#fff;text-decoration:none}.badge-gray-900{background-color:#111827;color:#fff}.badge-gray-900[href]:focus,.badge-gray-900[href]:hover{background-color:#020203;color:#fff;text-decoration:none}.jumbotron{background-color:#e5e7eb;border-radius:.3rem;margin-bottom:2rem;padding:2rem 1rem}@media (min-width:576px){.jumbotron{padding:4rem 2rem}}.jumbotron-fluid{border-radius:0;padding-left:0;padding-right:0}.alert{border:1px solid transparent;border-radius:.25rem;margin-bottom:1rem;padding:.2rem 1.25rem;position:relative}.alert-heading{color:inherit}.alert-link{font-weight:700}.alert-dismissible{padding-right:3.7195rem}.alert-dismissible .close{color:inherit;padding:.2rem 1.25rem;position:absolute;right:0;top:0}.alert-primary{background-color:#ffe0cf;border-color:#ffd3bc;color:#853308}.alert-primary hr{border-top-color:#ffc2a3}.alert-primary .alert-link{color:#552105}.alert-secondary{background-color:#d2d4d7;border-color:#c0c3c7;color:#10151d}.alert-secondary hr{border-top-color:#b3b6bb}.alert-secondary .alert-link{color:#000}.alert-success{background-color:#cff1e6;border-color:#bcebdc;color:#086043}.alert-success hr{border-top-color:#a8e5d2}.alert-success .alert-link{color:#043122}.alert-info{background-color:#d8e6fd;border-color:#c8dcfc;color:#1f4480}.alert-info hr{border-top-color:#b0cdfb}.alert-info .alert-link{color:#152e57}.alert-warning{background-color:#fdecce;border-color:#fce4bb;color:#7f5206}.alert-warning hr{border-top-color:#fbdaa3}.alert-warning .alert-link{color:#4e3304}.alert-danger{background-color:#fcdada;border-color:#fbcbcb;color:#7c2323}.alert-danger hr{border-top-color:#f9b3b3}.alert-danger .alert-link{color:#541818}.alert-light{background-color:#e1e3e6;border-color:#d6d8db;color:#383b43}.alert-light hr{border-top-color:#c8cbcf}.alert-light .alert-link{color:#212327}.alert-dark{background-color:#cfd1d4;border-color:#bcbec3;color:#090c14}.alert-dark hr{border-top-color:#afb1b7}.alert-dark .alert-link{color:#000}.alert-gray-100{background-color:#fdfdfd;border-color:#fcfcfc;color:#7e7f80}.alert-gray-100 hr{border-top-color:#efefef}.alert-gray-100 .alert-link{color:#656666}.alert-gray-200{background-color:#fafafb;border-color:#f8f8f9;color:#77787a}.alert-gray-200 hr{border-top-color:#eaeaed}.alert-gray-200 .alert-link{color:#5e5f60}.alert-gray-300{background-color:#f6f7f8;border-color:#f2f3f5;color:#6d6f72}.alert-gray-300 hr{border-top-color:#e4e6ea}.alert-gray-300 .alert-link{color:#545658}.alert-gray-400{background-color:#ebedef;border-color:#e3e5e9;color:#51555b}.alert-gray-400 hr{border-top-color:#d5d8de}.alert-gray-400 .alert-link{color:#393c40}.alert-gray-500{background-color:#e1e3e6;border-color:#d6d8db;color:#383b43}.alert-gray-500 hr{border-top-color:#c8cbcf}.alert-gray-500 .alert-link{color:#212327}.alert-gray-600{background-color:#dbdde0;border-color:#cdcfd3;color:#272c33}.alert-gray-600 hr{border-top-color:#bfc2c7}.alert-gray-600 .alert-link{color:#111316}.alert-gray-700{background-color:#d7d9dc;border-color:#c7cace;color:#1d222a}.alert-gray-700 hr{border-top-color:#b9bdc2}.alert-gray-700 .alert-link{color:#080a0c}.alert-gray-800{background-color:#d2d4d7;border-color:#c0c3c7;color:#10151d}.alert-gray-800 hr{border-top-color:#b3b6bb}.alert-gray-800 .alert-link{color:#000}.alert-gray-900{background-color:#cfd1d4;border-color:#bcbec3;color:#090c14}.alert-gray-900 hr{border-top-color:#afb1b7}.alert-gray-900 .alert-link{color:#000}@keyframes progress-bar-stripes{0%{background-position:1rem 0}to{background-position:0 0}}.progress{background-color:#e5e7eb;border-radius:.25rem;display:flex;font-size:.60975rem;height:1rem;overflow:hidden}.progress-bar{background-color:#ff630f;color:#fff;display:flex;flex-direction:column;justify-content:center;text-align:center;transition:width .6s ease;white-space:nowrap}@media screen and (prefers-reduced-motion:reduce){.progress-bar{transition:none}}.progress-bar-striped{background-image:linear-gradient(45deg,hsla(0,0%,100%,.15) 25%,transparent 0,transparent 50%,hsla(0,0%,100%,.15) 0,hsla(0,0%,100%,.15) 75%,transparent 0,transparent);background-size:1rem 1rem}.progress-bar-animated{animation:progress-bar-stripes 1s linear infinite}.media{align-items:flex-start;display:flex}.media-body{flex:1}.list-group{display:flex;flex-direction:column;margin-bottom:0;padding-left:0}.list-group-item-action{color:#374151;text-align:inherit;width:100%}.list-group-item-action:focus,.list-group-item-action:hover{background-color:#f3f4f6;color:#374151;text-decoration:none}.list-group-item-action:active{background-color:#e5e7eb;color:#111827}.list-group-item{background-color:#fff;border:1px solid rgba(0,0,0,.125);display:block;margin-bottom:-1px;padding:.75rem 1.25rem;position:relative}.list-group-item:first-child{border-top-left-radius:.25rem;border-top-right-radius:.25rem}.list-group-item:last-child{border-bottom-left-radius:.25rem;border-bottom-right-radius:.25rem;margin-bottom:0}.list-group-item:focus,.list-group-item:hover{text-decoration:none;z-index:1}.list-group-item.disabled,.list-group-item:disabled{background-color:#fff;color:#4b5563}.list-group-item.active{background-color:#ff630f;border-color:#ff630f;color:#fff;z-index:2}.list-group-flush .list-group-item{border-left:0;border-radius:0;border-right:0}.list-group-flush:first-child .list-group-item:first-child{border-top:0}.list-group-flush:last-child .list-group-item:last-child{border-bottom:0}.list-group-item-primary{background-color:#ffd3bc;color:#853308}.list-group-item-primary.list-group-item-action:focus,.list-group-item-primary.list-group-item-action:hover{background-color:#ffc2a3;color:#853308}.list-group-item-primary.list-group-item-action.active{background-color:#853308;border-color:#853308;color:#fff}.list-group-item-secondary{background-color:#c0c3c7;color:#10151d}.list-group-item-secondary.list-group-item-action:focus,.list-group-item-secondary.list-group-item-action:hover{background-color:#b3b6bb;color:#10151d}.list-group-item-secondary.list-group-item-action.active{background-color:#10151d;border-color:#10151d;color:#fff}.list-group-item-success{background-color:#bcebdc;color:#086043}.list-group-item-success.list-group-item-action:focus,.list-group-item-success.list-group-item-action:hover{background-color:#a8e5d2;color:#086043}.list-group-item-success.list-group-item-action.active{background-color:#086043;border-color:#086043;color:#fff}.list-group-item-info{background-color:#c8dcfc;color:#1f4480}.list-group-item-info.list-group-item-action:focus,.list-group-item-info.list-group-item-action:hover{background-color:#b0cdfb;color:#1f4480}.list-group-item-info.list-group-item-action.active{background-color:#1f4480;border-color:#1f4480;color:#fff}.list-group-item-warning{background-color:#fce4bb;color:#7f5206}.list-group-item-warning.list-group-item-action:focus,.list-group-item-warning.list-group-item-action:hover{background-color:#fbdaa3;color:#7f5206}.list-group-item-warning.list-group-item-action.active{background-color:#7f5206;border-color:#7f5206;color:#fff}.list-group-item-danger{background-color:#fbcbcb;color:#7c2323}.list-group-item-danger.list-group-item-action:focus,.list-group-item-danger.list-group-item-action:hover{background-color:#f9b3b3;color:#7c2323}.list-group-item-danger.list-group-item-action.active{background-color:#7c2323;border-color:#7c2323;color:#fff}.list-group-item-light{background-color:#d6d8db;color:#383b43}.list-group-item-light.list-group-item-action:focus,.list-group-item-light.list-group-item-action:hover{background-color:#c8cbcf;color:#383b43}.list-group-item-light.list-group-item-action.active{background-color:#383b43;border-color:#383b43;color:#fff}.list-group-item-dark{background-color:#bcbec3;color:#090c14}.list-group-item-dark.list-group-item-action:focus,.list-group-item-dark.list-group-item-action:hover{background-color:#afb1b7;color:#090c14}.list-group-item-dark.list-group-item-action.active{background-color:#090c14;border-color:#090c14;color:#fff}.list-group-item-gray-100{background-color:#fcfcfc;color:#7e7f80}.list-group-item-gray-100.list-group-item-action:focus,.list-group-item-gray-100.list-group-item-action:hover{background-color:#efefef;color:#7e7f80}.list-group-item-gray-100.list-group-item-action.active{background-color:#7e7f80;border-color:#7e7f80;color:#fff}.list-group-item-gray-200{background-color:#f8f8f9;color:#77787a}.list-group-item-gray-200.list-group-item-action:focus,.list-group-item-gray-200.list-group-item-action:hover{background-color:#eaeaed;color:#77787a}.list-group-item-gray-200.list-group-item-action.active{background-color:#77787a;border-color:#77787a;color:#fff}.list-group-item-gray-300{background-color:#f2f3f5;color:#6d6f72}.list-group-item-gray-300.list-group-item-action:focus,.list-group-item-gray-300.list-group-item-action:hover{background-color:#e4e6ea;color:#6d6f72}.list-group-item-gray-300.list-group-item-action.active{background-color:#6d6f72;border-color:#6d6f72;color:#fff}.list-group-item-gray-400{background-color:#e3e5e9;color:#51555b}.list-group-item-gray-400.list-group-item-action:focus,.list-group-item-gray-400.list-group-item-action:hover{background-color:#d5d8de;color:#51555b}.list-group-item-gray-400.list-group-item-action.active{background-color:#51555b;border-color:#51555b;color:#fff}.list-group-item-gray-500{background-color:#d6d8db;color:#383b43}.list-group-item-gray-500.list-group-item-action:focus,.list-group-item-gray-500.list-group-item-action:hover{background-color:#c8cbcf;color:#383b43}.list-group-item-gray-500.list-group-item-action.active{background-color:#383b43;border-color:#383b43;color:#fff}.list-group-item-gray-600{background-color:#cdcfd3;color:#272c33}.list-group-item-gray-600.list-group-item-action:focus,.list-group-item-gray-600.list-group-item-action:hover{background-color:#bfc2c7;color:#272c33}.list-group-item-gray-600.list-group-item-action.active{background-color:#272c33;border-color:#272c33;color:#fff}.list-group-item-gray-700{background-color:#c7cace;color:#1d222a}.list-group-item-gray-700.list-group-item-action:focus,.list-group-item-gray-700.list-group-item-action:hover{background-color:#b9bdc2;color:#1d222a}.list-group-item-gray-700.list-group-item-action.active{background-color:#1d222a;border-color:#1d222a;color:#fff}.list-group-item-gray-800{background-color:#c0c3c7;color:#10151d}.list-group-item-gray-800.list-group-item-action:focus,.list-group-item-gray-800.list-group-item-action:hover{background-color:#b3b6bb;color:#10151d}.list-group-item-gray-800.list-group-item-action.active{background-color:#10151d;border-color:#10151d;color:#fff}.list-group-item-gray-900{background-color:#bcbec3;color:#090c14}.list-group-item-gray-900.list-group-item-action:focus,.list-group-item-gray-900.list-group-item-action:hover{background-color:#afb1b7;color:#090c14}.list-group-item-gray-900.list-group-item-action.active{background-color:#090c14;border-color:#090c14;color:#fff}.close{color:#000;float:right;font-size:1.2195rem;font-weight:700;line-height:1;opacity:.5;text-shadow:0 1px 0 #fff}.close:not(:disabled):not(.disabled){cursor:pointer}.close:not(:disabled):not(.disabled):focus,.close:not(:disabled):not(.disabled):hover{color:#000;opacity:.75;text-decoration:none}button.close{-webkit-appearance:none;background-color:transparent;border:0;padding:0}.modal-open{overflow:hidden}.modal-open .modal{overflow-x:hidden;overflow-y:auto}.modal{bottom:0;display:none;left:0;outline:0;overflow:hidden;position:fixed;right:0;top:0;z-index:1050}.modal-dialog{margin:.5rem;pointer-events:none;position:relative;width:auto}.modal.fade .modal-dialog{transform:translateY(-25%);transition:transform .3s ease-out}@media screen and (prefers-reduced-motion:reduce){.modal.fade .modal-dialog{transition:none}}.modal.show .modal-dialog{transform:translate(0)}.modal-dialog-centered{align-items:center;display:flex;min-height:calc(100% - 1rem)}.modal-dialog-centered:before{content:"";display:block;height:calc(100vh - 1rem)}.modal-content{background-clip:padding-box;background-color:#fff;border:1px solid rgba(0,0,0,.2);border-radius:.3rem;display:flex;flex-direction:column;outline:0;pointer-events:auto;position:relative;width:100%}.modal-backdrop{background-color:#000;bottom:0;left:0;position:fixed;right:0;top:0;z-index:1040}.modal-backdrop.fade{opacity:0}.modal-backdrop.show{opacity:.5}.modal-header{align-items:flex-start;border-bottom:1px solid #e5e7eb;border-top-left-radius:.3rem;border-top-right-radius:.3rem;display:flex;justify-content:space-between;padding:1rem}.modal-header .close{margin:-1rem -1rem -1rem auto;padding:1rem}.modal-title{line-height:1.5;margin-bottom:0}.modal-body{flex:1 1 auto;padding:1rem;position:relative}.modal-footer{align-items:center;border-top:1px solid #e5e7eb;display:flex;justify-content:flex-end;padding:1rem}.modal-footer>:not(:first-child){margin-left:.25rem}.modal-footer>:not(:last-child){margin-right:.25rem}.modal-scrollbar-measure{height:50px;overflow:scroll;position:absolute;top:-9999px;width:50px}@media (min-width:576px){.modal-dialog{margin:1.75rem auto;max-width:500px}.modal-dialog-centered{min-height:calc(100% - 3.5rem)}.modal-dialog-centered:before{height:calc(100vh - 3.5rem)}.modal-sm{max-width:300px}}@media (min-width:992px){.modal-lg{max-width:800px}}.tooltip{word-wrap:break-word;display:block;font-family:Nunito,sans-serif;font-size:.711375rem;font-style:normal;font-weight:400;letter-spacing:normal;line-break:auto;line-height:1.5;margin:0;opacity:0;position:absolute;text-align:left;text-align:start;text-decoration:none;text-shadow:none;text-transform:none;white-space:normal;word-break:normal;word-spacing:normal;z-index:1070}.tooltip.show{opacity:.9}.tooltip .arrow{display:block;height:.4rem;position:absolute;width:.8rem}.tooltip .arrow:before{border-color:transparent;border-style:solid;content:"";position:absolute}.bs-tooltip-auto[x-placement^=top],.bs-tooltip-top{padding:.4rem 0}.bs-tooltip-auto[x-placement^=top] .arrow,.bs-tooltip-top .arrow{bottom:0}.bs-tooltip-auto[x-placement^=top] .arrow:before,.bs-tooltip-top .arrow:before{border-top-color:#000;border-width:.4rem .4rem 0;top:0}.bs-tooltip-auto[x-placement^=right],.bs-tooltip-right{padding:0 .4rem}.bs-tooltip-auto[x-placement^=right] .arrow,.bs-tooltip-right .arrow{height:.8rem;left:0;width:.4rem}.bs-tooltip-auto[x-placement^=right] .arrow:before,.bs-tooltip-right .arrow:before{border-right-color:#000;border-width:.4rem .4rem .4rem 0;right:0}.bs-tooltip-auto[x-placement^=bottom],.bs-tooltip-bottom{padding:.4rem 0}.bs-tooltip-auto[x-placement^=bottom] .arrow,.bs-tooltip-bottom .arrow{top:0}.bs-tooltip-auto[x-placement^=bottom] .arrow:before,.bs-tooltip-bottom .arrow:before{border-bottom-color:#000;border-width:0 .4rem .4rem;bottom:0}.bs-tooltip-auto[x-placement^=left],.bs-tooltip-left{padding:0 .4rem}.bs-tooltip-auto[x-placement^=left] .arrow,.bs-tooltip-left .arrow{height:.8rem;right:0;width:.4rem}.bs-tooltip-auto[x-placement^=left] .arrow:before,.bs-tooltip-left .arrow:before{border-left-color:#000;border-width:.4rem 0 .4rem .4rem;left:0}.tooltip-inner{background-color:#000;border-radius:.25rem;color:#fff;max-width:200px;padding:.25rem .5rem;text-align:center}.toast{-webkit-backdrop-filter:blur(10px);backdrop-filter:blur(10px);background-clip:padding-box;background-color:hsla(0,0%,100%,.85);border:1px solid rgba(0,0,0,.1);border-radius:.25rem;box-shadow:0 .25rem .75rem rgba(0,0,0,.1);font-size:.875rem;max-width:350px;opacity:0;overflow:hidden}.toast:not(:last-child){margin-bottom:.75rem}.toast.showing{opacity:1}.toast.show{display:block;opacity:1}.toast.hide{display:none}.toast-header{align-items:center;background-clip:padding-box;background-color:hsla(0,0%,100%,.85);border-bottom:1px solid rgba(0,0,0,.05);color:#4b5563;display:flex;padding:.25rem .75rem}.toast-body{padding:.75rem}.popover{word-wrap:break-word;background-clip:padding-box;background-color:#fff;border:1px solid rgba(0,0,0,.2);border-radius:.3rem;font-family:Nunito,sans-serif;font-size:.711375rem;font-style:normal;font-weight:400;left:0;letter-spacing:normal;line-break:auto;line-height:1.5;max-width:276px;text-align:left;text-align:start;text-decoration:none;text-shadow:none;text-transform:none;top:0;white-space:normal;word-break:normal;word-spacing:normal;z-index:1060}.popover,.popover .arrow{display:block;position:absolute}.popover .arrow{height:.5rem;margin:0 .3rem;width:1rem}.popover .arrow:after,.popover .arrow:before{border-color:transparent;border-style:solid;content:"";display:block;position:absolute}.bs-popover-auto[x-placement^=top],.bs-popover-top{margin-bottom:.5rem}.bs-popover-auto[x-placement^=top] .arrow,.bs-popover-top .arrow{bottom:calc(-.5rem + -1px)}.bs-popover-auto[x-placement^=top] .arrow:after,.bs-popover-auto[x-placement^=top] .arrow:before,.bs-popover-top .arrow:after,.bs-popover-top .arrow:before{border-width:.5rem .5rem 0}.bs-popover-auto[x-placement^=top] .arrow:before,.bs-popover-top .arrow:before{border-top-color:rgba(0,0,0,.25);bottom:0}.bs-popover-auto[x-placement^=top] .arrow:after,.bs-popover-top .arrow:after{border-top-color:#fff;bottom:1px}.bs-popover-auto[x-placement^=right],.bs-popover-right{margin-left:.5rem}.bs-popover-auto[x-placement^=right] .arrow,.bs-popover-right .arrow{height:1rem;left:calc(-.5rem + -1px);margin:.3rem 0;width:.5rem}.bs-popover-auto[x-placement^=right] .arrow:after,.bs-popover-auto[x-placement^=right] .arrow:before,.bs-popover-right .arrow:after,.bs-popover-right .arrow:before{border-width:.5rem .5rem .5rem 0}.bs-popover-auto[x-placement^=right] .arrow:before,.bs-popover-right .arrow:before{border-right-color:rgba(0,0,0,.25);left:0}.bs-popover-auto[x-placement^=right] .arrow:after,.bs-popover-right .arrow:after{border-right-color:#fff;left:1px}.bs-popover-auto[x-placement^=bottom],.bs-popover-bottom{margin-top:.5rem}.bs-popover-auto[x-placement^=bottom] .arrow,.bs-popover-bottom .arrow{top:calc(-.5rem + -1px)}.bs-popover-auto[x-placement^=bottom] .arrow:after,.bs-popover-auto[x-placement^=bottom] .arrow:before,.bs-popover-bottom .arrow:after,.bs-popover-bottom .arrow:before{border-width:0 .5rem .5rem}.bs-popover-auto[x-placement^=bottom] .arrow:before,.bs-popover-bottom .arrow:before{border-bottom-color:rgba(0,0,0,.25);top:0}.bs-popover-auto[x-placement^=bottom] .arrow:after,.bs-popover-bottom .arrow:after{border-bottom-color:#fff;top:1px}.bs-popover-auto[x-placement^=bottom] .popover-header:before,.bs-popover-bottom .popover-header:before{border-bottom:1px solid #f7f7f7;content:"";display:block;left:50%;margin-left:-.5rem;position:absolute;top:0;width:1rem}.bs-popover-auto[x-placement^=left],.bs-popover-left{margin-right:.5rem}.bs-popover-auto[x-placement^=left] .arrow,.bs-popover-left .arrow{height:1rem;margin:.3rem 0;right:calc(-.5rem + -1px);width:.5rem}.bs-popover-auto[x-placement^=left] .arrow:after,.bs-popover-auto[x-placement^=left] .arrow:before,.bs-popover-left .arrow:after,.bs-popover-left .arrow:before{border-width:.5rem 0 .5rem .5rem}.bs-popover-auto[x-placement^=left] .arrow:before,.bs-popover-left .arrow:before{border-left-color:rgba(0,0,0,.25);right:0}.bs-popover-auto[x-placement^=left] .arrow:after,.bs-popover-left .arrow:after{border-left-color:#fff;right:1px}.popover-header{background-color:#f7f7f7;border-bottom:1px solid #ebebeb;border-top-left-radius:calc(.3rem - 1px);border-top-right-radius:calc(.3rem - 1px);color:inherit;font-size:.813rem;margin-bottom:0;padding:.5rem .75rem}.popover-header:empty{display:none}.popover-body{color:#111827;padding:.5rem .75rem}.carousel{position:relative}.carousel-inner{overflow:hidden;position:relative;width:100%}.carousel-item{align-items:center;backface-visibility:hidden;display:none;perspective:1000px;position:relative;width:100%}.carousel-item-next,.carousel-item-prev,.carousel-item.active{display:block;transition:transform .6s ease}@media screen and (prefers-reduced-motion:reduce){.carousel-item-next,.carousel-item-prev,.carousel-item.active{transition:none}}.carousel-item-next,.carousel-item-prev{position:absolute;top:0}.carousel-item-next.carousel-item-left,.carousel-item-prev.carousel-item-right{transform:translateX(0)}@supports (transform-style:preserve-3d){.carousel-item-next.carousel-item-left,.carousel-item-prev.carousel-item-right{transform:translateZ(0)}}.active.carousel-item-right,.carousel-item-next{transform:translateX(100%)}@supports (transform-style:preserve-3d){.active.carousel-item-right,.carousel-item-next{transform:translate3d(100%,0,0)}}.active.carousel-item-left,.carousel-item-prev{transform:translateX(-100%)}@supports (transform-style:preserve-3d){.active.carousel-item-left,.carousel-item-prev{transform:translate3d(-100%,0,0)}}.carousel-fade .carousel-item{opacity:0;transition-duration:.6s;transition-property:opacity}.carousel-fade .carousel-item-next.carousel-item-left,.carousel-fade .carousel-item-prev.carousel-item-right,.carousel-fade .carousel-item.active{opacity:1}.carousel-fade .active.carousel-item-left,.carousel-fade .active.carousel-item-right{opacity:0}.carousel-fade .active.carousel-item-left,.carousel-fade .active.carousel-item-prev,.carousel-fade .carousel-item-next,.carousel-fade .carousel-item-prev,.carousel-fade .carousel-item.active{transform:translateX(0)}@supports (transform-style:preserve-3d){.carousel-fade .active.carousel-item-left,.carousel-fade .active.carousel-item-prev,.carousel-fade .carousel-item-next,.carousel-fade .carousel-item-prev,.carousel-fade .carousel-item.active{transform:translateZ(0)}}.carousel-control-next,.carousel-control-prev{align-items:center;bottom:0;color:#fff;display:flex;justify-content:center;opacity:.5;position:absolute;text-align:center;top:0;width:15%}.carousel-control-next:focus,.carousel-control-next:hover,.carousel-control-prev:focus,.carousel-control-prev:hover{color:#fff;opacity:.9;outline:0;text-decoration:none}.carousel-control-prev{left:0}.carousel-control-next{right:0}.carousel-control-next-icon,.carousel-control-prev-icon{background:transparent no-repeat 50%;background-size:100% 100%;display:inline-block;height:20px;width:20px}.carousel-control-prev-icon{background-image:url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23fff' viewBox='0 0 8 8'%3E%3Cpath d='M5.25 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z'/%3E%3C/svg%3E")}.carousel-control-next-icon{background-image:url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23fff' viewBox='0 0 8 8'%3E%3Cpath d='M2.75 0l-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 4-4-4-4z'/%3E%3C/svg%3E")}.carousel-indicators{bottom:10px;display:flex;justify-content:center;left:0;list-style:none;margin-left:15%;margin-right:15%;padding-left:0;position:absolute;right:0;z-index:15}.carousel-indicators li{background-color:hsla(0,0%,100%,.5);cursor:pointer;flex:0 1 auto;height:3px;margin-left:3px;margin-right:3px;position:relative;text-indent:-999px;width:30px}.carousel-indicators li:before{top:-10px}.carousel-indicators li:after,.carousel-indicators li:before{content:"";display:inline-block;height:10px;left:0;position:absolute;width:100%}.carousel-indicators li:after{bottom:-10px}.carousel-indicators .active{background-color:#fff}.carousel-caption{bottom:20px;color:#fff;left:15%;padding-bottom:20px;padding-top:20px;position:absolute;right:15%;text-align:center;z-index:10}.align-baseline{vertical-align:baseline!important}.align-top{vertical-align:top!important}.align-middle{vertical-align:middle!important}.align-bottom{vertical-align:bottom!important}.align-text-bottom{vertical-align:text-bottom!important}.align-text-top{vertical-align:text-top!important}.bg-primary{background-color:#ff630f!important}a.bg-primary:focus,a.bg-primary:hover,button.bg-primary:focus,button.bg-primary:hover{background-color:#db4d00!important}.bg-secondary{background-color:#1f2937!important}a.bg-secondary:focus,a.bg-secondary:hover,button.bg-secondary:focus,button.bg-secondary:hover{background-color:#0d1116!important}.bg-success{background-color:#10b981!important}a.bg-success:focus,a.bg-success:hover,button.bg-success:focus,button.bg-success:hover{background-color:#0c8a60!important}.bg-info{background-color:#3b82f6!important}a.bg-info:focus,a.bg-info:hover,button.bg-info:focus,button.bg-info:hover{background-color:#0b63f3!important}.bg-warning{background-color:#f59e0b!important}a.bg-warning:focus,a.bg-warning:hover,button.bg-warning:focus,button.bg-warning:hover{background-color:#c57f08!important}.bg-danger{background-color:#ef4444!important}a.bg-danger:focus,a.bg-danger:hover,button.bg-danger:focus,button.bg-danger:hover{background-color:#eb1515!important}.bg-light{background-color:#6b7280!important}a.bg-light:focus,a.bg-light:hover,button.bg-light:focus,button.bg-light:hover{background-color:#545964!important}.bg-dark{background-color:#111827!important}a.bg-dark:focus,a.bg-dark:hover,button.bg-dark:focus,button.bg-dark:hover{background-color:#020203!important}.bg-gray-100{background-color:#f3f4f6!important}a.bg-gray-100:focus,a.bg-gray-100:hover,button.bg-gray-100:focus,button.bg-gray-100:hover{background-color:#d6d9e0!important}.bg-gray-200{background-color:#e5e7eb!important}a.bg-gray-200:focus,a.bg-gray-200:hover,button.bg-gray-200:focus,button.bg-gray-200:hover{background-color:#c8ccd5!important}.bg-gray-300{background-color:#d1d5db!important}a.bg-gray-300:focus,a.bg-gray-300:hover,button.bg-gray-300:focus,button.bg-gray-300:hover{background-color:#b4bbc5!important}.bg-gray-400{background-color:#9ca3af!important}a.bg-gray-400:focus,a.bg-gray-400:hover,button.bg-gray-400:focus,button.bg-gray-400:hover{background-color:#808998!important}.bg-gray-500{background-color:#6b7280!important}a.bg-gray-500:focus,a.bg-gray-500:hover,button.bg-gray-500:focus,button.bg-gray-500:hover{background-color:#545964!important}.bg-gray-600{background-color:#4b5563!important}a.bg-gray-600:focus,a.bg-gray-600:hover,button.bg-gray-600:focus,button.bg-gray-600:hover{background-color:#353c46!important}.bg-gray-700{background-color:#374151!important}a.bg-gray-700:focus,a.bg-gray-700:hover,button.bg-gray-700:focus,button.bg-gray-700:hover{background-color:#222933!important}.bg-gray-800{background-color:#1f2937!important}a.bg-gray-800:focus,a.bg-gray-800:hover,button.bg-gray-800:focus,button.bg-gray-800:hover{background-color:#0d1116!important}.bg-gray-900{background-color:#111827!important}a.bg-gray-900:focus,a.bg-gray-900:hover,button.bg-gray-900:focus,button.bg-gray-900:hover{background-color:#020203!important}.bg-white{background-color:#fff!important}.bg-transparent{background-color:transparent!important}.border{border:1px solid #d1d5db!important}.border-top{border-top:1px solid #d1d5db!important}.border-right{border-right:1px solid #d1d5db!important}.border-bottom{border-bottom:1px solid #d1d5db!important}.border-left{border-left:1px solid #d1d5db!important}.border-0{border:0!important}.border-top-0{border-top:0!important}.border-right-0{border-right:0!important}.border-bottom-0{border-bottom:0!important}.border-left-0{border-left:0!important}.border-primary{border-color:#ff630f!important}.border-secondary{border-color:#1f2937!important}.border-success{border-color:#10b981!important}.border-info{border-color:#3b82f6!important}.border-warning{border-color:#f59e0b!important}.border-danger{border-color:#ef4444!important}.border-light{border-color:#6b7280!important}.border-dark{border-color:#111827!important}.border-gray-100{border-color:#f3f4f6!important}.border-gray-200{border-color:#e5e7eb!important}.border-gray-300{border-color:#d1d5db!important}.border-gray-400{border-color:#9ca3af!important}.border-gray-500{border-color:#6b7280!important}.border-gray-600{border-color:#4b5563!important}.border-gray-700{border-color:#374151!important}.border-gray-800{border-color:#1f2937!important}.border-gray-900{border-color:#111827!important}.border-white{border-color:#fff!important}.rounded{border-radius:.25rem!important}.rounded-top{border-top-left-radius:.25rem!important}.rounded-right,.rounded-top{border-top-right-radius:.25rem!important}.rounded-bottom,.rounded-right{border-bottom-right-radius:.25rem!important}.rounded-bottom,.rounded-left{border-bottom-left-radius:.25rem!important}.rounded-left{border-top-left-radius:.25rem!important}.rounded-circle{border-radius:50%!important}.rounded-0{border-radius:0!important}.clearfix:after{clear:both;content:"";display:block}.d-none{display:none!important}.d-inline{display:inline!important}.d-inline-block{display:inline-block!important}.d-block{display:block!important}.d-table{display:table!important}.d-table-row{display:table-row!important}.d-table-cell{display:table-cell!important}.d-flex{display:flex!important}.d-inline-flex{display:inline-flex!important}@media (min-width:576px){.d-sm-none{display:none!important}.d-sm-inline{display:inline!important}.d-sm-inline-block{display:inline-block!important}.d-sm-block{display:block!important}.d-sm-table{display:table!important}.d-sm-table-row{display:table-row!important}.d-sm-table-cell{display:table-cell!important}.d-sm-flex{display:flex!important}.d-sm-inline-flex{display:inline-flex!important}}@media (min-width:768px){.d-md-none{display:none!important}.d-md-inline{display:inline!important}.d-md-inline-block{display:inline-block!important}.d-md-block{display:block!important}.d-md-table{display:table!important}.d-md-table-row{display:table-row!important}.d-md-table-cell{display:table-cell!important}.d-md-flex{display:flex!important}.d-md-inline-flex{display:inline-flex!important}}@media (min-width:992px){.d-lg-none{display:none!important}.d-lg-inline{display:inline!important}.d-lg-inline-block{display:inline-block!important}.d-lg-block{display:block!important}.d-lg-table{display:table!important}.d-lg-table-row{display:table-row!important}.d-lg-table-cell{display:table-cell!important}.d-lg-flex{display:flex!important}.d-lg-inline-flex{display:inline-flex!important}}@media (min-width:1200px){.d-xl-none{display:none!important}.d-xl-inline{display:inline!important}.d-xl-inline-block{display:inline-block!important}.d-xl-block{display:block!important}.d-xl-table{display:table!important}.d-xl-table-row{display:table-row!important}.d-xl-table-cell{display:table-cell!important}.d-xl-flex{display:flex!important}.d-xl-inline-flex{display:inline-flex!important}}@media print{.d-print-none{display:none!important}.d-print-inline{display:inline!important}.d-print-inline-block{display:inline-block!important}.d-print-block{display:block!important}.d-print-table{display:table!important}.d-print-table-row{display:table-row!important}.d-print-table-cell{display:table-cell!important}.d-print-flex{display:flex!important}.d-print-inline-flex{display:inline-flex!important}}.embed-responsive{display:block;overflow:hidden;padding:0;position:relative;width:100%}.embed-responsive:before{content:"";display:block}.embed-responsive .embed-responsive-item,.embed-responsive embed,.embed-responsive iframe,.embed-responsive object,.embed-responsive video{border:0;bottom:0;height:100%;left:0;position:absolute;top:0;width:100%}.embed-responsive-21by9:before{padding-top:42.85714286%}.embed-responsive-16by9:before{padding-top:56.25%}.embed-responsive-4by3:before{padding-top:75%}.embed-responsive-1by1:before{padding-top:100%}.flex-row{flex-direction:row!important}.flex-column{flex-direction:column!important}.flex-row-reverse{flex-direction:row-reverse!important}.flex-column-reverse{flex-direction:column-reverse!important}.flex-wrap{flex-wrap:wrap!important}.flex-nowrap{flex-wrap:nowrap!important}.flex-wrap-reverse{flex-wrap:wrap-reverse!important}.flex-fill{flex:1 1 auto!important}.flex-grow-0{flex-grow:0!important}.flex-grow-1{flex-grow:1!important}.flex-shrink-0{flex-shrink:0!important}.flex-shrink-1{flex-shrink:1!important}.justify-content-start{justify-content:flex-start!important}.justify-content-end{justify-content:flex-end!important}.justify-content-center{justify-content:center!important}.justify-content-between{justify-content:space-between!important}.justify-content-around{justify-content:space-around!important}.align-items-start{align-items:flex-start!important}.align-items-end{align-items:flex-end!important}.align-items-center{align-items:center!important}.align-items-baseline{align-items:baseline!important}.align-items-stretch{align-items:stretch!important}.align-content-start{align-content:flex-start!important}.align-content-end{align-content:flex-end!important}.align-content-center{align-content:center!important}.align-content-between{align-content:space-between!important}.align-content-around{align-content:space-around!important}.align-content-stretch{align-content:stretch!important}.align-self-auto{align-self:auto!important}.align-self-start{align-self:flex-start!important}.align-self-end{align-self:flex-end!important}.align-self-center{align-self:center!important}.align-self-baseline{align-self:baseline!important}.align-self-stretch{align-self:stretch!important}@media (min-width:576px){.flex-sm-row{flex-direction:row!important}.flex-sm-column{flex-direction:column!important}.flex-sm-row-reverse{flex-direction:row-reverse!important}.flex-sm-column-reverse{flex-direction:column-reverse!important}.flex-sm-wrap{flex-wrap:wrap!important}.flex-sm-nowrap{flex-wrap:nowrap!important}.flex-sm-wrap-reverse{flex-wrap:wrap-reverse!important}.flex-sm-fill{flex:1 1 auto!important}.flex-sm-grow-0{flex-grow:0!important}.flex-sm-grow-1{flex-grow:1!important}.flex-sm-shrink-0{flex-shrink:0!important}.flex-sm-shrink-1{flex-shrink:1!important}.justify-content-sm-start{justify-content:flex-start!important}.justify-content-sm-end{justify-content:flex-end!important}.justify-content-sm-center{justify-content:center!important}.justify-content-sm-between{justify-content:space-between!important}.justify-content-sm-around{justify-content:space-around!important}.align-items-sm-start{align-items:flex-start!important}.align-items-sm-end{align-items:flex-end!important}.align-items-sm-center{align-items:center!important}.align-items-sm-baseline{align-items:baseline!important}.align-items-sm-stretch{align-items:stretch!important}.align-content-sm-start{align-content:flex-start!important}.align-content-sm-end{align-content:flex-end!important}.align-content-sm-center{align-content:center!important}.align-content-sm-between{align-content:space-between!important}.align-content-sm-around{align-content:space-around!important}.align-content-sm-stretch{align-content:stretch!important}.align-self-sm-auto{align-self:auto!important}.align-self-sm-start{align-self:flex-start!important}.align-self-sm-end{align-self:flex-end!important}.align-self-sm-center{align-self:center!important}.align-self-sm-baseline{align-self:baseline!important}.align-self-sm-stretch{align-self:stretch!important}}@media (min-width:768px){.flex-md-row{flex-direction:row!important}.flex-md-column{flex-direction:column!important}.flex-md-row-reverse{flex-direction:row-reverse!important}.flex-md-column-reverse{flex-direction:column-reverse!important}.flex-md-wrap{flex-wrap:wrap!important}.flex-md-nowrap{flex-wrap:nowrap!important}.flex-md-wrap-reverse{flex-wrap:wrap-reverse!important}.flex-md-fill{flex:1 1 auto!important}.flex-md-grow-0{flex-grow:0!important}.flex-md-grow-1{flex-grow:1!important}.flex-md-shrink-0{flex-shrink:0!important}.flex-md-shrink-1{flex-shrink:1!important}.justify-content-md-start{justify-content:flex-start!important}.justify-content-md-end{justify-content:flex-end!important}.justify-content-md-center{justify-content:center!important}.justify-content-md-between{justify-content:space-between!important}.justify-content-md-around{justify-content:space-around!important}.align-items-md-start{align-items:flex-start!important}.align-items-md-end{align-items:flex-end!important}.align-items-md-center{align-items:center!important}.align-items-md-baseline{align-items:baseline!important}.align-items-md-stretch{align-items:stretch!important}.align-content-md-start{align-content:flex-start!important}.align-content-md-end{align-content:flex-end!important}.align-content-md-center{align-content:center!important}.align-content-md-between{align-content:space-between!important}.align-content-md-around{align-content:space-around!important}.align-content-md-stretch{align-content:stretch!important}.align-self-md-auto{align-self:auto!important}.align-self-md-start{align-self:flex-start!important}.align-self-md-end{align-self:flex-end!important}.align-self-md-center{align-self:center!important}.align-self-md-baseline{align-self:baseline!important}.align-self-md-stretch{align-self:stretch!important}}@media (min-width:992px){.flex-lg-row{flex-direction:row!important}.flex-lg-column{flex-direction:column!important}.flex-lg-row-reverse{flex-direction:row-reverse!important}.flex-lg-column-reverse{flex-direction:column-reverse!important}.flex-lg-wrap{flex-wrap:wrap!important}.flex-lg-nowrap{flex-wrap:nowrap!important}.flex-lg-wrap-reverse{flex-wrap:wrap-reverse!important}.flex-lg-fill{flex:1 1 auto!important}.flex-lg-grow-0{flex-grow:0!important}.flex-lg-grow-1{flex-grow:1!important}.flex-lg-shrink-0{flex-shrink:0!important}.flex-lg-shrink-1{flex-shrink:1!important}.justify-content-lg-start{justify-content:flex-start!important}.justify-content-lg-end{justify-content:flex-end!important}.justify-content-lg-center{justify-content:center!important}.justify-content-lg-between{justify-content:space-between!important}.justify-content-lg-around{justify-content:space-around!important}.align-items-lg-start{align-items:flex-start!important}.align-items-lg-end{align-items:flex-end!important}.align-items-lg-center{align-items:center!important}.align-items-lg-baseline{align-items:baseline!important}.align-items-lg-stretch{align-items:stretch!important}.align-content-lg-start{align-content:flex-start!important}.align-content-lg-end{align-content:flex-end!important}.align-content-lg-center{align-content:center!important}.align-content-lg-between{align-content:space-between!important}.align-content-lg-around{align-content:space-around!important}.align-content-lg-stretch{align-content:stretch!important}.align-self-lg-auto{align-self:auto!important}.align-self-lg-start{align-self:flex-start!important}.align-self-lg-end{align-self:flex-end!important}.align-self-lg-center{align-self:center!important}.align-self-lg-baseline{align-self:baseline!important}.align-self-lg-stretch{align-self:stretch!important}}@media (min-width:1200px){.flex-xl-row{flex-direction:row!important}.flex-xl-column{flex-direction:column!important}.flex-xl-row-reverse{flex-direction:row-reverse!important}.flex-xl-column-reverse{flex-direction:column-reverse!important}.flex-xl-wrap{flex-wrap:wrap!important}.flex-xl-nowrap{flex-wrap:nowrap!important}.flex-xl-wrap-reverse{flex-wrap:wrap-reverse!important}.flex-xl-fill{flex:1 1 auto!important}.flex-xl-grow-0{flex-grow:0!important}.flex-xl-grow-1{flex-grow:1!important}.flex-xl-shrink-0{flex-shrink:0!important}.flex-xl-shrink-1{flex-shrink:1!important}.justify-content-xl-start{justify-content:flex-start!important}.justify-content-xl-end{justify-content:flex-end!important}.justify-content-xl-center{justify-content:center!important}.justify-content-xl-between{justify-content:space-between!important}.justify-content-xl-around{justify-content:space-around!important}.align-items-xl-start{align-items:flex-start!important}.align-items-xl-end{align-items:flex-end!important}.align-items-xl-center{align-items:center!important}.align-items-xl-baseline{align-items:baseline!important}.align-items-xl-stretch{align-items:stretch!important}.align-content-xl-start{align-content:flex-start!important}.align-content-xl-end{align-content:flex-end!important}.align-content-xl-center{align-content:center!important}.align-content-xl-between{align-content:space-between!important}.align-content-xl-around{align-content:space-around!important}.align-content-xl-stretch{align-content:stretch!important}.align-self-xl-auto{align-self:auto!important}.align-self-xl-start{align-self:flex-start!important}.align-self-xl-end{align-self:flex-end!important}.align-self-xl-center{align-self:center!important}.align-self-xl-baseline{align-self:baseline!important}.align-self-xl-stretch{align-self:stretch!important}}.float-left{float:left!important}.float-right{float:right!important}.float-none{float:none!important}@media (min-width:576px){.float-sm-left{float:left!important}.float-sm-right{float:right!important}.float-sm-none{float:none!important}}@media (min-width:768px){.float-md-left{float:left!important}.float-md-right{float:right!important}.float-md-none{float:none!important}}@media (min-width:992px){.float-lg-left{float:left!important}.float-lg-right{float:right!important}.float-lg-none{float:none!important}}@media (min-width:1200px){.float-xl-left{float:left!important}.float-xl-right{float:right!important}.float-xl-none{float:none!important}}.position-static{position:static!important}.position-relative{position:relative!important}.position-absolute{position:absolute!important}.position-fixed{position:fixed!important}.position-sticky{position:sticky!important}.fixed-top{top:0}.fixed-bottom,.fixed-top{left:0;position:fixed;right:0;z-index:1030}.fixed-bottom{bottom:0}@supports (position:sticky){.sticky-top{position:sticky;top:0;z-index:1020}}.sr-only{clip:rect(0,0,0,0);border:0;height:1px;overflow:hidden;padding:0;position:absolute;white-space:nowrap;width:1px}.sr-only-focusable:active,.sr-only-focusable:focus{clip:auto;height:auto;overflow:visible;position:static;white-space:normal;width:auto}.shadow-sm{box-shadow:0 .125rem .25rem rgba(0,0,0,.075)!important}.shadow{box-shadow:0 .5rem 1rem rgba(0,0,0,.15)!important}.shadow-lg{box-shadow:0 1rem 3rem rgba(0,0,0,.175)!important}.shadow-none{box-shadow:none!important}.w-25{width:25%!important}.w-50{width:50%!important}.w-75{width:75%!important}.w-100{width:100%!important}.w-auto{width:auto!important}.h-25{height:25%!important}.h-50{height:50%!important}.h-75{height:75%!important}.h-100{height:100%!important}.h-auto{height:auto!important}.mw-100{max-width:100%!important}.mh-100{max-height:100%!important}.mt-0,.my-0{margin-top:0!important}.mr-0,.mx-0{margin-right:0!important}.mb-0,.my-0{margin-bottom:0!important}.ml-0,.mx-0{margin-left:0!important}.m-1{margin:.25rem!important}.mt-1,.my-1{margin-top:.25rem!important}.mr-1,.mx-1{margin-right:.25rem!important}.mb-1,.my-1{margin-bottom:.25rem!important}.ml-1,.mx-1{margin-left:.25rem!important}.m-2{margin:.5rem!important}.mt-2,.my-2{margin-top:.5rem!important}.mr-2,.mx-2{margin-right:.5rem!important}.mb-2,.my-2{margin-bottom:.5rem!important}.ml-2,.mx-2{margin-left:.5rem!important}.m-3{margin:1rem!important}.mt-3,.my-3{margin-top:1rem!important}.mr-3,.mx-3{margin-right:1rem!important}.mb-3,.my-3{margin-bottom:1rem!important}.ml-3,.mx-3{margin-left:1rem!important}.m-4{margin:1.5rem!important}.mt-4,.my-4{margin-top:1.5rem!important}.mr-4,.mx-4{margin-right:1.5rem!important}.mb-4,.my-4{margin-bottom:1.5rem!important}.ml-4,.mx-4{margin-left:1.5rem!important}.m-5{margin:3rem!important}.mt-5,.my-5{margin-top:3rem!important}.mr-5,.mx-5{margin-right:3rem!important}.mb-5,.my-5{margin-bottom:3rem!important}.ml-5,.mx-5{margin-left:3rem!important}.pt-0,.py-0{padding-top:0!important}.pr-0,.px-0{padding-right:0!important}.pb-0,.py-0{padding-bottom:0!important}.pl-0,.px-0{padding-left:0!important}.p-1{padding:.25rem!important}.pt-1,.py-1{padding-top:.25rem!important}.pr-1,.px-1{padding-right:.25rem!important}.pb-1,.py-1{padding-bottom:.25rem!important}.pl-1,.px-1{padding-left:.25rem!important}.p-2{padding:.5rem!important}.pt-2,.py-2{padding-top:.5rem!important}.pr-2,.px-2{padding-right:.5rem!important}.pb-2,.py-2{padding-bottom:.5rem!important}.pl-2,.px-2{padding-left:.5rem!important}.p-3{padding:1rem!important}.pt-3,.py-3{padding-top:1rem!important}.pr-3,.px-3{padding-right:1rem!important}.pb-3,.py-3{padding-bottom:1rem!important}.pl-3,.px-3{padding-left:1rem!important}.p-4{padding:1.5rem!important}.pt-4,.py-4{padding-top:1.5rem!important}.pr-4,.px-4{padding-right:1.5rem!important}.pb-4,.py-4{padding-bottom:1.5rem!important}.pl-4,.px-4{padding-left:1.5rem!important}.p-5{padding:3rem!important}.pt-5,.py-5{padding-top:3rem!important}.pr-5,.px-5{padding-right:3rem!important}.pb-5,.py-5{padding-bottom:3rem!important}.pl-5,.px-5{padding-left:3rem!important}.mt-auto,.my-auto{margin-top:auto!important}.mr-auto,.mx-auto{margin-right:auto!important}.mb-auto,.my-auto{margin-bottom:auto!important}.ml-auto,.mx-auto{margin-left:auto!important}@media (min-width:576px){.m-sm-0{margin:0!important}.mt-sm-0,.my-sm-0{margin-top:0!important}.mr-sm-0,.mx-sm-0{margin-right:0!important}.mb-sm-0,.my-sm-0{margin-bottom:0!important}.ml-sm-0,.mx-sm-0{margin-left:0!important}.m-sm-1{margin:.25rem!important}.mt-sm-1,.my-sm-1{margin-top:.25rem!important}.mr-sm-1,.mx-sm-1{margin-right:.25rem!important}.mb-sm-1,.my-sm-1{margin-bottom:.25rem!important}.ml-sm-1,.mx-sm-1{margin-left:.25rem!important}.m-sm-2{margin:.5rem!important}.mt-sm-2,.my-sm-2{margin-top:.5rem!important}.mr-sm-2,.mx-sm-2{margin-right:.5rem!important}.mb-sm-2,.my-sm-2{margin-bottom:.5rem!important}.ml-sm-2,.mx-sm-2{margin-left:.5rem!important}.m-sm-3{margin:1rem!important}.mt-sm-3,.my-sm-3{margin-top:1rem!important}.mr-sm-3,.mx-sm-3{margin-right:1rem!important}.mb-sm-3,.my-sm-3{margin-bottom:1rem!important}.ml-sm-3,.mx-sm-3{margin-left:1rem!important}.m-sm-4{margin:1.5rem!important}.mt-sm-4,.my-sm-4{margin-top:1.5rem!important}.mr-sm-4,.mx-sm-4{margin-right:1.5rem!important}.mb-sm-4,.my-sm-4{margin-bottom:1.5rem!important}.ml-sm-4,.mx-sm-4{margin-left:1.5rem!important}.m-sm-5{margin:3rem!important}.mt-sm-5,.my-sm-5{margin-top:3rem!important}.mr-sm-5,.mx-sm-5{margin-right:3rem!important}.mb-sm-5,.my-sm-5{margin-bottom:3rem!important}.ml-sm-5,.mx-sm-5{margin-left:3rem!important}.p-sm-0{padding:0!important}.pt-sm-0,.py-sm-0{padding-top:0!important}.pr-sm-0,.px-sm-0{padding-right:0!important}.pb-sm-0,.py-sm-0{padding-bottom:0!important}.pl-sm-0,.px-sm-0{padding-left:0!important}.p-sm-1{padding:.25rem!important}.pt-sm-1,.py-sm-1{padding-top:.25rem!important}.pr-sm-1,.px-sm-1{padding-right:.25rem!important}.pb-sm-1,.py-sm-1{padding-bottom:.25rem!important}.pl-sm-1,.px-sm-1{padding-left:.25rem!important}.p-sm-2{padding:.5rem!important}.pt-sm-2,.py-sm-2{padding-top:.5rem!important}.pr-sm-2,.px-sm-2{padding-right:.5rem!important}.pb-sm-2,.py-sm-2{padding-bottom:.5rem!important}.pl-sm-2,.px-sm-2{padding-left:.5rem!important}.p-sm-3{padding:1rem!important}.pt-sm-3,.py-sm-3{padding-top:1rem!important}.pr-sm-3,.px-sm-3{padding-right:1rem!important}.pb-sm-3,.py-sm-3{padding-bottom:1rem!important}.pl-sm-3,.px-sm-3{padding-left:1rem!important}.p-sm-4{padding:1.5rem!important}.pt-sm-4,.py-sm-4{padding-top:1.5rem!important}.pr-sm-4,.px-sm-4{padding-right:1.5rem!important}.pb-sm-4,.py-sm-4{padding-bottom:1.5rem!important}.pl-sm-4,.px-sm-4{padding-left:1.5rem!important}.p-sm-5{padding:3rem!important}.pt-sm-5,.py-sm-5{padding-top:3rem!important}.pr-sm-5,.px-sm-5{padding-right:3rem!important}.pb-sm-5,.py-sm-5{padding-bottom:3rem!important}.pl-sm-5,.px-sm-5{padding-left:3rem!important}.m-sm-auto{margin:auto!important}.mt-sm-auto,.my-sm-auto{margin-top:auto!important}.mr-sm-auto,.mx-sm-auto{margin-right:auto!important}.mb-sm-auto,.my-sm-auto{margin-bottom:auto!important}.ml-sm-auto,.mx-sm-auto{margin-left:auto!important}}@media (min-width:768px){.m-md-0{margin:0!important}.mt-md-0,.my-md-0{margin-top:0!important}.mr-md-0,.mx-md-0{margin-right:0!important}.mb-md-0,.my-md-0{margin-bottom:0!important}.ml-md-0,.mx-md-0{margin-left:0!important}.m-md-1{margin:.25rem!important}.mt-md-1,.my-md-1{margin-top:.25rem!important}.mr-md-1,.mx-md-1{margin-right:.25rem!important}.mb-md-1,.my-md-1{margin-bottom:.25rem!important}.ml-md-1,.mx-md-1{margin-left:.25rem!important}.m-md-2{margin:.5rem!important}.mt-md-2,.my-md-2{margin-top:.5rem!important}.mr-md-2,.mx-md-2{margin-right:.5rem!important}.mb-md-2,.my-md-2{margin-bottom:.5rem!important}.ml-md-2,.mx-md-2{margin-left:.5rem!important}.m-md-3{margin:1rem!important}.mt-md-3,.my-md-3{margin-top:1rem!important}.mr-md-3,.mx-md-3{margin-right:1rem!important}.mb-md-3,.my-md-3{margin-bottom:1rem!important}.ml-md-3,.mx-md-3{margin-left:1rem!important}.m-md-4{margin:1.5rem!important}.mt-md-4,.my-md-4{margin-top:1.5rem!important}.mr-md-4,.mx-md-4{margin-right:1.5rem!important}.mb-md-4,.my-md-4{margin-bottom:1.5rem!important}.ml-md-4,.mx-md-4{margin-left:1.5rem!important}.m-md-5{margin:3rem!important}.mt-md-5,.my-md-5{margin-top:3rem!important}.mr-md-5,.mx-md-5{margin-right:3rem!important}.mb-md-5,.my-md-5{margin-bottom:3rem!important}.ml-md-5,.mx-md-5{margin-left:3rem!important}.p-md-0{padding:0!important}.pt-md-0,.py-md-0{padding-top:0!important}.pr-md-0,.px-md-0{padding-right:0!important}.pb-md-0,.py-md-0{padding-bottom:0!important}.pl-md-0,.px-md-0{padding-left:0!important}.p-md-1{padding:.25rem!important}.pt-md-1,.py-md-1{padding-top:.25rem!important}.pr-md-1,.px-md-1{padding-right:.25rem!important}.pb-md-1,.py-md-1{padding-bottom:.25rem!important}.pl-md-1,.px-md-1{padding-left:.25rem!important}.p-md-2{padding:.5rem!important}.pt-md-2,.py-md-2{padding-top:.5rem!important}.pr-md-2,.px-md-2{padding-right:.5rem!important}.pb-md-2,.py-md-2{padding-bottom:.5rem!important}.pl-md-2,.px-md-2{padding-left:.5rem!important}.p-md-3{padding:1rem!important}.pt-md-3,.py-md-3{padding-top:1rem!important}.pr-md-3,.px-md-3{padding-right:1rem!important}.pb-md-3,.py-md-3{padding-bottom:1rem!important}.pl-md-3,.px-md-3{padding-left:1rem!important}.p-md-4{padding:1.5rem!important}.pt-md-4,.py-md-4{padding-top:1.5rem!important}.pr-md-4,.px-md-4{padding-right:1.5rem!important}.pb-md-4,.py-md-4{padding-bottom:1.5rem!important}.pl-md-4,.px-md-4{padding-left:1.5rem!important}.p-md-5{padding:3rem!important}.pt-md-5,.py-md-5{padding-top:3rem!important}.pr-md-5,.px-md-5{padding-right:3rem!important}.pb-md-5,.py-md-5{padding-bottom:3rem!important}.pl-md-5,.px-md-5{padding-left:3rem!important}.m-md-auto{margin:auto!important}.mt-md-auto,.my-md-auto{margin-top:auto!important}.mr-md-auto,.mx-md-auto{margin-right:auto!important}.mb-md-auto,.my-md-auto{margin-bottom:auto!important}.ml-md-auto,.mx-md-auto{margin-left:auto!important}}@media (min-width:992px){.m-lg-0{margin:0!important}.mt-lg-0,.my-lg-0{margin-top:0!important}.mr-lg-0,.mx-lg-0{margin-right:0!important}.mb-lg-0,.my-lg-0{margin-bottom:0!important}.ml-lg-0,.mx-lg-0{margin-left:0!important}.m-lg-1{margin:.25rem!important}.mt-lg-1,.my-lg-1{margin-top:.25rem!important}.mr-lg-1,.mx-lg-1{margin-right:.25rem!important}.mb-lg-1,.my-lg-1{margin-bottom:.25rem!important}.ml-lg-1,.mx-lg-1{margin-left:.25rem!important}.m-lg-2{margin:.5rem!important}.mt-lg-2,.my-lg-2{margin-top:.5rem!important}.mr-lg-2,.mx-lg-2{margin-right:.5rem!important}.mb-lg-2,.my-lg-2{margin-bottom:.5rem!important}.ml-lg-2,.mx-lg-2{margin-left:.5rem!important}.m-lg-3{margin:1rem!important}.mt-lg-3,.my-lg-3{margin-top:1rem!important}.mr-lg-3,.mx-lg-3{margin-right:1rem!important}.mb-lg-3,.my-lg-3{margin-bottom:1rem!important}.ml-lg-3,.mx-lg-3{margin-left:1rem!important}.m-lg-4{margin:1.5rem!important}.mt-lg-4,.my-lg-4{margin-top:1.5rem!important}.mr-lg-4,.mx-lg-4{margin-right:1.5rem!important}.mb-lg-4,.my-lg-4{margin-bottom:1.5rem!important}.ml-lg-4,.mx-lg-4{margin-left:1.5rem!important}.m-lg-5{margin:3rem!important}.mt-lg-5,.my-lg-5{margin-top:3rem!important}.mr-lg-5,.mx-lg-5{margin-right:3rem!important}.mb-lg-5,.my-lg-5{margin-bottom:3rem!important}.ml-lg-5,.mx-lg-5{margin-left:3rem!important}.p-lg-0{padding:0!important}.pt-lg-0,.py-lg-0{padding-top:0!important}.pr-lg-0,.px-lg-0{padding-right:0!important}.pb-lg-0,.py-lg-0{padding-bottom:0!important}.pl-lg-0,.px-lg-0{padding-left:0!important}.p-lg-1{padding:.25rem!important}.pt-lg-1,.py-lg-1{padding-top:.25rem!important}.pr-lg-1,.px-lg-1{padding-right:.25rem!important}.pb-lg-1,.py-lg-1{padding-bottom:.25rem!important}.pl-lg-1,.px-lg-1{padding-left:.25rem!important}.p-lg-2{padding:.5rem!important}.pt-lg-2,.py-lg-2{padding-top:.5rem!important}.pr-lg-2,.px-lg-2{padding-right:.5rem!important}.pb-lg-2,.py-lg-2{padding-bottom:.5rem!important}.pl-lg-2,.px-lg-2{padding-left:.5rem!important}.p-lg-3{padding:1rem!important}.pt-lg-3,.py-lg-3{padding-top:1rem!important}.pr-lg-3,.px-lg-3{padding-right:1rem!important}.pb-lg-3,.py-lg-3{padding-bottom:1rem!important}.pl-lg-3,.px-lg-3{padding-left:1rem!important}.p-lg-4{padding:1.5rem!important}.pt-lg-4,.py-lg-4{padding-top:1.5rem!important}.pr-lg-4,.px-lg-4{padding-right:1.5rem!important}.pb-lg-4,.py-lg-4{padding-bottom:1.5rem!important}.pl-lg-4,.px-lg-4{padding-left:1.5rem!important}.p-lg-5{padding:3rem!important}.pt-lg-5,.py-lg-5{padding-top:3rem!important}.pr-lg-5,.px-lg-5{padding-right:3rem!important}.pb-lg-5,.py-lg-5{padding-bottom:3rem!important}.pl-lg-5,.px-lg-5{padding-left:3rem!important}.m-lg-auto{margin:auto!important}.mt-lg-auto,.my-lg-auto{margin-top:auto!important}.mr-lg-auto,.mx-lg-auto{margin-right:auto!important}.mb-lg-auto,.my-lg-auto{margin-bottom:auto!important}.ml-lg-auto,.mx-lg-auto{margin-left:auto!important}}@media (min-width:1200px){.m-xl-0{margin:0!important}.mt-xl-0,.my-xl-0{margin-top:0!important}.mr-xl-0,.mx-xl-0{margin-right:0!important}.mb-xl-0,.my-xl-0{margin-bottom:0!important}.ml-xl-0,.mx-xl-0{margin-left:0!important}.m-xl-1{margin:.25rem!important}.mt-xl-1,.my-xl-1{margin-top:.25rem!important}.mr-xl-1,.mx-xl-1{margin-right:.25rem!important}.mb-xl-1,.my-xl-1{margin-bottom:.25rem!important}.ml-xl-1,.mx-xl-1{margin-left:.25rem!important}.m-xl-2{margin:.5rem!important}.mt-xl-2,.my-xl-2{margin-top:.5rem!important}.mr-xl-2,.mx-xl-2{margin-right:.5rem!important}.mb-xl-2,.my-xl-2{margin-bottom:.5rem!important}.ml-xl-2,.mx-xl-2{margin-left:.5rem!important}.m-xl-3{margin:1rem!important}.mt-xl-3,.my-xl-3{margin-top:1rem!important}.mr-xl-3,.mx-xl-3{margin-right:1rem!important}.mb-xl-3,.my-xl-3{margin-bottom:1rem!important}.ml-xl-3,.mx-xl-3{margin-left:1rem!important}.m-xl-4{margin:1.5rem!important}.mt-xl-4,.my-xl-4{margin-top:1.5rem!important}.mr-xl-4,.mx-xl-4{margin-right:1.5rem!important}.mb-xl-4,.my-xl-4{margin-bottom:1.5rem!important}.ml-xl-4,.mx-xl-4{margin-left:1.5rem!important}.m-xl-5{margin:3rem!important}.mt-xl-5,.my-xl-5{margin-top:3rem!important}.mr-xl-5,.mx-xl-5{margin-right:3rem!important}.mb-xl-5,.my-xl-5{margin-bottom:3rem!important}.ml-xl-5,.mx-xl-5{margin-left:3rem!important}.p-xl-0{padding:0!important}.pt-xl-0,.py-xl-0{padding-top:0!important}.pr-xl-0,.px-xl-0{padding-right:0!important}.pb-xl-0,.py-xl-0{padding-bottom:0!important}.pl-xl-0,.px-xl-0{padding-left:0!important}.p-xl-1{padding:.25rem!important}.pt-xl-1,.py-xl-1{padding-top:.25rem!important}.pr-xl-1,.px-xl-1{padding-right:.25rem!important}.pb-xl-1,.py-xl-1{padding-bottom:.25rem!important}.pl-xl-1,.px-xl-1{padding-left:.25rem!important}.p-xl-2{padding:.5rem!important}.pt-xl-2,.py-xl-2{padding-top:.5rem!important}.pr-xl-2,.px-xl-2{padding-right:.5rem!important}.pb-xl-2,.py-xl-2{padding-bottom:.5rem!important}.pl-xl-2,.px-xl-2{padding-left:.5rem!important}.p-xl-3{padding:1rem!important}.pt-xl-3,.py-xl-3{padding-top:1rem!important}.pr-xl-3,.px-xl-3{padding-right:1rem!important}.pb-xl-3,.py-xl-3{padding-bottom:1rem!important}.pl-xl-3,.px-xl-3{padding-left:1rem!important}.p-xl-4{padding:1.5rem!important}.pt-xl-4,.py-xl-4{padding-top:1.5rem!important}.pr-xl-4,.px-xl-4{padding-right:1.5rem!important}.pb-xl-4,.py-xl-4{padding-bottom:1.5rem!important}.pl-xl-4,.px-xl-4{padding-left:1.5rem!important}.p-xl-5{padding:3rem!important}.pt-xl-5,.py-xl-5{padding-top:3rem!important}.pr-xl-5,.px-xl-5{padding-right:3rem!important}.pb-xl-5,.py-xl-5{padding-bottom:3rem!important}.pl-xl-5,.px-xl-5{padding-left:3rem!important}.m-xl-auto{margin:auto!important}.mt-xl-auto,.my-xl-auto{margin-top:auto!important}.mr-xl-auto,.mx-xl-auto{margin-right:auto!important}.mb-xl-auto,.my-xl-auto{margin-bottom:auto!important}.ml-xl-auto,.mx-xl-auto{margin-left:auto!important}}.text-monospace{font-family:SFMono-Regular,Menlo,Monaco,Consolas,Liberation Mono,Courier New,monospace}.text-justify{text-align:justify!important}.text-nowrap{white-space:nowrap!important}.text-truncate{overflow:hidden;text-overflow:ellipsis;white-space:nowrap}.text-left{text-align:left!important}.text-right{text-align:right!important}.text-center{text-align:center!important}@media (min-width:576px){.text-sm-left{text-align:left!important}.text-sm-right{text-align:right!important}.text-sm-center{text-align:center!important}}@media (min-width:768px){.text-md-left{text-align:left!important}.text-md-right{text-align:right!important}.text-md-center{text-align:center!important}}@media (min-width:992px){.text-lg-left{text-align:left!important}.text-lg-right{text-align:right!important}.text-lg-center{text-align:center!important}}@media (min-width:1200px){.text-xl-left{text-align:left!important}.text-xl-right{text-align:right!important}.text-xl-center{text-align:center!important}}.text-lowercase{text-transform:lowercase!important}.text-uppercase{text-transform:uppercase!important}.text-capitalize{text-transform:capitalize!important}.font-weight-light{font-weight:300!important}.font-weight-normal{font-weight:400!important}.font-weight-bold{font-weight:700!important}.font-italic{font-style:italic!important}.text-white{color:#fff!important}.text-primary{color:#ff630f!important}a.text-primary:focus,a.text-primary:hover{color:#db4d00!important}.text-secondary{color:#1f2937!important}a.text-secondary:focus,a.text-secondary:hover{color:#0d1116!important}.text-success{color:#10b981!important}a.text-success:focus,a.text-success:hover{color:#0c8a60!important}.text-info{color:#3b82f6!important}a.text-info:focus,a.text-info:hover{color:#0b63f3!important}.text-warning{color:#f59e0b!important}a.text-warning:focus,a.text-warning:hover{color:#c57f08!important}.text-danger{color:#ef4444!important}a.text-danger:focus,a.text-danger:hover{color:#eb1515!important}.text-light{color:#6b7280!important}a.text-light:focus,a.text-light:hover{color:#545964!important}.text-dark{color:#111827!important}a.text-dark:focus,a.text-dark:hover{color:#020203!important}.text-gray-100{color:#f3f4f6!important}a.text-gray-100:focus,a.text-gray-100:hover{color:#d6d9e0!important}.text-gray-200{color:#e5e7eb!important}a.text-gray-200:focus,a.text-gray-200:hover{color:#c8ccd5!important}.text-gray-300{color:#d1d5db!important}a.text-gray-300:focus,a.text-gray-300:hover{color:#b4bbc5!important}.text-gray-400{color:#9ca3af!important}a.text-gray-400:focus,a.text-gray-400:hover{color:#808998!important}.text-gray-500{color:#6b7280!important}a.text-gray-500:focus,a.text-gray-500:hover{color:#545964!important}.text-gray-600{color:#4b5563!important}a.text-gray-600:focus,a.text-gray-600:hover{color:#353c46!important}.text-gray-700{color:#374151!important}a.text-gray-700:focus,a.text-gray-700:hover{color:#222933!important}.text-gray-800{color:#1f2937!important}a.text-gray-800:focus,a.text-gray-800:hover{color:#0d1116!important}.text-gray-900{color:#111827!important}a.text-gray-900:focus,a.text-gray-900:hover{color:#020203!important}.text-body{color:#111827!important}.text-muted{color:#4b5563!important}.text-black-50{color:rgba(0,0,0,.5)!important}.text-white-50{color:hsla(0,0%,100%,.5)!important}.text-hide{background-color:transparent;border:0;color:transparent;font:0/0 a;text-shadow:none}.visible{visibility:visible!important}.invisible{visibility:hidden!important}@media print{*,:after,:before{box-shadow:none!important;text-shadow:none!important}a:not(.btn){text-decoration:underline}abbr[title]:after{content:" (" attr(title) ")"}pre{white-space:pre-wrap!important}blockquote,pre{border:1px solid #6b7280;page-break-inside:avoid}thead{display:table-header-group}img,tr{page-break-inside:avoid}h2,h3,p{orphans:3;widows:3}h2,h3{page-break-after:avoid}@page{size:a3}.container,body{min-width:992px!important}.navbar{display:none}.badge{border:1px solid #000}.table{border-collapse:collapse!important}.table td,.table th{background-color:#fff!important}.table-bordered td,.table-bordered th{border:1px solid #d1d5db!important}.table-dark{color:inherit}.table-dark tbody+tbody,.table-dark td,.table-dark th,.table-dark thead th{border-color:#d1d5db}.table .thead-dark th{border-color:#d1d5db;color:inherit}}[dir=rtl] .text-left{text-align:right!important}[dir=rtl] .text-right{text-align:left!important}@media (min-width:576px){[dir=rtl] .text-sm-left{text-align:right!important}[dir=rtl] .text-sm-right{text-align:left!important}}@media (min-width:768px){[dir=rtl] .text-md-left{text-align:right!important}[dir=rtl] .text-md-right{text-align:left!important}}@media (min-width:992px){[dir=rtl] .text-lg-left{text-align:right!important}[dir=rtl] .text-lg-right{text-align:left!important}}@media (min-width:1200px){[dir=rtl] .text-xl-left{text-align:right!important}[dir=rtl] .text-xl-right{text-align:left!important}}[dir=rtl] .float-left{float:right!important}[dir=rtl] .float-right{float:left!important}@media (min-width:576px){[dir=rtl] .float-sm-left{float:right!important}[dir=rtl] .float-sm-right{float:left!important}}@media (min-width:768px){[dir=rtl] .float-md-left{float:right!important}[dir=rtl] .float-md-right{float:left!important}}@media (min-width:992px){[dir=rtl] .float-lg-left{float:right!important}[dir=rtl] .float-lg-right{float:left!important}}@media (min-width:1200px){[dir=rtl] .float-xl-left{float:right!important}[dir=rtl] .float-xl-right{float:left!important}}[dir=rtl] .mr-0,[dir=rtl] .mx-0{margin-left:0!important;margin-right:unset!important}[dir=rtl] .ml-0,[dir=rtl] .mx-0{margin-left:unset!important;margin-right:0!important}[dir=rtl] .mr-1,[dir=rtl] .mx-1{margin-left:.25rem!important;margin-right:unset!important}[dir=rtl] .ml-1,[dir=rtl] .mx-1{margin-left:unset!important;margin-right:.25rem!important}[dir=rtl] .mr-2,[dir=rtl] .mx-2{margin-left:.5rem!important;margin-right:unset!important}[dir=rtl] .ml-2,[dir=rtl] .mx-2{margin-left:unset!important;margin-right:.5rem!important}[dir=rtl] .mr-3,[dir=rtl] .mx-3{margin-left:1rem!important;margin-right:unset!important}[dir=rtl] .ml-3,[dir=rtl] .mx-3{margin-left:unset!important;margin-right:1rem!important}[dir=rtl] .mr-4,[dir=rtl] .mx-4{margin-left:1.5rem!important;margin-right:unset!important}[dir=rtl] .ml-4,[dir=rtl] .mx-4{margin-left:unset!important;margin-right:1.5rem!important}[dir=rtl] .mr-5,[dir=rtl] .mx-5{margin-left:3rem!important;margin-right:unset!important}[dir=rtl] .ml-5,[dir=rtl] .mx-5{margin-left:unset!important;margin-right:3rem!important}[dir=rtl] .pr-0,[dir=rtl] .px-0{margin-right:unset!important;padding-left:0!important}[dir=rtl] .pl-0,[dir=rtl] .px-0{margin-left:unset!important;padding-right:0!important}[dir=rtl] .pr-1,[dir=rtl] .px-1{margin-right:unset!important;padding-left:.25rem!important}[dir=rtl] .pl-1,[dir=rtl] .px-1{margin-left:unset!important;padding-right:.25rem!important}[dir=rtl] .pr-2,[dir=rtl] .px-2{margin-right:unset!important;padding-left:.5rem!important}[dir=rtl] .pl-2,[dir=rtl] .px-2{margin-left:unset!important;padding-right:.5rem!important}[dir=rtl] .pr-3,[dir=rtl] .px-3{margin-right:unset!important;padding-left:1rem!important}[dir=rtl] .pl-3,[dir=rtl] .px-3{margin-left:unset!important;padding-right:1rem!important}[dir=rtl] .pr-4,[dir=rtl] .px-4{margin-right:unset!important;padding-left:1.5rem!important}[dir=rtl] .pl-4,[dir=rtl] .px-4{margin-left:unset!important;padding-right:1.5rem!important}[dir=rtl] .pr-5,[dir=rtl] .px-5{margin-right:unset!important;padding-left:3rem!important}[dir=rtl] .pl-5,[dir=rtl] .px-5{margin-left:unset!important;padding-right:3rem!important}@media (min-width:576px){[dir=rtl] .mr-sm-0,[dir=rtl] .mx-sm-0{margin-left:0!important;margin-right:unset!important}[dir=rtl] .ml-sm-0,[dir=rtl] .mx-sm-0{margin-left:unset!important;margin-right:0!important}[dir=rtl] .mr-sm-1,[dir=rtl] .mx-sm-1{margin-left:.25rem!important;margin-right:unset!important}[dir=rtl] .ml-sm-1,[dir=rtl] .mx-sm-1{margin-left:unset!important;margin-right:.25rem!important}[dir=rtl] .mr-sm-2,[dir=rtl] .mx-sm-2{margin-left:.5rem!important;margin-right:unset!important}[dir=rtl] .ml-sm-2,[dir=rtl] .mx-sm-2{margin-left:unset!important;margin-right:.5rem!important}[dir=rtl] .mr-sm-3,[dir=rtl] .mx-sm-3{margin-left:1rem!important;margin-right:unset!important}[dir=rtl] .ml-sm-3,[dir=rtl] .mx-sm-3{margin-left:unset!important;margin-right:1rem!important}[dir=rtl] .mr-sm-4,[dir=rtl] .mx-sm-4{margin-left:1.5rem!important;margin-right:unset!important}[dir=rtl] .ml-sm-4,[dir=rtl] .mx-sm-4{margin-left:unset!important;margin-right:1.5rem!important}[dir=rtl] .mr-sm-5,[dir=rtl] .mx-sm-5{margin-left:3rem!important;margin-right:unset!important}[dir=rtl] .ml-sm-5,[dir=rtl] .mx-sm-5{margin-left:unset!important;margin-right:3rem!important}[dir=rtl] .pr-sm-0,[dir=rtl] .px-sm-0{margin-right:unset!important;padding-left:0!important}[dir=rtl] .pl-sm-0,[dir=rtl] .px-sm-0{margin-left:unset!important;padding-right:0!important}[dir=rtl] .pr-sm-1,[dir=rtl] .px-sm-1{margin-right:unset!important;padding-left:.25rem!important}[dir=rtl] .pl-sm-1,[dir=rtl] .px-sm-1{margin-left:unset!important;padding-right:.25rem!important}[dir=rtl] .pr-sm-2,[dir=rtl] .px-sm-2{margin-right:unset!important;padding-left:.5rem!important}[dir=rtl] .pl-sm-2,[dir=rtl] .px-sm-2{margin-left:unset!important;padding-right:.5rem!important}[dir=rtl] .pr-sm-3,[dir=rtl] .px-sm-3{margin-right:unset!important;padding-left:1rem!important}[dir=rtl] .pl-sm-3,[dir=rtl] .px-sm-3{margin-left:unset!important;padding-right:1rem!important}[dir=rtl] .pr-sm-4,[dir=rtl] .px-sm-4{margin-right:unset!important;padding-left:1.5rem!important}[dir=rtl] .pl-sm-4,[dir=rtl] .px-sm-4{margin-left:unset!important;padding-right:1.5rem!important}[dir=rtl] .pr-sm-5,[dir=rtl] .px-sm-5{margin-right:unset!important;padding-left:3rem!important}[dir=rtl] .pl-sm-5,[dir=rtl] .px-sm-5{margin-left:unset!important;padding-right:3rem!important}}@media (min-width:768px){[dir=rtl] .mr-md-0,[dir=rtl] .mx-md-0{margin-left:0!important;margin-right:unset!important}[dir=rtl] .ml-md-0,[dir=rtl] .mx-md-0{margin-left:unset!important;margin-right:0!important}[dir=rtl] .mr-md-1,[dir=rtl] .mx-md-1{margin-left:.25rem!important;margin-right:unset!important}[dir=rtl] .ml-md-1,[dir=rtl] .mx-md-1{margin-left:unset!important;margin-right:.25rem!important}[dir=rtl] .mr-md-2,[dir=rtl] .mx-md-2{margin-left:.5rem!important;margin-right:unset!important}[dir=rtl] .ml-md-2,[dir=rtl] .mx-md-2{margin-left:unset!important;margin-right:.5rem!important}[dir=rtl] .mr-md-3,[dir=rtl] .mx-md-3{margin-left:1rem!important;margin-right:unset!important}[dir=rtl] .ml-md-3,[dir=rtl] .mx-md-3{margin-left:unset!important;margin-right:1rem!important}[dir=rtl] .mr-md-4,[dir=rtl] .mx-md-4{margin-left:1.5rem!important;margin-right:unset!important}[dir=rtl] .ml-md-4,[dir=rtl] .mx-md-4{margin-left:unset!important;margin-right:1.5rem!important}[dir=rtl] .mr-md-5,[dir=rtl] .mx-md-5{margin-left:3rem!important;margin-right:unset!important}[dir=rtl] .ml-md-5,[dir=rtl] .mx-md-5{margin-left:unset!important;margin-right:3rem!important}[dir=rtl] .pr-md-0,[dir=rtl] .px-md-0{margin-right:unset!important;padding-left:0!important}[dir=rtl] .pl-md-0,[dir=rtl] .px-md-0{margin-left:unset!important;padding-right:0!important}[dir=rtl] .pr-md-1,[dir=rtl] .px-md-1{margin-right:unset!important;padding-left:.25rem!important}[dir=rtl] .pl-md-1,[dir=rtl] .px-md-1{margin-left:unset!important;padding-right:.25rem!important}[dir=rtl] .pr-md-2,[dir=rtl] .px-md-2{margin-right:unset!important;padding-left:.5rem!important}[dir=rtl] .pl-md-2,[dir=rtl] .px-md-2{margin-left:unset!important;padding-right:.5rem!important}[dir=rtl] .pr-md-3,[dir=rtl] .px-md-3{margin-right:unset!important;padding-left:1rem!important}[dir=rtl] .pl-md-3,[dir=rtl] .px-md-3{margin-left:unset!important;padding-right:1rem!important}[dir=rtl] .pr-md-4,[dir=rtl] .px-md-4{margin-right:unset!important;padding-left:1.5rem!important}[dir=rtl] .pl-md-4,[dir=rtl] .px-md-4{margin-left:unset!important;padding-right:1.5rem!important}[dir=rtl] .pr-md-5,[dir=rtl] .px-md-5{margin-right:unset!important;padding-left:3rem!important}[dir=rtl] .pl-md-5,[dir=rtl] .px-md-5{margin-left:unset!important;padding-right:3rem!important}}@media (min-width:992px){[dir=rtl] .mr-lg-0,[dir=rtl] .mx-lg-0{margin-left:0!important;margin-right:unset!important}[dir=rtl] .ml-lg-0,[dir=rtl] .mx-lg-0{margin-left:unset!important;margin-right:0!important}[dir=rtl] .mr-lg-1,[dir=rtl] .mx-lg-1{margin-left:.25rem!important;margin-right:unset!important}[dir=rtl] .ml-lg-1,[dir=rtl] .mx-lg-1{margin-left:unset!important;margin-right:.25rem!important}[dir=rtl] .mr-lg-2,[dir=rtl] .mx-lg-2{margin-left:.5rem!important;margin-right:unset!important}[dir=rtl] .ml-lg-2,[dir=rtl] .mx-lg-2{margin-left:unset!important;margin-right:.5rem!important}[dir=rtl] .mr-lg-3,[dir=rtl] .mx-lg-3{margin-left:1rem!important;margin-right:unset!important}[dir=rtl] .ml-lg-3,[dir=rtl] .mx-lg-3{margin-left:unset!important;margin-right:1rem!important}[dir=rtl] .mr-lg-4,[dir=rtl] .mx-lg-4{margin-left:1.5rem!important;margin-right:unset!important}[dir=rtl] .ml-lg-4,[dir=rtl] .mx-lg-4{margin-left:unset!important;margin-right:1.5rem!important}[dir=rtl] .mr-lg-5,[dir=rtl] .mx-lg-5{margin-left:3rem!important;margin-right:unset!important}[dir=rtl] .ml-lg-5,[dir=rtl] .mx-lg-5{margin-left:unset!important;margin-right:3rem!important}[dir=rtl] .pr-lg-0,[dir=rtl] .px-lg-0{margin-right:unset!important;padding-left:0!important}[dir=rtl] .pl-lg-0,[dir=rtl] .px-lg-0{margin-left:unset!important;padding-right:0!important}[dir=rtl] .pr-lg-1,[dir=rtl] .px-lg-1{margin-right:unset!important;padding-left:.25rem!important}[dir=rtl] .pl-lg-1,[dir=rtl] .px-lg-1{margin-left:unset!important;padding-right:.25rem!important}[dir=rtl] .pr-lg-2,[dir=rtl] .px-lg-2{margin-right:unset!important;padding-left:.5rem!important}[dir=rtl] .pl-lg-2,[dir=rtl] .px-lg-2{margin-left:unset!important;padding-right:.5rem!important}[dir=rtl] .pr-lg-3,[dir=rtl] .px-lg-3{margin-right:unset!important;padding-left:1rem!important}[dir=rtl] .pl-lg-3,[dir=rtl] .px-lg-3{margin-left:unset!important;padding-right:1rem!important}[dir=rtl] .pr-lg-4,[dir=rtl] .px-lg-4{margin-right:unset!important;padding-left:1.5rem!important}[dir=rtl] .pl-lg-4,[dir=rtl] .px-lg-4{margin-left:unset!important;padding-right:1.5rem!important}[dir=rtl] .pr-lg-5,[dir=rtl] .px-lg-5{margin-right:unset!important;padding-left:3rem!important}[dir=rtl] .pl-lg-5,[dir=rtl] .px-lg-5{margin-left:unset!important;padding-right:3rem!important}}@media (min-width:1200px){[dir=rtl] .mr-xl-0,[dir=rtl] .mx-xl-0{margin-left:0!important;margin-right:unset!important}[dir=rtl] .ml-xl-0,[dir=rtl] .mx-xl-0{margin-left:unset!important;margin-right:0!important}[dir=rtl] .mr-xl-1,[dir=rtl] .mx-xl-1{margin-left:.25rem!important;margin-right:unset!important}[dir=rtl] .ml-xl-1,[dir=rtl] .mx-xl-1{margin-left:unset!important;margin-right:.25rem!important}[dir=rtl] .mr-xl-2,[dir=rtl] .mx-xl-2{margin-left:.5rem!important;margin-right:unset!important}[dir=rtl] .ml-xl-2,[dir=rtl] .mx-xl-2{margin-left:unset!important;margin-right:.5rem!important}[dir=rtl] .mr-xl-3,[dir=rtl] .mx-xl-3{margin-left:1rem!important;margin-right:unset!important}[dir=rtl] .ml-xl-3,[dir=rtl] .mx-xl-3{margin-left:unset!important;margin-right:1rem!important}[dir=rtl] .mr-xl-4,[dir=rtl] .mx-xl-4{margin-left:1.5rem!important;margin-right:unset!important}[dir=rtl] .ml-xl-4,[dir=rtl] .mx-xl-4{margin-left:unset!important;margin-right:1.5rem!important}[dir=rtl] .mr-xl-5,[dir=rtl] .mx-xl-5{margin-left:3rem!important;margin-right:unset!important}[dir=rtl] .ml-xl-5,[dir=rtl] .mx-xl-5{margin-left:unset!important;margin-right:3rem!important}[dir=rtl] .pr-xl-0,[dir=rtl] .px-xl-0{margin-right:unset!important;padding-left:0!important}[dir=rtl] .pl-xl-0,[dir=rtl] .px-xl-0{margin-left:unset!important;padding-right:0!important}[dir=rtl] .pr-xl-1,[dir=rtl] .px-xl-1{margin-right:unset!important;padding-left:.25rem!important}[dir=rtl] .pl-xl-1,[dir=rtl] .px-xl-1{margin-left:unset!important;padding-right:.25rem!important}[dir=rtl] .pr-xl-2,[dir=rtl] .px-xl-2{margin-right:unset!important;padding-left:.5rem!important}[dir=rtl] .pl-xl-2,[dir=rtl] .px-xl-2{margin-left:unset!important;padding-right:.5rem!important}[dir=rtl] .pr-xl-3,[dir=rtl] .px-xl-3{margin-right:unset!important;padding-left:1rem!important}[dir=rtl] .pl-xl-3,[dir=rtl] .px-xl-3{margin-left:unset!important;padding-right:1rem!important}[dir=rtl] .pr-xl-4,[dir=rtl] .px-xl-4{margin-right:unset!important;padding-left:1.5rem!important}[dir=rtl] .pl-xl-4,[dir=rtl] .px-xl-4{margin-left:unset!important;padding-right:1.5rem!important}[dir=rtl] .pr-xl-5,[dir=rtl] .px-xl-5{margin-right:unset!important;padding-left:3rem!important}[dir=rtl] .pl-xl-5,[dir=rtl] .px-xl-5{margin-left:unset!important;padding-right:3rem!important}}[dir=rtl] .input-group>.input-group-append:last-child>.btn:not(:last-child):not(.dropdown-toggle),[dir=rtl] .input-group>.input-group-append:last-child>.input-group-text:not(:last-child),[dir=rtl] .input-group>.input-group-append:not(:last-child)>.btn,[dir=rtl] .input-group>.input-group-append:not(:last-child)>.input-group-text,[dir=rtl] .input-group>.input-group-prepend>.btn,[dir=rtl] .input-group>.input-group-prepend>.input-group-text{border-bottom-left-radius:0;border-bottom-right-radius:.25rem;border-top-left-radius:0;border-top-right-radius:.25rem}[dir=rtl] .input-group>.input-group-append>.btn,[dir=rtl] .input-group>.input-group-append>.input-group-text,[dir=rtl] .input-group>.input-group-prepend:first-child>.btn:not(:first-child),[dir=rtl] .input-group>.input-group-prepend:first-child>.input-group-text:not(:first-child),[dir=rtl] .input-group>.input-group-prepend:not(:first-child)>.btn,[dir=rtl] .input-group>.input-group-prepend:not(:first-child)>.input-group-text{border-bottom-left-radius:.25rem;border-bottom-right-radius:0;border-top-left-radius:.25rem;border-top-right-radius:0}[dir=rtl] .input-group>.custom-select:not(:last-child),[dir=rtl] .input-group>.form-control:not(:last-child){border-bottom-left-radius:0;border-bottom-right-radius:.25rem;border-top-left-radius:0;border-top-right-radius:.25rem}[dir=rtl] .input-group>.custom-select:not(:first-child),[dir=rtl] .input-group>.form-control:not(:first-child){border-bottom-left-radius:.25rem;border-bottom-right-radius:0;border-top-left-radius:.25rem;border-top-right-radius:0}[dir=rtl] .btn-group>.btn-group:not(:first-child)>.btn,[dir=rtl] .btn-group>.btn-group:not(:last-child)>.btn,[dir=rtl] .btn-group>.btn:not(:first-child),[dir=rtl] .btn-group>.btn:not(:last-child):not(.dropdown-toggle){border-radius:0}.gradient-purple-indigo,.sidebar-gradient-purple-indigo .sidebar-left{background-color:#8b5cf6;background-image:-o-linear-gradient(-154deg,#8b5cf6 0,#33214b 100%);background:linear-gradient(-154deg,#8b5cf6,#33214b);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="$from",endColorstr="$to",GradientType=1)}.btn.gradient-purple-indigo.active,.btn.gradient-purple-indigo:active{background-color:#8b5cf6;background-image:-o-linear-gradient(-90deg,#8b5cf6 0,#33214b 100%);background:linear-gradient(-90deg,#8b5cf6,#33214b);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="$from",endColorstr="$to",GradientType=1)}.gradient-black-blue,.sidebar-gradient-black-blue .sidebar-left{background-color:#004e92;background-image:-o-linear-gradient(-154deg,#004e92 0,#000428 100%);background:linear-gradient(-154deg,#004e92,#000428);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="$from",endColorstr="$to",GradientType=1)}.btn.gradient-black-blue.active,.btn.gradient-black-blue:active{background-color:#004e92;background-image:-o-linear-gradient(-90deg,#004e92 0,#000428 100%);background:linear-gradient(-90deg,#004e92,#000428);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="$from",endColorstr="$to",GradientType=1)}.gradient-black-gray,.sidebar-gradient-black-gray .sidebar-left{background-color:#404040;background-image:-o-linear-gradient(-154deg,#404040 0,#000 100%);background:linear-gradient(-154deg,#404040,#000);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="$from",endColorstr="$to",GradientType=1)}.btn.gradient-black-gray.active,.btn.gradient-black-gray:active{background-color:#404040;background-image:-o-linear-gradient(-90deg,#404040 0,#000 100%);background:linear-gradient(-90deg,#404040,#000);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="$from",endColorstr="$to",GradientType=1)}.gradient-steel-gray,.sidebar-gradient-steel-gray .sidebar-left{background-color:#616d86;background-image:-o-linear-gradient(-154deg,#616d86 0,#1f1c2c 100%);background:linear-gradient(-154deg,#616d86,#1f1c2c);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="$from",endColorstr="$to",GradientType=1)}.btn.gradient-steel-gray.active,.btn.gradient-steel-gray:active{background-color:#616d86;background-image:-o-linear-gradient(-90deg,#616d86 0,#1f1c2c 100%);background:linear-gradient(-90deg,#616d86,#1f1c2c);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="$from",endColorstr="$to",GradientType=1)}.blue,.sidebar-blue .sidebar-left{background:#3b82f6}.midnight-blue,.sidebar-midnight-blue .sidebar-left{background:#0c0c3c}.indigo,.sidebar-indigo .sidebar-left{background:#6366f1}.dark-purple,.sidebar-dark-purple .sidebar-left{background:#322740}.purple,.sidebar-purple .sidebar-left{background:#8b5cf6}.pink,.sidebar-pink .sidebar-left{background:#ec4899}.red,.sidebar-red .sidebar-left{background:#ef4444}.orange,.sidebar-orange .sidebar-left{background:#f97316}.sidebar-yellow .sidebar-left,.yellow{background:#f59e0b}.green,.sidebar-green .sidebar-left{background:#10b981}.sidebar-teal .sidebar-left,.teal{background:#14b8a6}.cyan,.sidebar-cyan .sidebar-left{background:#06b6d4}.gray,.sidebar-gray .sidebar-left{background:#71717a}.sidebar-slate-gray .sidebar-left,.slate-gray{background:#64748b}.blue-50{background-color:#fff}.text-blue-50{color:#000}.blue-100{background-color:#fefeff}.text-blue-100{color:#000}.blue-200{background-color:#cddffd}.text-blue-200{color:#000}.blue-300{background-color:#9dc0fa}.text-blue-300{color:#000}.blue-400{background-color:#6ca1f8}.text-blue-400{color:#000}.blue-500{background-color:#3b82f6}.text-blue-500{color:#000}.blue-600{background-color:#0b63f3}.text-blue-600{color:#000}.blue-700{background-color:#094fc2}.text-blue-700{color:#fff}.blue-800{background-color:#073b91}.text-blue-800{color:#fff}.blue-900{background-color:#042761}.text-blue-900{color:#fff}.indigo-50{background-color:#fff}.text-indigo-50{color:#000}.indigo-100{background-color:#fff}.text-indigo-100{color:#000}.indigo-200{background-color:#eff0fe}.text-indigo-200{color:#000}.indigo-300{background-color:#c1c2f9}.text-indigo-300{color:#000}.indigo-400{background-color:#9294f5}.text-indigo-400{color:#000}.indigo-500{background-color:#6366f1}.text-indigo-500{color:#000}.indigo-600{background-color:#3438ed}.text-indigo-600{color:#000}.indigo-700{background-color:#1418da}.text-indigo-700{color:#000}.indigo-800{background-color:#0f13ac}.text-indigo-800{color:#fff}.indigo-900{background-color:#0b0e7d}.text-indigo-900{color:#fff}.gray-dark-50{background-color:#93a7c2}.text-gray-dark-50{color:#000}.gray-dark-100{background-color:#728cb0}.text-gray-dark-100{color:#000}.gray-dark-200{background-color:#567299}.text-gray-dark-200{color:#000}.gray-dark-300{background-color:#445a78}.text-gray-dark-300{color:#fff}.gray-dark-400{background-color:#314158}.text-gray-dark-400{color:#fff}.gray-dark-500{background-color:#1f2937}.text-gray-dark-500{color:#fff}.gray-dark-600{background-color:#0d1116}.text-gray-dark-600{color:#fff}.gray-dark-700{background-color:#000}.text-gray-dark-700{color:#fff}.gray-dark-800{background-color:#000}.text-gray-dark-800{color:#fff}.gray-dark-900{background-color:#000}.text-gray-dark-900{color:#fff}.purple-50{background-color:#fff}.text-purple-50{color:#000}.purple-100{background-color:#fff}.text-purple-100{color:#000}.purple-200{background-color:#f2edfe}.text-purple-200{color:#000}.purple-300{background-color:#d0bdfb}.text-purple-300{color:#000}.purple-400{background-color:#ad8cf9}.text-purple-400{color:#000}.purple-500{background-color:#8b5cf6}.text-purple-500{color:#000}.purple-600{background-color:#692cf3}.text-purple-600{color:#000}.purple-700{background-color:#4d0ce0}.text-purple-700{color:#000}.purple-800{background-color:#3c0aaf}.text-purple-800{color:#fff}.purple-900{background-color:#2c077f}.text-purple-900{color:#fff}.pink-50{background-color:#fff}.text-pink-50{color:#000}.pink-100{background-color:#fff}.text-pink-100{color:#000}.pink-200{background-color:#fad3e6}.text-pink-200{color:#000}.pink-300{background-color:#f6a4cd}.text-pink-300{color:#000}.pink-400{background-color:#f176b3}.text-pink-400{color:#000}.pink-500{background-color:#ec4899}.text-pink-500{color:#000}.pink-600{background-color:#e71a7f}.text-pink-600{color:#000}.pink-700{background-color:#bb1366}.text-pink-700{color:#000}.pink-800{background-color:#8c0f4d}.text-pink-800{color:#fff}.pink-900{background-color:#5e0a33}.text-pink-900{color:#fff}.red-50{background-color:#fff}.text-red-50{color:#000}.red-100{background-color:#fff}.text-red-100{color:#000}.red-200{background-color:#fbd1d1}.text-red-200{color:#000}.red-300{background-color:#f7a2a2}.text-red-300{color:#000}.red-400{background-color:#f37373}.text-red-400{color:#000}.red-500{background-color:#ef4444}.text-red-500{color:#000}.red-600{background-color:#eb1515}.text-red-600{color:#000}.red-700{background-color:#bd1010}.text-red-700{color:#000}.red-800{background-color:#8e0c0c}.text-red-800{color:#fff}.red-900{background-color:#5f0808}.text-red-900{color:#fff}.orange-50{background-color:#fff}.text-orange-50{color:#000}.orange-100{background-color:#feeadd}.text-orange-100{color:#000}.orange-200{background-color:#fdcdab}.text-orange-200{color:#000}.orange-300{background-color:#fcaf79}.text-orange-300{color:#000}.orange-400{background-color:#fa9148}.text-orange-400{color:#000}.orange-500{background-color:#f97316}.text-orange-500{color:#000}.orange-600{background-color:#d65b06}.text-orange-600{color:#000}.orange-700{background-color:#a54604}.text-orange-700{color:#fff}.orange-800{background-color:#733103}.text-orange-800{color:#fff}.orange-900{background-color:#411c02}.text-orange-900{color:#fff}.yellow-50{background-color:#fff}.text-yellow-50{color:#000}.yellow-100{background-color:#fdeccf}.text-yellow-100{color:#000}.yellow-200{background-color:#fbd89e}.text-yellow-200{color:#000}.yellow-300{background-color:#f9c56d}.text-yellow-300{color:#000}.yellow-400{background-color:#f7b13c}.text-yellow-400{color:#000}.yellow-500{background-color:#f59e0b}.text-yellow-500{color:#000}.yellow-600{background-color:#c57f08}.text-yellow-600{color:#000}.yellow-700{background-color:#945f06}.text-yellow-700{color:#fff}.yellow-800{background-color:#634004}.text-yellow-800{color:#fff}.yellow-900{background-color:#322002}.text-yellow-900{color:#fff}.green-50{background-color:#cdfbec}.text-green-50{color:#000}.green-100{background-color:#9ef7d9}.text-green-100{color:#000}.green-200{background-color:#6ff3c7}.text-green-200{color:#000}.green-300{background-color:#40efb5}.text-green-300{color:#000}.green-400{background-color:#14e8a2}.text-green-400{color:#000}.green-500{background-color:#10b981}.text-green-500{color:#fff}.green-600{background-color:#0c8a60}.text-green-600{color:#fff}.green-700{background-color:#085b40}.text-green-700{color:#fff}.green-800{background-color:#042c1f}.text-green-800{color:#fff}.green-900{background-color:#000}.text-green-900{color:#fff}.teal-50{background-color:#d1faf6}.text-teal-50{color:#000}.teal-100{background-color:#a3f5ec}.text-teal-100{color:#000}.teal-200{background-color:#75f0e3}.text-teal-200{color:#000}.teal-300{background-color:#47ebd9}.text-teal-300{color:#000}.teal-400{background-color:#19e6d0}.text-teal-400{color:#000}.teal-500{background-color:#14b8a6}.text-teal-500{color:#fff}.teal-600{background-color:#0f8a7d}.text-teal-600{color:#fff}.teal-700{background-color:#0a5c53}.text-teal-700{color:#fff}.teal-800{background-color:#052e2a}.text-teal-800{color:#fff}.teal-900{background-color:#000}.text-teal-900{color:#fff}.cyan-50{background-color:#dbf9fe}.text-cyan-50{color:#000}.cyan-100{background-color:#a9f0fd}.text-cyan-100{color:#000}.cyan-200{background-color:#78e8fb}.text-cyan-200{color:#000}.cyan-300{background-color:#46e0fa}.text-cyan-300{color:#000}.cyan-400{background-color:#15d7f8}.text-cyan-400{color:#000}.cyan-500{background-color:#06b6d4}.text-cyan-500{color:#000}.cyan-600{background-color:#058ba2}.text-cyan-600{color:#fff}.cyan-700{background-color:#036171}.text-cyan-700{color:#fff}.cyan-800{background-color:#02363f}.text-cyan-800{color:#fff}.cyan-900{background-color:#000c0e}.text-cyan-900{color:#fff}.white-50{background-color:#fff}.text-white-50{color:#000}.white-100{background-color:#fff}.text-white-100{color:#000}.white-200{background-color:#fff}.text-white-200{color:#000}.white-300{background-color:#fff}.text-white-300{color:#000}.white-400{background-color:#fff}.text-white-400{color:#000}.white-500{background-color:#fff}.text-white-500{color:#000}.white-600{background-color:#e6e5e5}.text-white-600{color:#000}.white-700{background-color:#ccc}.text-white-700{color:#000}.white-800{background-color:#b3b2b2}.text-white-800{color:#000}.white-900{background-color:#999}.text-white-900{color:#000}.gray-50{background-color:#d1d6dc}.text-gray-50{color:#000}.gray-100{background-color:#b4bbc6}.text-gray-100{color:#000}.gray-200{background-color:#97a1b0}.text-gray-200{color:#000}.gray-300{background-color:#7a879a}.text-gray-300{color:#000}.gray-400{background-color:#616e80}.text-gray-400{color:#000}.gray-500{background-color:#4b5563}.text-gray-500{color:#fff}.gray-600{background-color:#353c46}.text-gray-600{color:#fff}.gray-700{background-color:#1f2329}.text-gray-700{color:#fff}.gray-800{background-color:#090a0c}.text-gray-800{color:#fff}.gray-900{background-color:#000}.text-gray-900{color:#fff}@keyframes bounce{0%,20%,50%,80%,to{transform:translateY(0)}40%{transform:translateY(-30px)}60%{transform:translateY(-15px)}}@keyframes flash{0%,50%,to{opacity:1}25%,75%{opacity:0}}@keyframes jello{11.1%{transform:none}22.2%{transform:skewX(-12.5deg) skewY(-12.5deg)}33.3%{transform:skewX(6.25deg) skewY(6.25deg)}44.4%{transform:skewX(-3.125deg) skewY(-3.125deg)}55.5%{transform:skewX(1.5625deg) skewY(1.5625deg)}66.6%{transform:skewX(-.78125deg) skewY(-.78125deg)}77.7%{transform:skewX(.390625deg) skewY(.390625deg)}88.8%{transform:skewX(-.1953125deg) skewY(-.1953125deg)}to{transform:none}}@keyframes pulse{0%{transform:scale(1)}50%{transform:scale(1.1)}to{transform:scale(1)}}@keyframes rubberBand{0%{transform:scaleX(1)}30%{transform:scale3d(1.25,.75,1)}40%{transform:scale3d(.75,1.25,1)}50%{transform:scale3d(1.15,.85,1)}65%{transform:scale3d(.95,1.05,1)}75%{transform:scale3d(1.05,.95,1)}to{transform:scaleX(1)}}@keyframes shake{0%,to{transform:translateX(0)}10%,30%,50%,70%,90%{transform:translateX(-10px)}20%,40%,60%,80%{transform:translateX(10px)}}@keyframes swing{20%,40%,60%,80%,to{transform-origin:top center}20%{transform:rotate(15deg)}40%{transform:rotate(-10deg)}60%{transform:rotate(5deg)}80%{transform:rotate(-5deg)}to{transform:rotate(0deg)}}@keyframes tada{0%{transform:scale(1)}10%,20%{transform:scale(.9) rotate(-3deg)}30%,50%,70%,90%{transform:scale(1.1) rotate(3deg)}40%,60%,80%{transform:scale(1.1) rotate(-3deg)}to{transform:scale(1) rotate(0)}}@keyframes wobble{0%{transform:translateX(0)}15%{transform:translateX(-25%) rotate(-5deg)}30%{transform:translateX(20%) rotate(3deg)}45%{transform:translateX(-15%) rotate(-3deg)}60%{transform:translateX(10%) rotate(2deg)}75%{transform:translateX(-5%) rotate(-1deg)}to{transform:translateX(0)}}@keyframes fadeIn{0%{opacity:0}to{opacity:1}}@keyframes fadeInDown{0%{opacity:0;transform:translateY(-20px)}to{opacity:1;transform:translateY(0)}}@keyframes fadeInDownBig{0%{opacity:0;transform:translateY(-2000px)}to{opacity:1;transform:translateY(0)}}@keyframes fadeInLeft{0%{opacity:0;transform:translateX(-20px)}to{opacity:1;transform:translateX(0)}}@keyframes fadeInLeftBig{0%{opacity:0;transform:translateX(-2000px)}to{opacity:1;transform:translateX(0)}}@keyframes fadeInRight{0%{opacity:0;transform:translateX(20px)}to{opacity:1;transform:translateX(0)}}@keyframes fadeInRightBig{0%{opacity:0;transform:translateX(2000px)}to{opacity:1;transform:translateX(0)}}@keyframes fadeInUp{0%{opacity:0;transform:translateY(20px)}to{opacity:1;transform:translateY(0)}}@keyframes fadeInUpBig{0%{opacity:0;transform:translateY(2000px)}to{opacity:1;transform:translateY(0)}}@keyframes fadeOut{0%{opacity:1}to{opacity:0}}@keyframes fadeOutDown{0%{opacity:1;transform:translateY(0)}to{opacity:0;transform:translateY(20px)}}@keyframes fadeOutDownBig{0%{opacity:1;transform:translateY(0)}to{opacity:0;transform:translateY(2000px)}}@keyframes fadeOutLeft{0%{opacity:1;transform:translateX(0)}to{opacity:0;transform:translateX(-20px)}}@keyframes fadeOutLeftBig{0%{opacity:1;transform:translateX(0)}to{opacity:0;transform:translateX(-2000px)}}@keyframes fadeOutRight{0%{opacity:1;transform:translateX(0)}to{opacity:0;transform:translateX(20px)}}@keyframes fadeOutRightBig{0%{opacity:1;transform:translateX(0)}to{opacity:0;transform:translateX(2000px)}}@keyframes fadeOutUp{0%{opacity:1;transform:translateY(0)}to{opacity:0;transform:translateY(-20px)}}@keyframes fadeOutUpBig{0%{opacity:1;transform:translateY(0)}to{opacity:0;transform:translateY(-2000px)}}@keyframes slideInDown{0%{opacity:0;transform:translateY(-2000px)}to{opacity:1;transform:translateY(0)}}@keyframes slideInLeft{0%{opacity:0;transform:translateX(-2000px)}to{opacity:1;transform:translateX(0)}}@keyframes slideInRight{0%{opacity:0;transform:translateX(2000px)}to{opacity:1;transform:translateX(0)}}@keyframes slideInUp{0%{opacity:0;transform:translateY(2000px)}to{opacity:1;transform:translateY(0)}}@keyframes slideOutDown{0%{transform:translateY(0)}to{opacity:0;transform:translateY(2000px)}}@keyframes slideOutLeft{0%{transform:translateX(0)}to{opacity:0;transform:translateX(-2000px)}}@keyframes slideOutRight{0%{transform:translateX(0)}to{opacity:0;transform:translateX(2000px)}}@keyframes slideOutUp{0%{transform:translateY(0)}to{opacity:0;transform:translateY(-2000px)}}@keyframes zoomInDown{0%{animation-timing-function:cubic-bezier(.55,.055,.675,.19);opacity:0;transform:scale3d(.1,.1,.1) translate3d(0,-1000px,0)}60%{animation-timing-function:cubic-bezier(.175,.885,.32,1);opacity:1;transform:scale3d(.475,.475,.475) translate3d(0,60px,0)}}@keyframes zoomInLeft{0%{animation-timing-function:cubic-bezier(.55,.055,.675,.19);opacity:0;transform:scale3d(.1,.1,.1) translate3d(-1000px,0,0)}60%{animation-timing-function:cubic-bezier(.175,.885,.32,1);opacity:1;transform:scale3d(.475,.475,.475) translate3d(10px,0,0)}}@keyframes zoomInRight{0%{animation-timing-function:cubic-bezier(.55,.055,.675,.19);opacity:0;transform:scale3d(.1,.1,.1) translate3d(1000px,0,0)}60%{animation-timing-function:cubic-bezier(.175,.885,.32,1);opacity:1;transform:scale3d(.475,.475,.475) translate3d(-10px,0,0)}}@keyframes zoomInUp{0%{animation-timing-function:cubic-bezier(.55,.055,.675,.19);opacity:0;transform:scale3d(.1,.1,.1) translate3d(0,1000px,0)}60%{animation-timing-function:cubic-bezier(.175,.885,.32,1);opacity:1;transform:scale3d(.475,.475,.475) translate3d(0,-60px,0)}}@keyframes zoomOut{0%{opacity:1}50%{opacity:0;transform:scale3d(.3,.3,.3)}to{opacity:0}}@keyframes zoomOutDown{40%{animation-timing-function:cubic-bezier(.55,.055,.675,.19);opacity:1;transform:scale3d(.475,.475,.475) translate3d(0,-60px,0)}to{animation-timing-function:cubic-bezier(.175,.885,.32,1);opacity:0;transform:scale3d(.1,.1,.1) translate3d(0,2000px,0);transform-origin:center bottom}}@keyframes zoomOutLeft{40%{opacity:1;transform:scale3d(.475,.475,.475) translate3d(42px,0,0)}to{opacity:0;transform:scale(.1) translate3d(-2000px,0,0);transform-origin:left center}}@keyframes zoomOutRight{40%{opacity:1;transform:scale3d(.475,.475,.475) translate3d(-42px,0,0)}to{opacity:0;transform:scale(.1) translate3d(2000px,0,0);transform-origin:right center}}@keyframes zoomOutUp{40%{animation-timing-function:cubic-bezier(.55,.055,.675,.19);opacity:1;transform:scale3d(.475,.475,.475) translate3d(0,60px,0)}to{animation-timing-function:cubic-bezier(.175,.885,.32,1);opacity:0;transform:scale3d(.1,.1,.1) translate3d(0,-2000px,0);transform-origin:center bottom}}.page-enter-active{animation:slide-in .3s ease-out forwards}.page-leave-active{animation:slide-out .3s ease-out forwards}@keyframes slide-in{0%{opacity:0;transform:scale(.9)}to{opacity:1;transform:scale(1)}}@keyframes slide-out{0%{opacity:1;transform:scale(1)}to{opacity:0;transform:scale(.9)}}@keyframes zoomIn{0%{opacity:0;transform:scale(.5)}to{opacity:1;transform:scale(1)}}.spin{animation:spin 2s linear infinite}.card-title,.text-title,h1,h2,h3,h4,h5,h6{color:#05070b}.text-10{font-size:10px}.text-11{font-size:11px}.text-12{font-size:12px}.text-13{font-size:13px}.text-14{font-size:14px}.text-15{font-size:15px}.text-16{font-size:16px}.text-17{font-size:17px}.text-18{font-size:18px}.text-19{font-size:19px}.text-20{font-size:20px}.text-21{font-size:21px}.text-22{font-size:22px}.text-23{font-size:23px}.text-24{font-size:24px}.text-25{font-size:25px}.text-26{font-size:26px}.text-27{font-size:27px}.text-28{font-size:28px}.text-29{font-size:29px}.text-30{font-size:30px}.text-31{font-size:31px}.text-32{font-size:32px}.text-33{font-size:33px}.text-34{font-size:34px}.text-35{font-size:35px}.text-36{font-size:36px}.text-37{font-size:37px}.text-38{font-size:38px}.text-39{font-size:39px}.text-40{font-size:40px}.text-41{font-size:41px}.text-42{font-size:42px}.text-43{font-size:43px}.text-44{font-size:44px}.text-45{font-size:45px}.text-46{font-size:46px}.text-47{font-size:47px}.text-48{font-size:48px}.text-49{font-size:49px}.text-50{font-size:50px}.text-51{font-size:51px}.text-52{font-size:52px}.text-53{font-size:53px}.text-54{font-size:54px}.text-55{font-size:55px}.text-56{font-size:56px}.text-57{font-size:57px}.text-58{font-size:58px}.text-59{font-size:59px}.text-60{font-size:60px}.text-61{font-size:61px}.text-62{font-size:62px}.text-63{font-size:63px}.text-64{font-size:64px}.text-65{font-size:65px}.text-66{font-size:66px}.text-67{font-size:67px}.text-68{font-size:68px}.text-69{font-size:69px}.text-70{font-size:70px}.text-71{font-size:71px}.text-72{font-size:72px}.text-73{font-size:73px}.text-74{font-size:74px}.text-75{font-size:75px}.text-76{font-size:76px}.text-77{font-size:77px}.text-78{font-size:78px}.font-weight-300{font-weight:300}.font-weight-301{font-weight:301}.font-weight-302{font-weight:302}.font-weight-303{font-weight:303}.font-weight-304{font-weight:304}.font-weight-305{font-weight:305}.font-weight-306{font-weight:306}.font-weight-307{font-weight:307}.font-weight-308{font-weight:308}.font-weight-309{font-weight:309}.font-weight-310{font-weight:310}.font-weight-311{font-weight:311}.font-weight-312{font-weight:312}.font-weight-313{font-weight:313}.font-weight-314{font-weight:314}.font-weight-315{font-weight:315}.font-weight-316{font-weight:316}.font-weight-317{font-weight:317}.font-weight-318{font-weight:318}.font-weight-319{font-weight:319}.font-weight-320{font-weight:320}.font-weight-321{font-weight:321}.font-weight-322{font-weight:322}.font-weight-323{font-weight:323}.font-weight-324{font-weight:324}.font-weight-325{font-weight:325}.font-weight-326{font-weight:326}.font-weight-327{font-weight:327}.font-weight-328{font-weight:328}.font-weight-329{font-weight:329}.font-weight-330{font-weight:330}.font-weight-331{font-weight:331}.font-weight-332{font-weight:332}.font-weight-333{font-weight:333}.font-weight-334{font-weight:334}.font-weight-335{font-weight:335}.font-weight-336{font-weight:336}.font-weight-337{font-weight:337}.font-weight-338{font-weight:338}.font-weight-339{font-weight:339}.font-weight-340{font-weight:340}.font-weight-341{font-weight:341}.font-weight-342{font-weight:342}.font-weight-343{font-weight:343}.font-weight-344{font-weight:344}.font-weight-345{font-weight:345}.font-weight-346{font-weight:346}.font-weight-347{font-weight:347}.font-weight-348{font-weight:348}.font-weight-349{font-weight:349}.font-weight-350{font-weight:350}.font-weight-351{font-weight:351}.font-weight-352{font-weight:352}.font-weight-353{font-weight:353}.font-weight-354{font-weight:354}.font-weight-355{font-weight:355}.font-weight-356{font-weight:356}.font-weight-357{font-weight:357}.font-weight-358{font-weight:358}.font-weight-359{font-weight:359}.font-weight-360{font-weight:360}.font-weight-361{font-weight:361}.font-weight-362{font-weight:362}.font-weight-363{font-weight:363}.font-weight-364{font-weight:364}.font-weight-365{font-weight:365}.font-weight-366{font-weight:366}.font-weight-367{font-weight:367}.font-weight-368{font-weight:368}.font-weight-369{font-weight:369}.font-weight-370{font-weight:370}.font-weight-371{font-weight:371}.font-weight-372{font-weight:372}.font-weight-373{font-weight:373}.font-weight-374{font-weight:374}.font-weight-375{font-weight:375}.font-weight-376{font-weight:376}.font-weight-377{font-weight:377}.font-weight-378{font-weight:378}.font-weight-379{font-weight:379}.font-weight-380{font-weight:380}.font-weight-381{font-weight:381}.font-weight-382{font-weight:382}.font-weight-383{font-weight:383}.font-weight-384{font-weight:384}.font-weight-385{font-weight:385}.font-weight-386{font-weight:386}.font-weight-387{font-weight:387}.font-weight-388{font-weight:388}.font-weight-389{font-weight:389}.font-weight-390{font-weight:390}.font-weight-391{font-weight:391}.font-weight-392{font-weight:392}.font-weight-393{font-weight:393}.font-weight-394{font-weight:394}.font-weight-395{font-weight:395}.font-weight-396{font-weight:396}.font-weight-397{font-weight:397}.font-weight-398{font-weight:398}.font-weight-399{font-weight:399}.font-weight-400{font-weight:400}.font-weight-401{font-weight:401}.font-weight-402{font-weight:402}.font-weight-403{font-weight:403}.font-weight-404{font-weight:404}.font-weight-405{font-weight:405}.font-weight-406{font-weight:406}.font-weight-407{font-weight:407}.font-weight-408{font-weight:408}.font-weight-409{font-weight:409}.font-weight-410{font-weight:410}.font-weight-411{font-weight:411}.font-weight-412{font-weight:412}.font-weight-413{font-weight:413}.font-weight-414{font-weight:414}.font-weight-415{font-weight:415}.font-weight-416{font-weight:416}.font-weight-417{font-weight:417}.font-weight-418{font-weight:418}.font-weight-419{font-weight:419}.font-weight-420{font-weight:420}.font-weight-421{font-weight:421}.font-weight-422{font-weight:422}.font-weight-423{font-weight:423}.font-weight-424{font-weight:424}.font-weight-425{font-weight:425}.font-weight-426{font-weight:426}.font-weight-427{font-weight:427}.font-weight-428{font-weight:428}.font-weight-429{font-weight:429}.font-weight-430{font-weight:430}.font-weight-431{font-weight:431}.font-weight-432{font-weight:432}.font-weight-433{font-weight:433}.font-weight-434{font-weight:434}.font-weight-435{font-weight:435}.font-weight-436{font-weight:436}.font-weight-437{font-weight:437}.font-weight-438{font-weight:438}.font-weight-439{font-weight:439}.font-weight-440{font-weight:440}.font-weight-441{font-weight:441}.font-weight-442{font-weight:442}.font-weight-443{font-weight:443}.font-weight-444{font-weight:444}.font-weight-445{font-weight:445}.font-weight-446{font-weight:446}.font-weight-447{font-weight:447}.font-weight-448{font-weight:448}.font-weight-449{font-weight:449}.font-weight-450{font-weight:450}.font-weight-451{font-weight:451}.font-weight-452{font-weight:452}.font-weight-453{font-weight:453}.font-weight-454{font-weight:454}.font-weight-455{font-weight:455}.font-weight-456{font-weight:456}.font-weight-457{font-weight:457}.font-weight-458{font-weight:458}.font-weight-459{font-weight:459}.font-weight-460{font-weight:460}.font-weight-461{font-weight:461}.font-weight-462{font-weight:462}.font-weight-463{font-weight:463}.font-weight-464{font-weight:464}.font-weight-465{font-weight:465}.font-weight-466{font-weight:466}.font-weight-467{font-weight:467}.font-weight-468{font-weight:468}.font-weight-469{font-weight:469}.font-weight-470{font-weight:470}.font-weight-471{font-weight:471}.font-weight-472{font-weight:472}.font-weight-473{font-weight:473}.font-weight-474{font-weight:474}.font-weight-475{font-weight:475}.font-weight-476{font-weight:476}.font-weight-477{font-weight:477}.font-weight-478{font-weight:478}.font-weight-479{font-weight:479}.font-weight-480{font-weight:480}.font-weight-481{font-weight:481}.font-weight-482{font-weight:482}.font-weight-483{font-weight:483}.font-weight-484{font-weight:484}.font-weight-485{font-weight:485}.font-weight-486{font-weight:486}.font-weight-487{font-weight:487}.font-weight-488{font-weight:488}.font-weight-489{font-weight:489}.font-weight-490{font-weight:490}.font-weight-491{font-weight:491}.font-weight-492{font-weight:492}.font-weight-493{font-weight:493}.font-weight-494{font-weight:494}.font-weight-495{font-weight:495}.font-weight-496{font-weight:496}.font-weight-497{font-weight:497}.font-weight-498{font-weight:498}.font-weight-499{font-weight:499}.font-weight-500{font-weight:500}.font-weight-501{font-weight:501}.font-weight-502{font-weight:502}.font-weight-503{font-weight:503}.font-weight-504{font-weight:504}.font-weight-505{font-weight:505}.font-weight-506{font-weight:506}.font-weight-507{font-weight:507}.font-weight-508{font-weight:508}.font-weight-509{font-weight:509}.font-weight-510{font-weight:510}.font-weight-511{font-weight:511}.font-weight-512{font-weight:512}.font-weight-513{font-weight:513}.font-weight-514{font-weight:514}.font-weight-515{font-weight:515}.font-weight-516{font-weight:516}.font-weight-517{font-weight:517}.font-weight-518{font-weight:518}.font-weight-519{font-weight:519}.font-weight-520{font-weight:520}.font-weight-521{font-weight:521}.font-weight-522{font-weight:522}.font-weight-523{font-weight:523}.font-weight-524{font-weight:524}.font-weight-525{font-weight:525}.font-weight-526{font-weight:526}.font-weight-527{font-weight:527}.font-weight-528{font-weight:528}.font-weight-529{font-weight:529}.font-weight-530{font-weight:530}.font-weight-531{font-weight:531}.font-weight-532{font-weight:532}.font-weight-533{font-weight:533}.font-weight-534{font-weight:534}.font-weight-535{font-weight:535}.font-weight-536{font-weight:536}.font-weight-537{font-weight:537}.font-weight-538{font-weight:538}.font-weight-539{font-weight:539}.font-weight-540{font-weight:540}.font-weight-541{font-weight:541}.font-weight-542{font-weight:542}.font-weight-543{font-weight:543}.font-weight-544{font-weight:544}.font-weight-545{font-weight:545}.font-weight-546{font-weight:546}.font-weight-547{font-weight:547}.font-weight-548{font-weight:548}.font-weight-549{font-weight:549}.font-weight-550{font-weight:550}.font-weight-551{font-weight:551}.font-weight-552{font-weight:552}.font-weight-553{font-weight:553}.font-weight-554{font-weight:554}.font-weight-555{font-weight:555}.font-weight-556{font-weight:556}.font-weight-557{font-weight:557}.font-weight-558{font-weight:558}.font-weight-559{font-weight:559}.font-weight-560{font-weight:560}.font-weight-561{font-weight:561}.font-weight-562{font-weight:562}.font-weight-563{font-weight:563}.font-weight-564{font-weight:564}.font-weight-565{font-weight:565}.font-weight-566{font-weight:566}.font-weight-567{font-weight:567}.font-weight-568{font-weight:568}.font-weight-569{font-weight:569}.font-weight-570{font-weight:570}.font-weight-571{font-weight:571}.font-weight-572{font-weight:572}.font-weight-573{font-weight:573}.font-weight-574{font-weight:574}.font-weight-575{font-weight:575}.font-weight-576{font-weight:576}.font-weight-577{font-weight:577}.font-weight-578{font-weight:578}.font-weight-579{font-weight:579}.font-weight-580{font-weight:580}.font-weight-581{font-weight:581}.font-weight-582{font-weight:582}.font-weight-583{font-weight:583}.font-weight-584{font-weight:584}.font-weight-585{font-weight:585}.font-weight-586{font-weight:586}.font-weight-587{font-weight:587}.font-weight-588{font-weight:588}.font-weight-589{font-weight:589}.font-weight-590{font-weight:590}.font-weight-591{font-weight:591}.font-weight-592{font-weight:592}.font-weight-593{font-weight:593}.font-weight-594{font-weight:594}.font-weight-595{font-weight:595}.font-weight-596{font-weight:596}.font-weight-597{font-weight:597}.font-weight-598{font-weight:598}.font-weight-599{font-weight:599}.font-weight-600{font-weight:600}.font-weight-601{font-weight:601}.font-weight-602{font-weight:602}.font-weight-603{font-weight:603}.font-weight-604{font-weight:604}.font-weight-605{font-weight:605}.font-weight-606{font-weight:606}.font-weight-607{font-weight:607}.font-weight-608{font-weight:608}.font-weight-609{font-weight:609}.font-weight-610{font-weight:610}.font-weight-611{font-weight:611}.font-weight-612{font-weight:612}.font-weight-613{font-weight:613}.font-weight-614{font-weight:614}.font-weight-615{font-weight:615}.font-weight-616{font-weight:616}.font-weight-617{font-weight:617}.font-weight-618{font-weight:618}.font-weight-619{font-weight:619}.font-weight-620{font-weight:620}.font-weight-621{font-weight:621}.font-weight-622{font-weight:622}.font-weight-623{font-weight:623}.font-weight-624{font-weight:624}.font-weight-625{font-weight:625}.font-weight-626{font-weight:626}.font-weight-627{font-weight:627}.font-weight-628{font-weight:628}.font-weight-629{font-weight:629}.font-weight-630{font-weight:630}.font-weight-631{font-weight:631}.font-weight-632{font-weight:632}.font-weight-633{font-weight:633}.font-weight-634{font-weight:634}.font-weight-635{font-weight:635}.font-weight-636{font-weight:636}.font-weight-637{font-weight:637}.font-weight-638{font-weight:638}.font-weight-639{font-weight:639}.font-weight-640{font-weight:640}.font-weight-641{font-weight:641}.font-weight-642{font-weight:642}.font-weight-643{font-weight:643}.font-weight-644{font-weight:644}.font-weight-645{font-weight:645}.font-weight-646{font-weight:646}.font-weight-647{font-weight:647}.font-weight-648{font-weight:648}.font-weight-649{font-weight:649}.font-weight-650{font-weight:650}.font-weight-651{font-weight:651}.font-weight-652{font-weight:652}.font-weight-653{font-weight:653}.font-weight-654{font-weight:654}.font-weight-655{font-weight:655}.font-weight-656{font-weight:656}.font-weight-657{font-weight:657}.font-weight-658{font-weight:658}.font-weight-659{font-weight:659}.font-weight-660{font-weight:660}.font-weight-661{font-weight:661}.font-weight-662{font-weight:662}.font-weight-663{font-weight:663}.font-weight-664{font-weight:664}.font-weight-665{font-weight:665}.font-weight-666{font-weight:666}.font-weight-667{font-weight:667}.font-weight-668{font-weight:668}.font-weight-669{font-weight:669}.font-weight-670{font-weight:670}.font-weight-671{font-weight:671}.font-weight-672{font-weight:672}.font-weight-673{font-weight:673}.font-weight-674{font-weight:674}.font-weight-675{font-weight:675}.font-weight-676{font-weight:676}.font-weight-677{font-weight:677}.font-weight-678{font-weight:678}.font-weight-679{font-weight:679}.font-weight-680{font-weight:680}.font-weight-681{font-weight:681}.font-weight-682{font-weight:682}.font-weight-683{font-weight:683}.font-weight-684{font-weight:684}.font-weight-685{font-weight:685}.font-weight-686{font-weight:686}.font-weight-687{font-weight:687}.font-weight-688{font-weight:688}.font-weight-689{font-weight:689}.font-weight-690{font-weight:690}.font-weight-691{font-weight:691}.font-weight-692{font-weight:692}.font-weight-693{font-weight:693}.font-weight-694{font-weight:694}.font-weight-695{font-weight:695}.font-weight-696{font-weight:696}.font-weight-697{font-weight:697}.font-weight-698{font-weight:698}.font-weight-699{font-weight:699}.font-weight-700{font-weight:700}.font-weight-701{font-weight:701}.font-weight-702{font-weight:702}.font-weight-703{font-weight:703}.font-weight-704{font-weight:704}.font-weight-705{font-weight:705}.font-weight-706{font-weight:706}.font-weight-707{font-weight:707}.font-weight-708{font-weight:708}.font-weight-709{font-weight:709}.font-weight-710{font-weight:710}.font-weight-711{font-weight:711}.font-weight-712{font-weight:712}.font-weight-713{font-weight:713}.font-weight-714{font-weight:714}.font-weight-715{font-weight:715}.font-weight-716{font-weight:716}.font-weight-717{font-weight:717}.font-weight-718{font-weight:718}.font-weight-719{font-weight:719}.font-weight-720{font-weight:720}.font-weight-721{font-weight:721}.font-weight-722{font-weight:722}.font-weight-723{font-weight:723}.font-weight-724{font-weight:724}.font-weight-725{font-weight:725}.font-weight-726{font-weight:726}.font-weight-727{font-weight:727}.font-weight-728{font-weight:728}.font-weight-729{font-weight:729}.font-weight-730{font-weight:730}.font-weight-731{font-weight:731}.font-weight-732{font-weight:732}.font-weight-733{font-weight:733}.font-weight-734{font-weight:734}.font-weight-735{font-weight:735}.font-weight-736{font-weight:736}.font-weight-737{font-weight:737}.font-weight-738{font-weight:738}.font-weight-739{font-weight:739}.font-weight-740{font-weight:740}.font-weight-741{font-weight:741}.font-weight-742{font-weight:742}.font-weight-743{font-weight:743}.font-weight-744{font-weight:744}.font-weight-745{font-weight:745}.font-weight-746{font-weight:746}.font-weight-747{font-weight:747}.font-weight-748{font-weight:748}.font-weight-749{font-weight:749}.font-weight-750{font-weight:750}.font-weight-751{font-weight:751}.font-weight-752{font-weight:752}.font-weight-753{font-weight:753}.font-weight-754{font-weight:754}.font-weight-755{font-weight:755}.font-weight-756{font-weight:756}.font-weight-757{font-weight:757}.font-weight-758{font-weight:758}.font-weight-759{font-weight:759}.font-weight-760{font-weight:760}.font-weight-761{font-weight:761}.font-weight-762{font-weight:762}.font-weight-763{font-weight:763}.font-weight-764{font-weight:764}.font-weight-765{font-weight:765}.font-weight-766{font-weight:766}.font-weight-767{font-weight:767}.font-weight-768{font-weight:768}.font-weight-769{font-weight:769}.font-weight-770{font-weight:770}.font-weight-771{font-weight:771}.font-weight-772{font-weight:772}.font-weight-773{font-weight:773}.font-weight-774{font-weight:774}.font-weight-775{font-weight:775}.font-weight-776{font-weight:776}.font-weight-777{font-weight:777}.font-weight-778{font-weight:778}.font-weight-779{font-weight:779}.font-weight-780{font-weight:780}.font-weight-781{font-weight:781}.font-weight-782{font-weight:782}.font-weight-783{font-weight:783}.font-weight-784{font-weight:784}.font-weight-785{font-weight:785}.font-weight-786{font-weight:786}.font-weight-787{font-weight:787}.font-weight-788{font-weight:788}.font-weight-789{font-weight:789}.font-weight-790{font-weight:790}.font-weight-791{font-weight:791}.font-weight-792{font-weight:792}.font-weight-793{font-weight:793}.font-weight-794{font-weight:794}.font-weight-795{font-weight:795}.font-weight-796{font-weight:796}.font-weight-797{font-weight:797}.font-weight-798{font-weight:798}.font-weight-799{font-weight:799}.font-weight-800{font-weight:800}.font-weight-801{font-weight:801}.font-weight-802{font-weight:802}.font-weight-803{font-weight:803}.font-weight-804{font-weight:804}.font-weight-805{font-weight:805}.font-weight-806{font-weight:806}.font-weight-807{font-weight:807}.font-weight-808{font-weight:808}.font-weight-809{font-weight:809}.font-weight-810{font-weight:810}.font-weight-811{font-weight:811}.font-weight-812{font-weight:812}.font-weight-813{font-weight:813}.font-weight-814{font-weight:814}.font-weight-815{font-weight:815}.font-weight-816{font-weight:816}.font-weight-817{font-weight:817}.font-weight-818{font-weight:818}.font-weight-819{font-weight:819}.font-weight-820{font-weight:820}.font-weight-821{font-weight:821}.font-weight-822{font-weight:822}.font-weight-823{font-weight:823}.font-weight-824{font-weight:824}.font-weight-825{font-weight:825}.font-weight-826{font-weight:826}.font-weight-827{font-weight:827}.font-weight-828{font-weight:828}.font-weight-829{font-weight:829}.font-weight-830{font-weight:830}.font-weight-831{font-weight:831}.font-weight-832{font-weight:832}.font-weight-833{font-weight:833}.font-weight-834{font-weight:834}.font-weight-835{font-weight:835}.font-weight-836{font-weight:836}.font-weight-837{font-weight:837}.font-weight-838{font-weight:838}.font-weight-839{font-weight:839}.font-weight-840{font-weight:840}.font-weight-841{font-weight:841}.font-weight-842{font-weight:842}.font-weight-843{font-weight:843}.font-weight-844{font-weight:844}.font-weight-845{font-weight:845}.font-weight-846{font-weight:846}.font-weight-847{font-weight:847}.font-weight-848{font-weight:848}.font-weight-849{font-weight:849}.font-weight-850{font-weight:850}.font-weight-851{font-weight:851}.font-weight-852{font-weight:852}.font-weight-853{font-weight:853}.font-weight-854{font-weight:854}.font-weight-855{font-weight:855}.font-weight-856{font-weight:856}.font-weight-857{font-weight:857}.font-weight-858{font-weight:858}.font-weight-859{font-weight:859}.font-weight-860{font-weight:860}.font-weight-861{font-weight:861}.font-weight-862{font-weight:862}.font-weight-863{font-weight:863}.font-weight-864{font-weight:864}.font-weight-865{font-weight:865}.font-weight-866{font-weight:866}.font-weight-867{font-weight:867}.font-weight-868{font-weight:868}.font-weight-869{font-weight:869}.font-weight-870{font-weight:870}.font-weight-871{font-weight:871}.font-weight-872{font-weight:872}.font-weight-873{font-weight:873}.font-weight-874{font-weight:874}.font-weight-875{font-weight:875}.font-weight-876{font-weight:876}.font-weight-877{font-weight:877}.font-weight-878{font-weight:878}.font-weight-879{font-weight:879}.font-weight-880{font-weight:880}.font-weight-881{font-weight:881}.font-weight-882{font-weight:882}.font-weight-883{font-weight:883}.font-weight-884{font-weight:884}.font-weight-885{font-weight:885}.font-weight-886{font-weight:886}.font-weight-887{font-weight:887}.font-weight-888{font-weight:888}.font-weight-889{font-weight:889}.font-weight-890{font-weight:890}.font-weight-891{font-weight:891}.font-weight-892{font-weight:892}.font-weight-893{font-weight:893}.font-weight-894{font-weight:894}.font-weight-895{font-weight:895}.font-weight-896{font-weight:896}.font-weight-897{font-weight:897}.font-weight-898{font-weight:898}.font-weight-899{font-weight:899}.font-weight-900{font-weight:900}.text-small{font-size:.75rem}.p-readable{max-width:650px}.section-info{color:#6b7280;font-size:14px}.heading{color:#000;font-weight:700}.br{margin:10px 0}.text-mute{color:#6b7280}.display-content{margin:20px 0}.display-1{font-size:6rem}.display-1,.display-2{font-weight:300;line-height:1.2}.display-2{font-size:5.5rem}.display-3{font-size:4.5rem;font-weight:300;line-height:1.2}.lead{font-size:1.25rem;font-weight:300}.t-font-bold{font-weight:500!important}.t-font-bolder{font-weight:600!important}.t-font-boldest{font-weight:700!important}.t-font-u{text-transform:uppercase}.blockquote{font-size:1.25rem;margin-bottom:1rem}.blockquote-footer{color:#6b7280;display:block;font-size:80%}a.typo_link{position:relative}a.typo_link:hover{color:#6366f1}a.typo_link:hover:after{width:100%}a.typo_link:after{bottom:-4px;content:"";display:block;height:1px;left:0;position:absolute;transition:width .3s ease;width:0}a.typo_link.text-primary:after{background-color:#ff630f}a.typo_link.text-secondary:after{background-color:#1f2937}a.typo_link.text-success:after{background-color:#10b981}a.typo_link.text-info:after{background-color:#3b82f6}a.typo_link.text-warning:after{background-color:#f59e0b}a.typo_link.text-danger:after{background-color:#ef4444}a.typo_link.text-light:after{background-color:#6b7280}a.typo_link.text-dark:after{background-color:#111827}a.typo_link.text-gray-100:after{background-color:#f3f4f6}a.typo_link.text-gray-200:after{background-color:#e5e7eb}a.typo_link.text-gray-300:after{background-color:#d1d5db}a.typo_link.text-gray-400:after{background-color:#9ca3af}a.typo_link.text-gray-500:after{background-color:#6b7280}a.typo_link.text-gray-600:after{background-color:#4b5563}a.typo_link.text-gray-700:after{background-color:#374151}a.typo_link.text-gray-800:after{background-color:#1f2937}a.typo_link.text-gray-900:after{background-color:#111827}.divider{align-items:center;display:flex;justify-content:center}.divider>span:first-child,.divider>span:last-child{background:#e5e7eb;display:inline-block;flex:1;height:1px;width:100%}.divider>span:not(:first-child):not(:last-child){padding:0 2rem}.cursor-pointer{cursor:pointer!important}.quantity_alert_warehouse{width:200px}.menu-icon-language{display:flex;flex-wrap:wrap;padding:0 8px}.menu-icon-language>a{align-items:center;border-radius:4px;color:#1f2937;cursor:pointer;display:inline-flex;flex-direction:column;padding:18px 12px;width:6rem}.menu-icon-language>a i{font-size:28px;margin-bottom:4px}.menu-icon-language>a:hover{background:#8b5cf6}.barcodea4{height:11.6in;padding:.1in 0 0 .1in;width:8.25in}.barcode_non_a4,.barcodea4{border:1px solid #ccc;display:block;margin:10px auto;page-break-after:always}.barcode_non_a4{height:10.3in;padding-top:.1in;width:8.45in}.barcode_non_a4 .barcode-item{border:1px dotted #ccc;display:block;float:left;font-size:12px;line-height:14px;overflow:hidden;text-align:center;text-transform:uppercase}.barcode_non_a4 .barcode-name,.barcodea4 .barcode-name{display:block}.barcodea4 .style18 .barcode-name,.barcodea4 .style24 .barcode-name{font-size:14px}.barcodea4 .style12 .barcode-name{font-size:15px}.barcode_non_a4 .barcode-name{font-size:14px}.barcode_non_a4 .style10 .barcode-name{font-size:16px}.barcodea4 .barcode-item{border:1px dotted #ccc;display:block;float:left;font-size:12px;line-height:14px;overflow:hidden;text-align:center;text-transform:uppercase}.barcodea4 .style40{height:1.003in;margin:0 .07in;padding-top:.05in;width:1.799in}.barcode_non_a4 .style30{height:1in;margin:0 .07in;padding-top:.05in;width:2.625in}.barcode_non_a4 .style30:nth-child(3n+1){margin-left:.1in}.barcodea4 .style24{height:1.335in;margin-left:.079in;padding-top:.05in;width:2.48in}.barcode_non_a4 .style20{height:1in;margin:0 .1in;padding-top:.05in;width:4in}.barcodea4 .style18{font-size:13px;height:1.835in;line-height:20px;margin-left:.079in;padding-top:.05in;width:2.5in}.barcode_non_a4 .style14{height:1.33in;margin:0 .1in;padding-top:.1in;width:4in}.barcodea4 .style12{font-size:14px;height:2.834in;line-height:20px;margin-left:.079in;padding-top:.05in;width:2.5in}.barcode_non_a4 .style10{font-size:14px;height:2in;line-height:20px;margin:0 .1in;padding-top:.1in;width:4in}@media print{.barcode_non_a4,.barcodea4{margin:0}.barcode_non_a4,.barcode_non_a4 .barcode-item,.barcodea4,.barcodea4 .barcode-item{border:none!important}}.box-shadow-1{box-shadow:0 1px 15px 1px rgba(0,0,0,.04),0 1px 6px rgba(0,0,0,.04)}.box-shadow-2{box-shadow:0 1px 15px 1px rgba(0,0,0,.24),0 1px 6px rgba(0,0,0,.04)}.layout-sidebar-compact .main-header{align-items:center;background:transparent;box-shadow:none;display:flex;flex-wrap:wrap;justify-content:space-between;left:0;position:absolute!important;transition:width .24s ease-in-out;width:100%;z-index:100}.layout-sidebar-compact .main-header .logo{display:none}.layout-sidebar-compact .main-header button.dropdown-toggle{padding:0!important}.layout-sidebar-compact .main-header .header-part-right .dropdown-menu.show{left:-60px!important}.main-header .logo{width:76px}@media (max-width:1024px){.main-header .search-bar{display:none;width:180px}.main-header .menu-toggle{margin:0 36px;width:24px}.main-header .header-part-right .user{margin-right:1rem}}@media (max-width:790px){.main-header .search-bar{display:none}.main-header .menu-toggle{margin-right:36px;width:24px}}@media (max-width:576px){.main-header{height:70px;padding:0 1.5rem}.main-header .logo{width:60px}.main-header .menu-toggle{margin:0 10px!important;width:24px!important}.main-header .header-part-right .user{margin-right:0;padding-right:0}.notification-dropdown{left:-180px!important}}.layout-sidebar-compact.app-admin-wrap{width:100%}.layout-sidebar-compact.sidenav-open .main-content-wrap{width:calc(100% - 296px)}.layout-sidebar-compact.sidenav-open .sidebar-left{left:0}.layout-sidebar-compact .main-content-wrap{background:#fff;float:right;margin-top:0;min-height:calc(100vh - 80px);padding:0 2rem;position:relative;transition:width .24s ease-in-out;width:100%}.layout-sidebar-compact .main-content{display:flex;flex-direction:column;margin-top:104px;min-height:calc(100vh - 104px)}.layout-sidebar-compact .sidebar-left,.layout-sidebar-compact .sidebar-left-secondary{box-shadow:0 4px 20px 1px rgba(0,0,0,.06),0 1px 4px rgba(0,0,0,.08);height:100%;position:fixed;top:0;z-index:100}.layout-sidebar-compact .sidebar-left{left:-96px;transition:left .24s ease-in-out}.layout-sidebar-compact .sidebar-left .logo{align-items:center;border-bottom:1px solid rgba(243,244,246,.05);display:flex;height:68px;justify-content:center}.layout-sidebar-compact .sidebar-left .logo img{width:40px}.layout-sidebar-compact .sidebar-left .navigation-left{height:100%;list-style:none;margin:0;padding:0;text-align:center;width:76px}.layout-sidebar-compact .sidebar-left .navigation-left .nav-item{border-bottom:1px solid rgba(243,244,246,.05);color:#fff;cursor:pointer;display:block;position:relative;width:100%}.layout-sidebar-compact .sidebar-left .navigation-left .nav-item:active,.layout-sidebar-compact .sidebar-left .navigation-left .nav-item:focus{outline:none}.layout-sidebar-compact .sidebar-left .navigation-left .nav-item.lvl1{text-align:center}.layout-sidebar-compact .sidebar-left .navigation-left .nav-item.active{border-left:2px solid #fff;color:#fff}.layout-sidebar-compact .sidebar-left .navigation-left .nav-item .nav-item-hold{color:#fff;display:block;padding:22px 0;width:100%}.layout-sidebar-compact .sidebar-left .navigation-left .nav-item .nav-item-hold:active,.layout-sidebar-compact .sidebar-left .navigation-left .nav-item .nav-item-hold:focus{outline:none}.layout-sidebar-compact .sidebar-left .navigation-left .nav-item .nav-item-hold .feather,.layout-sidebar-compact .sidebar-left .navigation-left .nav-item .nav-item-hold .nav-icon{display:block;font-size:24px;height:24px;margin:0 auto;width:24px}.layout-sidebar-compact .sidebar-left .navigation-left .nav-item .nav-item-hold .nav-text{display:none}.layout-sidebar-compact .sidebar-left .navigation-left .nav-item .nav-item-hold a{color:#fff}.layout-sidebar-compact .sidebar-left .navigation-left .nav-item.active .triangle{display:none}.layout-sidebar-compact.sidenav-open .sidebar-left-secondary{left:76px}.layout-sidebar-compact .sidebar-left-secondary{background:#fff;left:-240px;padding:.75rem 0;transition:left .24s ease-in-out;width:220px}.layout-sidebar-compact .sidebar-left-secondary .sidebar-close{display:none;font-size:18px;padding:16px;position:absolute;right:0;top:0}.layout-sidebar-compact .sidebar-left-secondary header{padding:0 24px}.layout-sidebar-compact .sidebar-left-secondary header .logo{margin-bottom:14px;padding:10px 0}.layout-sidebar-compact .sidebar-left-secondary header .logo img{height:24px;width:auto}.layout-sidebar-compact .sidebar-left-secondary header h6{font-size:18px;font-weight:600;margin-bottom:4px}.layout-sidebar-compact .sidebar-left-secondary header p{color:#4b5563;margin-bottom:12px}.layout-sidebar-compact .sidebar-left-secondary .submenu-area{display:none}.layout-sidebar-compact .sidebar-left-secondary .childNav{list-style:none;padding:0}.layout-sidebar-compact .sidebar-left-secondary .childNav li.nav-item{display:block}.layout-sidebar-compact .sidebar-left-secondary .childNav li.nav-item a{align-items:center;color:#05070b;cursor:pointer;display:flex;font-size:13px;padding:12px 24px;text-transform:capitalize}.layout-sidebar-compact .sidebar-left-secondary .childNav li.nav-item a:hover{background:#e5e7eb}.layout-sidebar-compact .sidebar-left-secondary .childNav li.nav-item a.open{background:#e5e7eb;color:#ff630f}.layout-sidebar-compact .sidebar-left-secondary .childNav li.nav-item a.open .nav-icon{color:#ff630f}.layout-sidebar-compact .sidebar-left-secondary .childNav li.nav-item a .nav-icon{color:#4b5563;font-size:18px;margin-right:8px;vertical-align:middle}.layout-sidebar-compact .sidebar-left-secondary .childNav li.nav-item a .item-name{font-weight:400;vertical-align:middle}.layout-sidebar-compact .sidebar-left-secondary .childNav li.nav-item a .dd-arrow{font-size:11px;margin-left:auto}.layout-sidebar-compact .sidebar-left-secondary .childNav li.nav-item .submenu{margin-left:8px}.layout-sidebar-compact .sidebar-left-secondary>.childNav{margin:0}.layout-sidebar-compact .sidebar-left-secondary li.nav-item.open>div>a>.dd-arrow{transform:rotate(90deg)}.layout-sidebar-compact .sidebar-left-secondary li.nav-item.open>div>.childNav{max-height:1000px;overflow:visible}.layout-sidebar-compact .sidebar-left-secondary li.nav-item>div>a>.dd-arrow{transition:all .4s ease-in-out}.layout-sidebar-compact .sidebar-left-secondary li.nav-item>div>.childNav{background:#fff;max-height:0;overflow:hidden;transition:all .4s ease-in-out}.layout-sidebar-compact .sidebar-left-secondary li.nav-item>div>.childNav li.nav-item a{padding:12px 12px 12px 50px}.layout-sidebar-compact .sidebar-overlay{background:transparent;bottom:0;cursor:w-resize;display:none;height:calc(100vh - 80px);position:fixed;right:0;width:calc(100% - 296px);z-index:101}.layout-sidebar-compact .sidebar-overlay.open{display:block}@media (max-width:1200px){.layout-sidebar-compact.sidenav-open .main-content-wrap{width:100%}.layout-sidebar-compact .sidebar-left-secondary .sidebar-close{display:block}.layout-sidebar-compact .sidebar-left,.layout-sidebar-compact .sidebar-left-secondary{z-index:101}}@media (max-width:576px){.main-content-wrap{padding:1.5rem}.main-content-wrap.sidenav-open{width:100%}.main-content-wrap{margin-top:70px}.sidebar-left,.sidebar-left-secondary{height:calc(100vh - 70px);top:70px}.sidebar-left{left:-110px}.sidebar-left .navigation-left{width:90px}.sidebar-left .navigation-left .nav-item.active .triangle{border-width:0 0 24px 24px}.sidebar-left .navigation-left .nav-item .nav-item-hold{padding:16px 0}.sidebar-left-secondary{left:-210px;width:190px}.sidebar-left-secondary.open{left:90px}.sidebar-overlay{height:calc(100vh - 70px)}}[dir=rtl] .layout-sidebar-compact .sidebar-left{left:auto!important;right:-96px}[dir=rtl] .layout-sidebar-compact.sidenav-open .sidebar-left{left:auto!important;right:0}[dir=rtl] .layout-sidebar-compact.sidenav-open .sidebar-left-secondary{right:76px}[dir=rtl] .layout-sidebar-compact .sidebar-left-secondary{left:auto!important;right:-240px}[dir=rtl] .layout-sidebar-compact .sidebar-left-secondary header{text-align:right}[dir=rtl] .layout-sidebar-compact .sidebar-left-secondary .childNav li.nav-item a .dd-arrow{margin-left:unset!important;margin-right:auto}[dir=rtl] .layout-sidebar-compact .sidebar-left-secondary .childNav li.nav-item a .nav-icon{margin-left:8px;margin-right:0}[dir=rtl] .layout-sidebar-compact .main-content-wrap{float:left}.layout-sidebar-large .main-header{align-items:center;background:#fff;box-shadow:0 1px 15px rgba(0,0,0,.04),0 1px 6px rgba(0,0,0,.04);display:flex;flex-wrap:wrap;height:80px;justify-content:space-between;position:fixed;width:100%;z-index:100}.layout-sidebar-large .main-header .menu-toggle{align-items:center;cursor:pointer;display:flex;flex-direction:column;margin-right:12px;width:90px}.layout-sidebar-large .main-header .menu-toggle div{background:#111827;height:1px;margin:3px 0;width:24px}.layout-sidebar-large .main-header .search-bar{align-items:center;background:#f3f4f6;border:1px solid #e5e7eb;border-radius:20px;display:flex;height:40px;justify-content:left;position:relative;width:230px}.layout-sidebar-large .main-header .search-bar input{background:transparent;border:0;color:#212121;font-size:.8rem;height:100%;line-height:2;outline:initial!important;padding:.5rem 1rem;width:calc(100% - 32px)}.layout-sidebar-large .main-header .search-bar .search-icon{display:inline-block;font-size:18px;width:24px}.layout-sidebar-large .main-header .logo{width:120px}.layout-sidebar-large .main-header .logo img{display:block;height:60px;margin:0 auto;width:60px}.layout-sidebar-large .main-header .header-icon{border-radius:8px;cursor:pointer;display:inline-block;font-size:19px;height:36px;line-height:36px;margin:0 2px;text-align:center;width:36px}.layout-sidebar-large .main-header .header-icon:hover{background:#f3f4f6}.layout-sidebar-large .main-header .header-icon.dropdown-toggle:after{display:none}.layout-sidebar-large .main-header .header-part-right{align-items:center;display:flex}.layout-sidebar-large .main-header .header-part-right .user{margin-right:2rem}.layout-sidebar-large .main-header .header-part-right .user img{border-radius:50%;height:36px;width:36px}.layout-sidebar-large .main-header .notification-dropdown{cursor:pointer;max-height:260px;padding:0}.layout-sidebar-large .main-header .notification-dropdown .dropdown-item{align-items:center;border-bottom:1px solid #d1d5db;display:flex;height:72px;padding:0}.layout-sidebar-large .main-header .notification-dropdown .dropdown-item .notification-icon{align-items:center;background:#e5e7eb;display:flex;height:100%;justify-content:center;width:44px}.layout-sidebar-large .main-header .notification-dropdown .dropdown-item .notification-icon i{font-size:18px}.layout-sidebar-large .main-header .notification-dropdown .dropdown-item .notification-details{padding:.25rem .75rem}.layout-sidebar-large .main-header .notification-dropdown .dropdown-item:active{background:inherit;color:inherit}.layout-sidebar-large .main-header button.dropdown-toggle{padding:0!important}@media (max-width:991px){.layout-sidebar-large .main-header .search-bar{width:180px}.layout-sidebar-large .main-header .menu-toggle{margin-right:36px;width:24px}}@media (max-width:790px){.layout-sidebar-large .main-header .search-bar,.layout-sidebar-large .main-header .switch{display:none}.layout-sidebar-large .main-header .menu-toggle{margin-right:36px;width:24px}}@media (max-width:576px){.layout-sidebar-large .main-header{height:70px;padding:0 1.5rem}.layout-sidebar-large .main-header .logo{width:60px}.layout-sidebar-large .main-header .search-bar{display:none}.layout-sidebar-large .main-header .menu-toggle{width:60px}.layout-sidebar-large .main-header .header-part-right .user{margin-right:0;padding-right:0}.layout-sidebar-large .notification-dropdown{left:0!important}}@media (max-width:360px){.layout-sidebar-large .main-header .menu-toggle{margin:0}}.app-admin-wrap{width:100%}.layout-sidebar-large .main-content-wrap{background:#fff;float:right;margin-top:80px;min-height:calc(100vh - 80px);padding:2rem 2rem 0;position:relative;transition:width .24s ease-in-out;width:100%}.layout-sidebar-large .main-content-wrap.sidenav-open{width:calc(100% - 120px)}.layout-sidebar-large .sidebar-left,.layout-sidebar-large .sidebar-left-secondary{background:#fff;box-shadow:0 4px 20px 1px rgba(0,0,0,.06),0 1px 4px rgba(0,0,0,.08);height:calc(100vh - 80px);position:fixed;top:80px}.layout-sidebar-large .sidebar-left{left:-140px;transition:left .24s ease-in-out;z-index:90}.layout-sidebar-large .sidebar-left.open{left:0}.layout-sidebar-large .sidebar-left .logo{display:none}.layout-sidebar-large .sidebar-left .navigation-left{height:100%;list-style:none;margin:0;padding:0;text-align:center;width:120px}.layout-sidebar-large .sidebar-left .navigation-left .nav-item{border-bottom:1px solid #d1d5db;color:#05070b;cursor:pointer;display:block;position:relative;width:100%}.layout-sidebar-large .sidebar-left .navigation-left .nav-item:active,.layout-sidebar-large .sidebar-left .navigation-left .nav-item:focus{outline:none}.layout-sidebar-large .sidebar-left .navigation-left .nav-item.lvl1{text-align:center}.layout-sidebar-large .sidebar-left .navigation-left .nav-item.active,.layout-sidebar-large .sidebar-left .navigation-left .nav-item.active .nav-item-hold{color:#ff630f}.layout-sidebar-large .sidebar-left .navigation-left .nav-item .nav-item-hold{color:#111827;display:block;padding:26px 0;width:100%}.layout-sidebar-large .sidebar-left .navigation-left .nav-item .nav-item-hold:active,.layout-sidebar-large .sidebar-left .navigation-left .nav-item .nav-item-hold:focus{outline:none}.layout-sidebar-large .sidebar-left .navigation-left .nav-item .nav-item-hold .feather,.layout-sidebar-large .sidebar-left .navigation-left .nav-item .nav-item-hold .nav-icon{display:block;font-size:32px;height:32px;margin:0 auto 6px;width:32px}.layout-sidebar-large .sidebar-left .navigation-left .nav-item .nav-item-hold .nav-text{display:block;font-size:13px;font-weight:400}.layout-sidebar-large .sidebar-left .navigation-left .nav-item .nav-item-hold a{color:#05070b}.layout-sidebar-large .sidebar-left .navigation-left .nav-item.active .triangle{border-color:transparent transparent #ff630f;border-style:solid;border-width:0 0 30px 30px;bottom:0;height:0;position:absolute;right:0;width:0}.layout-sidebar-large .sidebar-left-secondary{background:#fff;left:-240px;padding:.75rem 0;transition:left .24s ease-in-out;width:220px;z-index:89}.layout-sidebar-large .sidebar-left-secondary.open{left:120px}.layout-sidebar-large .sidebar-left-secondary header{display:none}.layout-sidebar-large .sidebar-left-secondary .childNav{display:none;list-style:none;padding:0}.layout-sidebar-large .sidebar-left-secondary .childNav li.nav-item{display:block}.layout-sidebar-large .sidebar-left-secondary .childNav li.nav-item a{align-items:center;color:#05070b;cursor:pointer;display:flex;font-size:13px;padding:12px 24px;text-transform:capitalize;transition:all .15s ease-in}.layout-sidebar-large .sidebar-left-secondary .childNav li.nav-item a:hover{background:#e5e7eb}.layout-sidebar-large .sidebar-left-secondary .childNav li.nav-item a.open,.layout-sidebar-large .sidebar-left-secondary .childNav li.nav-item a.open .nav-icon,.layout-sidebar-large .sidebar-left-secondary .childNav li.nav-item a.router-link-active,.layout-sidebar-large .sidebar-left-secondary .childNav li.nav-item a.router-link-active .nav-icon{color:#ff630f}.layout-sidebar-large .sidebar-left-secondary .childNav li.nav-item a .nav-icon{color:#4b5563;font-size:18px;margin-right:8px;vertical-align:middle}.layout-sidebar-large .sidebar-left-secondary .childNav li.nav-item a .item-name{font-weight:400;vertical-align:middle}.layout-sidebar-large .sidebar-left-secondary .childNav li.nav-item a .dd-arrow{font-size:11px;margin-left:auto;transition:all .3s ease-in}.layout-sidebar-large .sidebar-left-secondary>.childNav{margin:0}.layout-sidebar-large .sidebar-left-secondary li.nav-item.open>div>a>.dd-arrow{transform:rotate(90deg)}.layout-sidebar-large .sidebar-left-secondary li.nav-item.open>div>.childNav{max-height:1000px;overflow:visible}.layout-sidebar-large .sidebar-left-secondary li.nav-item>div>a>.dd-arrow{transition:all .4s ease-in-out}.layout-sidebar-large .sidebar-left-secondary li.nav-item>div>.childNav{background:#fff;max-height:0;overflow:hidden;transition:all .4s ease-in-out}.layout-sidebar-large .sidebar-left-secondary li.nav-item>div>.childNav li.nav-item a{padding:12px 12px 12px 50px}.layout-sidebar-large .sidebar-overlay{background:transparent;bottom:0;cursor:w-resize;display:none;height:calc(100vh - 80px);position:fixed;right:0;width:calc(100% - 340px);z-index:101}.layout-sidebar-large .sidebar-overlay.open{display:block}.module-loader{background:hsla(0,0%,100%,.5);height:100vh;left:0;position:fixed;top:0;width:100%;z-index:9}.module-loader .loader,.module-loader .spinner{left:calc(50% + 56px);position:fixed;top:45%;z-index:inherit}@media (max-width:1200px){.layout-sidebar-large .main-content-wrap.sidenav-open{width:100%}}@media (max-width:576px){.main-content-wrap{padding:1.5rem}.main-content-wrap.sidenav-open{width:100%}.main-content-wrap{margin-top:70px}.sidebar-left,.sidebar-left-secondary{height:calc(100vh - 70px)!important;top:70px!important}.sidebar-left{left:-110px}.sidebar-left .navigation-left{width:90px}.sidebar-left .navigation-left .nav-item.active .triangle{border-width:0 0 24px 24px}.sidebar-left .navigation-left .nav-item .nav-item-hold{padding:16px 0}.sidebar-left-secondary{left:-210px;width:190px}.sidebar-left-secondary.open{left:90px}.sidebar-overlay{height:calc(100vh - 70px)}}[dir=rtl] .layout-sidebar-large .sidebar-left{left:auto!important;right:-140px}[dir=rtl] .layout-sidebar-large .sidebar-left.open{left:auto!important;right:0}[dir=rtl] .layout-sidebar-large .sidebar-left .navigation-left .nav-item .triangle{left:0;right:auto;transform:rotate(90deg)}[dir=rtl] .layout-sidebar-large .sidebar-left-secondary{left:auto!important;right:-240px}[dir=rtl] .layout-sidebar-large .sidebar-left-secondary.open{left:auto!important;right:120px}[dir=rtl] .layout-sidebar-large .sidebar-left-secondary .childNav li.nav-item a .dd-arrow{margin-left:unset!important;margin-right:auto}[dir=rtl] .layout-sidebar-large .sidebar-left-secondary .childNav li.nav-item a .nav-icon{margin-left:8px;margin-right:0}[dir=rtl] .layout-sidebar-large .main-content-wrap{float:left}[dir=rtl] .layout-sidebar-large .sidebar-overlay{cursor:e-resize;left:0;right:auto!important}.app-footer{background:#f3f4f6}.app-footer .footer-bottom .btn{bottom:30px;position:fixed;right:60px}.sidebar-left-secondary .childNav li.nav-item.open>a{background:#e5e7eb}.sidebar-left-secondary .childNav li.nav-item.open>a>.dd-arrow{transform:rotate(90deg)}.sidebar-left-secondary .childNav li.nav-item.open>.submenu{max-height:1000px}.sidebar-left-secondary .childNav li.nav-item .submenu{list-style:none;margin:0;max-height:0;overflow:hidden;padding:0;transition:all .3s ease-in}.sidebar-left-secondary .childNav li.nav-item .submenu>li a{padding-left:50px}[dir=rtl] .notification-dropdown .dropdown-item .notification-details{text-align:right}[dir=rtl] .main-header .user{margin-left:2rem;margin-right:0}[role=tab] .btn{text-align:left;width:100%}[role=tab] .btn:focus,[role=tab] .btn:hover{text-decoration:none}.accordion>.card{overflow:hidden}.avatar-sm{height:36px;width:36px}.avatar-md{height:54px;width:54px}.avatar-lg{height:80px;width:80px}.avatar-xl{height:150px;width:150px}.avatar-sm-table{height:20px;width:20px}.border-bottom-primary{border-bottom:1px solid #ff630f}.border-bottom-secondary{border-bottom:1px solid #1f2937}.border-bottom-success{border-bottom:1px solid #10b981}.border-bottom-info{border-bottom:1px solid #3b82f6}.border-bottom-warning{border-bottom:1px solid #f59e0b}.border-bottom-danger{border-bottom:1px solid #ef4444}.border-bottom-light{border-bottom:1px solid #6b7280}.border-bottom-dark{border-bottom:1px solid #111827}.border-bottom-gray-100{border-bottom:1px solid #f3f4f6}.border-bottom-gray-200{border-bottom:1px solid #e5e7eb}.border-bottom-gray-300{border-bottom:1px solid #d1d5db}.border-bottom-gray-400{border-bottom:1px solid #9ca3af}.border-bottom-gray-500{border-bottom:1px solid #6b7280}.border-bottom-gray-600{border-bottom:1px solid #4b5563}.border-bottom-gray-700{border-bottom:1px solid #374151}.border-bottom-gray-800{border-bottom:1px solid #1f2937}.border-bottom-gray-900{border-bottom:1px solid #111827}.border-bottom-dotted-primary{border-bottom:1px dotted #ff630f}.border-bottom-dotted-secondary{border-bottom:1px dotted #1f2937}.border-bottom-dotted-success{border-bottom:1px dotted #10b981}.border-bottom-dotted-info{border-bottom:1px dotted #3b82f6}.border-bottom-dotted-warning{border-bottom:1px dotted #f59e0b}.border-bottom-dotted-danger{border-bottom:1px dotted #ef4444}.border-bottom-dotted-light{border-bottom:1px dotted #6b7280}.border-bottom-dotted-dark{border-bottom:1px dotted #111827}.border-bottom-dotted-gray-100{border-bottom:1px dotted #f3f4f6}.border-bottom-dotted-gray-200{border-bottom:1px dotted #e5e7eb}.border-bottom-dotted-gray-300{border-bottom:1px dotted #d1d5db}.border-bottom-dotted-gray-400{border-bottom:1px dotted #9ca3af}.border-bottom-dotted-gray-500{border-bottom:1px dotted #6b7280}.border-bottom-dotted-gray-600{border-bottom:1px dotted #4b5563}.border-bottom-dotted-gray-700{border-bottom:1px dotted #374151}.border-bottom-dotted-gray-800{border-bottom:1px dotted #1f2937}.border-bottom-dotted-gray-900{border-bottom:1px dotted #111827}.card{border:0;border-radius:10px;box-shadow:0 4px 20px 1px rgba(0,0,0,.06),0 1px 4px rgba(0,0,0,.08)}.card.border-top{box-shadow:0 4px 15px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.1),inset 0 2px 0 0 #10b981}.card-footer,.card-header{border-color:rgba(0,0,0,.03)}.card-title{font-size:1.1rem;margin-bottom:1.5rem}.card-img-overlay *{position:relative;z-index:1}.card-img-overlay:after{background:rgba(0,0,0,.36);content:"";height:100%;left:0;margin:auto;position:absolute;right:0;top:0;width:100%;z-index:0}.card-img-overlay .separator{margin:auto;width:35px}.card-img-overlay .card-footer{background:transparent;border:0;bottom:16px;left:20px;position:absolute}.card-img-overlay .card-footer [class^=i-]{font-size:.875rem;vertical-align:text-bottom}.card-icon .card-body{padding:2rem .5rem}.card-icon [class^=i-]{font-size:32px}.card-icon .lead,.card-icon [class^=i-]{color:#ff630f}.card-icon-big .card-body{padding:2rem .5rem}.card-icon-big [class^=i-]{color:rgba(255,99,15,.6);font-size:48px}.card-icon-bg{position:relative;z-index:1}.card-icon-bg .card-body{display:flex}.card-icon-bg .card-body .content{align-items:flex-start;display:flex;flex-direction:column;margin:auto}.card-icon-bg [class^=i-]{color:hsla(220,9%,46%,.28);font-size:4rem}.card-icon-bg .lead{line-height:1}.card-icon-bg-primary [class^=i-]{color:rgba(255,99,15,.28)}.card-icon-bg-secondary [class^=i-]{color:rgba(31,41,55,.28)}.card-icon-bg-success [class^=i-]{color:rgba(16,185,129,.28)}.card-icon-bg-info [class^=i-]{color:rgba(59,130,246,.28)}.card-icon-bg-warning [class^=i-]{color:rgba(245,158,11,.28)}.card-icon-bg-danger [class^=i-]{color:rgba(239,68,68,.28)}.card-icon-bg-light [class^=i-]{color:hsla(220,9%,46%,.28)}.card-icon-bg-dark [class^=i-]{color:rgba(17,24,39,.28)}.card-icon-bg-gray-100 [class^=i-]{color:rgba(243,244,246,.28)}.card-icon-bg-gray-200 [class^=i-]{color:rgba(229,231,235,.28)}.card-icon-bg-gray-300 [class^=i-]{color:rgba(209,213,219,.28)}.card-icon-bg-gray-400 [class^=i-]{color:rgba(156,163,175,.28)}.card-icon-bg-gray-500 [class^=i-]{color:hsla(220,9%,46%,.28)}.card-icon-bg-gray-600 [class^=i-]{color:rgba(75,85,99,.28)}.card-icon-bg-gray-700 [class^=i-]{color:rgba(55,65,81,.28)}.card-icon-bg-gray-800 [class^=i-]{color:rgba(31,41,55,.28)}.card-icon-bg-gray-900 [class^=i-]{color:rgba(17,24,39,.28)}.card-profile-1 .avatar{border-radius:50%;height:80px;margin:auto;overflow:hidden;width:80px}.card-ecommerce-1 .card-body [class^=i-]{color:#ff630f;display:block;font-size:78px}.card-ecommerce-2 .row{margin:0}.card-ecommerce-2 .card-action,.card-ecommerce-2 .col{padding:1rem}.card-ecommerce-2 .card-action{align-items:center;display:flex;position:relative}.card-ecommerce-2 .card-action .icon{cursor:pointer;display:inline-block;font-size:22px;height:24px;line-height:24px;margin:0 8px;width:24px}.card-ecommerce-2 .card-action:before{background:rgba(17,24,39,.1);content:"";height:100%;left:0;position:absolute;top:0;width:1px}.card-ecommerce-3 .card-img-left{height:220px;-o-object-fit:cover;object-fit:cover}.card-socials-simple a{display:inline-block;padding:4px}.card-zoom-in{background-color:#fff;position:relative}.card-zoom-in,.card-zoom-in:after{transition:all .6s cubic-bezier(.165,.84,.44,1)}.card-zoom-in:after{border-radius:5px;box-shadow:0 5px 15px rgba(0,0,0,.3);content:"";height:100%;left:0;opacity:0;position:absolute;top:0;width:100%}.card-zoom-in:hover{transform:scale(1.2)}.card-zoom-in:hover:after{opacity:1}@media screen and (max-width:576px){.card-ecommerce-3 .card-img-left{width:100%}}.breadcrumb{align-items:center;background:transparent;margin:0 0 1.25rem;padding:0}.breadcrumb h1{font-size:1.5rem;line-height:1;margin:0}.breadcrumb ul{list-style:none;margin:0;padding:0}.breadcrumb ul li{color:#4b5563;display:inline-block;line-height:1;padding:0 .5rem;position:relative;vertical-align:bottom}.breadcrumb ul li:after{background:#4b5563;border-radius:5px;content:"";height:16px;position:absolute;right:0;top:-1px;width:1px}.breadcrumb ul li:last-child:after{display:none}.breadcrumb ul li a{color:#05070b}[dir=rtl] .breadcrumb h1{font-size:1.5rem;line-height:1;margin:0 0 0 .5rem}@media (max-width:576px){.breadcrumb{align-items:flex-start;flex-direction:column}.breadcrumb ul li:first-child{padding-left:0}}.btn[type=button],html [type=button]{-webkit-appearance:none!important}.btn{padding:.5rem 1.25rem}.btn.btn-rounded,.btn.rounded{border-radius:40px!important}.btn.btn-xl{font-size:1.18rem;padding:.75rem 2rem}.btn:focus{box-shadow:none}.btn-raised-secondary,.btn-secondary{background-color:#fff!important;color:#111827!important}.btn-icon .icon,.btn-icon [class^=i-]{-webkit-font-smoothing:subpixel-antialiased;margin:0 2px;vertical-align:middle}.btn-icon.rounded-circle{height:44px;padding:0;width:44px}.btn-icon-text .icon,.btn-icon-text [class^=i-]{-webkit-font-smoothing:subpixel-antialiased;margin:0 2px;vertical-align:middle}.btn-outline-email{background:rgba(229,231,235,.6)}.btn-spinner{background:transparent;border:2px solid transparent;border-radius:50%;height:1em;margin:0 16px 0 0;width:1em}.btn-checkbox .checkbox,.btn-checkbox .radio{display:inline}.btn.btn-outline-light.btn-svg{border-color:#374151}.btn.btn-outline-light.btn-svg.active,.btn.btn-outline-light.btn-svg:hover{background:#ff630f;border-color:#ff630f}.btn.btn-outline-light.btn-svg.active svg,.btn.btn-outline-light.btn-svg:hover svg{fill:#fff}.btn.btn-outline-light.btn-svg:focus{box-shadow:none!important}.btn-raised{color:#fff}.btn-outline-primary,.btn-primary{border-color:#ff630f}.btn-outline-primary .btn-spinner,.btn-primary .btn-spinner{animation:btn-glow-primary 1s ease infinite}.btn-outline-primary:hover,.btn-primary:hover{background:#ff630f;border-color:#ff630f;box-shadow:0 8px 25px -8px #ff630f}.btn-outline-primary:focus,.btn-primary:focus{box-shadow:none;box-shadow:0 8px 25px -8px #ff630f}.btn-raised.btn-raised-primary{background:#ff630f;box-shadow:0 4px 6px rgba(255,99,15,.11),0 1px 3px rgba(255,99,15,.08)}@keyframes btn-glow-primary{0%{box-shadow:0 0 0 .4em #db4d00,0 0 0 .1em #db4d00;transform:rotate(1turn)}50%{border-top-color:#fff}to{box-shadow:0 0 0 .4em #db4d00,0 0 0 3.6em transparent}}.btn-outline-secondary,.btn-secondary{border-color:#1f2937}.btn-outline-secondary .btn-spinner,.btn-secondary .btn-spinner{animation:btn-glow-secondary 1s ease infinite}.btn-outline-secondary:hover,.btn-secondary:hover{background:#1f2937;border-color:#1f2937;box-shadow:0 8px 25px -8px #1f2937}.btn-outline-secondary:focus,.btn-secondary:focus{box-shadow:none;box-shadow:0 8px 25px -8px #1f2937}.btn-raised.btn-raised-secondary{background:#1f2937;box-shadow:0 4px 6px rgba(31,41,55,.11),0 1px 3px rgba(31,41,55,.08)}@keyframes btn-glow-secondary{0%{box-shadow:0 0 0 .4em #0d1116,0 0 0 .1em #0d1116;transform:rotate(1turn)}50%{border-top-color:#fff}to{box-shadow:0 0 0 .4em #0d1116,0 0 0 3.6em transparent}}.btn-outline-success,.btn-success{border-color:#10b981}.btn-outline-success .btn-spinner,.btn-success .btn-spinner{animation:btn-glow-success 1s ease infinite}.btn-outline-success:hover,.btn-success:hover{background:#10b981;border-color:#10b981;box-shadow:0 8px 25px -8px #10b981}.btn-outline-success:focus,.btn-success:focus{box-shadow:none;box-shadow:0 8px 25px -8px #10b981}.btn-raised.btn-raised-success{background:#10b981;box-shadow:0 4px 6px rgba(16,185,129,.11),0 1px 3px rgba(16,185,129,.08)}@keyframes btn-glow-success{0%{box-shadow:0 0 0 .4em #0c8a60,0 0 0 .1em #0c8a60;transform:rotate(1turn)}50%{border-top-color:#fff}to{box-shadow:0 0 0 .4em #0c8a60,0 0 0 3.6em transparent}}.btn-info,.btn-outline-info{border-color:#3b82f6}.btn-info .btn-spinner,.btn-outline-info .btn-spinner{animation:btn-glow-info 1s ease infinite}.btn-info:hover,.btn-outline-info:hover{background:#3b82f6;border-color:#3b82f6;box-shadow:0 8px 25px -8px #3b82f6}.btn-info:focus,.btn-outline-info:focus{box-shadow:none;box-shadow:0 8px 25px -8px #3b82f6}.btn-raised.btn-raised-info{background:#3b82f6;box-shadow:0 4px 6px rgba(59,130,246,.11),0 1px 3px rgba(59,130,246,.08)}@keyframes btn-glow-info{0%{box-shadow:0 0 0 .4em #0b63f3,0 0 0 .1em #0b63f3;transform:rotate(1turn)}50%{border-top-color:#fff}to{box-shadow:0 0 0 .4em #0b63f3,0 0 0 3.6em transparent}}.btn-outline-warning,.btn-warning{border-color:#f59e0b}.btn-outline-warning .btn-spinner,.btn-warning .btn-spinner{animation:btn-glow-warning 1s ease infinite}.btn-outline-warning:hover,.btn-warning:hover{background:#f59e0b;border-color:#f59e0b;box-shadow:0 8px 25px -8px #f59e0b}.btn-outline-warning:focus,.btn-warning:focus{box-shadow:none;box-shadow:0 8px 25px -8px #f59e0b}.btn-raised.btn-raised-warning{background:#f59e0b;box-shadow:0 4px 6px rgba(245,158,11,.11),0 1px 3px rgba(245,158,11,.08)}@keyframes btn-glow-warning{0%{box-shadow:0 0 0 .4em #c57f08,0 0 0 .1em #c57f08;transform:rotate(1turn)}50%{border-top-color:#fff}to{box-shadow:0 0 0 .4em #c57f08,0 0 0 3.6em transparent}}.btn-danger,.btn-outline-danger{border-color:#ef4444}.btn-danger .btn-spinner,.btn-outline-danger .btn-spinner{animation:btn-glow-danger 1s ease infinite}.btn-danger:hover,.btn-outline-danger:hover{background:#ef4444;border-color:#ef4444;box-shadow:0 8px 25px -8px #ef4444}.btn-danger:focus,.btn-outline-danger:focus{box-shadow:none;box-shadow:0 8px 25px -8px #ef4444}.btn-raised.btn-raised-danger{background:#ef4444;box-shadow:0 4px 6px rgba(239,68,68,.11),0 1px 3px rgba(239,68,68,.08)}@keyframes btn-glow-danger{0%{box-shadow:0 0 0 .4em #eb1515,0 0 0 .1em #eb1515;transform:rotate(1turn)}50%{border-top-color:#fff}to{box-shadow:0 0 0 .4em #eb1515,0 0 0 3.6em transparent}}.btn-light,.btn-outline-light{border-color:#6b7280}.btn-light .btn-spinner,.btn-outline-light .btn-spinner{animation:btn-glow-light 1s ease infinite}.btn-light:hover,.btn-outline-light:hover{background:#6b7280;border-color:#6b7280;box-shadow:0 8px 25px -8px #6b7280}.btn-light:focus,.btn-outline-light:focus{box-shadow:none;box-shadow:0 8px 25px -8px #6b7280}.btn-raised.btn-raised-light{background:#6b7280;box-shadow:0 4px 6px hsla(220,9%,46%,.11),0 1px 3px hsla(220,9%,46%,.08)}@keyframes btn-glow-light{0%{box-shadow:0 0 0 .4em #545964,0 0 0 .1em #545964;transform:rotate(1turn)}50%{border-top-color:#fff}to{box-shadow:0 0 0 .4em #545964,0 0 0 3.6em transparent}}.btn-dark,.btn-outline-dark{border-color:#111827}.btn-dark .btn-spinner,.btn-outline-dark .btn-spinner{animation:btn-glow-dark 1s ease infinite}.btn-dark:hover,.btn-outline-dark:hover{background:#111827;border-color:#111827;box-shadow:0 8px 25px -8px #111827}.btn-dark:focus,.btn-outline-dark:focus{box-shadow:none;box-shadow:0 8px 25px -8px #111827}.btn-raised.btn-raised-dark{background:#111827;box-shadow:0 4px 6px rgba(17,24,39,.11),0 1px 3px rgba(17,24,39,.08)}@keyframes btn-glow-dark{0%{box-shadow:0 0 0 .4em #020203,0 0 0 .1em #020203;transform:rotate(1turn)}50%{border-top-color:#fff}to{box-shadow:0 0 0 .4em #020203,0 0 0 3.6em transparent}}.btn-gray-100,.btn-outline-gray-100{border-color:#f3f4f6}.btn-gray-100 .btn-spinner,.btn-outline-gray-100 .btn-spinner{animation:btn-glow-gray-100 1s ease infinite}.btn-gray-100:hover,.btn-outline-gray-100:hover{background:#f3f4f6;border-color:#f3f4f6;box-shadow:0 8px 25px -8px #f3f4f6}.btn-gray-100:focus,.btn-outline-gray-100:focus{box-shadow:none;box-shadow:0 8px 25px -8px #f3f4f6}.btn-raised.btn-raised-gray-100{background:#f3f4f6;box-shadow:0 4px 6px rgba(243,244,246,.11),0 1px 3px rgba(243,244,246,.08)}@keyframes btn-glow-gray-100{0%{box-shadow:0 0 0 .4em #d6d9e0,0 0 0 .1em #d6d9e0;transform:rotate(1turn)}50%{border-top-color:#fff}to{box-shadow:0 0 0 .4em #d6d9e0,0 0 0 3.6em transparent}}.btn-gray-200,.btn-outline-gray-200{border-color:#e5e7eb}.btn-gray-200 .btn-spinner,.btn-outline-gray-200 .btn-spinner{animation:btn-glow-gray-200 1s ease infinite}.btn-gray-200:hover,.btn-outline-gray-200:hover{background:#e5e7eb;border-color:#e5e7eb;box-shadow:0 8px 25px -8px #e5e7eb}.btn-gray-200:focus,.btn-outline-gray-200:focus{box-shadow:none;box-shadow:0 8px 25px -8px #e5e7eb}.btn-raised.btn-raised-gray-200{background:#e5e7eb;box-shadow:0 4px 6px rgba(229,231,235,.11),0 1px 3px rgba(229,231,235,.08)}@keyframes btn-glow-gray-200{0%{box-shadow:0 0 0 .4em #c8ccd5,0 0 0 .1em #c8ccd5;transform:rotate(1turn)}50%{border-top-color:#fff}to{box-shadow:0 0 0 .4em #c8ccd5,0 0 0 3.6em transparent}}.btn-gray-300,.btn-outline-gray-300{border-color:#d1d5db}.btn-gray-300 .btn-spinner,.btn-outline-gray-300 .btn-spinner{animation:btn-glow-gray-300 1s ease infinite}.btn-gray-300:hover,.btn-outline-gray-300:hover{background:#d1d5db;border-color:#d1d5db;box-shadow:0 8px 25px -8px #d1d5db}.btn-gray-300:focus,.btn-outline-gray-300:focus{box-shadow:none;box-shadow:0 8px 25px -8px #d1d5db}.btn-raised.btn-raised-gray-300{background:#d1d5db;box-shadow:0 4px 6px rgba(209,213,219,.11),0 1px 3px rgba(209,213,219,.08)}@keyframes btn-glow-gray-300{0%{box-shadow:0 0 0 .4em #b4bbc5,0 0 0 .1em #b4bbc5;transform:rotate(1turn)}50%{border-top-color:#fff}to{box-shadow:0 0 0 .4em #b4bbc5,0 0 0 3.6em transparent}}.btn-gray-400,.btn-outline-gray-400{border-color:#9ca3af}.btn-gray-400 .btn-spinner,.btn-outline-gray-400 .btn-spinner{animation:btn-glow-gray-400 1s ease infinite}.btn-gray-400:hover,.btn-outline-gray-400:hover{background:#9ca3af;border-color:#9ca3af;box-shadow:0 8px 25px -8px #9ca3af}.btn-gray-400:focus,.btn-outline-gray-400:focus{box-shadow:none;box-shadow:0 8px 25px -8px #9ca3af}.btn-raised.btn-raised-gray-400{background:#9ca3af;box-shadow:0 4px 6px rgba(156,163,175,.11),0 1px 3px rgba(156,163,175,.08)}@keyframes btn-glow-gray-400{0%{box-shadow:0 0 0 .4em #808998,0 0 0 .1em #808998;transform:rotate(1turn)}50%{border-top-color:#fff}to{box-shadow:0 0 0 .4em #808998,0 0 0 3.6em transparent}}.btn-gray-500,.btn-outline-gray-500{border-color:#6b7280}.btn-gray-500 .btn-spinner,.btn-outline-gray-500 .btn-spinner{animation:btn-glow-gray-500 1s ease infinite}.btn-gray-500:hover,.btn-outline-gray-500:hover{background:#6b7280;border-color:#6b7280;box-shadow:0 8px 25px -8px #6b7280}.btn-gray-500:focus,.btn-outline-gray-500:focus{box-shadow:none;box-shadow:0 8px 25px -8px #6b7280}.btn-raised.btn-raised-gray-500{background:#6b7280;box-shadow:0 4px 6px hsla(220,9%,46%,.11),0 1px 3px hsla(220,9%,46%,.08)}@keyframes btn-glow-gray-500{0%{box-shadow:0 0 0 .4em #545964,0 0 0 .1em #545964;transform:rotate(1turn)}50%{border-top-color:#fff}to{box-shadow:0 0 0 .4em #545964,0 0 0 3.6em transparent}}.btn-gray-600,.btn-outline-gray-600{border-color:#4b5563}.btn-gray-600 .btn-spinner,.btn-outline-gray-600 .btn-spinner{animation:btn-glow-gray-600 1s ease infinite}.btn-gray-600:hover,.btn-outline-gray-600:hover{background:#4b5563;border-color:#4b5563;box-shadow:0 8px 25px -8px #4b5563}.btn-gray-600:focus,.btn-outline-gray-600:focus{box-shadow:none;box-shadow:0 8px 25px -8px #4b5563}.btn-raised.btn-raised-gray-600{background:#4b5563;box-shadow:0 4px 6px rgba(75,85,99,.11),0 1px 3px rgba(75,85,99,.08)}@keyframes btn-glow-gray-600{0%{box-shadow:0 0 0 .4em #353c46,0 0 0 .1em #353c46;transform:rotate(1turn)}50%{border-top-color:#fff}to{box-shadow:0 0 0 .4em #353c46,0 0 0 3.6em transparent}}.btn-gray-700,.btn-outline-gray-700{border-color:#374151}.btn-gray-700 .btn-spinner,.btn-outline-gray-700 .btn-spinner{animation:btn-glow-gray-700 1s ease infinite}.btn-gray-700:hover,.btn-outline-gray-700:hover{background:#374151;border-color:#374151;box-shadow:0 8px 25px -8px #374151}.btn-gray-700:focus,.btn-outline-gray-700:focus{box-shadow:none;box-shadow:0 8px 25px -8px #374151}.btn-raised.btn-raised-gray-700{background:#374151;box-shadow:0 4px 6px rgba(55,65,81,.11),0 1px 3px rgba(55,65,81,.08)}@keyframes btn-glow-gray-700{0%{box-shadow:0 0 0 .4em #222933,0 0 0 .1em #222933;transform:rotate(1turn)}50%{border-top-color:#fff}to{box-shadow:0 0 0 .4em #222933,0 0 0 3.6em transparent}}.btn-gray-800,.btn-outline-gray-800{border-color:#1f2937}.btn-gray-800 .btn-spinner,.btn-outline-gray-800 .btn-spinner{animation:btn-glow-gray-800 1s ease infinite}.btn-gray-800:hover,.btn-outline-gray-800:hover{background:#1f2937;border-color:#1f2937;box-shadow:0 8px 25px -8px #1f2937}.btn-gray-800:focus,.btn-outline-gray-800:focus{box-shadow:none;box-shadow:0 8px 25px -8px #1f2937}.btn-raised.btn-raised-gray-800{background:#1f2937;box-shadow:0 4px 6px rgba(31,41,55,.11),0 1px 3px rgba(31,41,55,.08)}@keyframes btn-glow-gray-800{0%{box-shadow:0 0 0 .4em #0d1116,0 0 0 .1em #0d1116;transform:rotate(1turn)}50%{border-top-color:#fff}to{box-shadow:0 0 0 .4em #0d1116,0 0 0 3.6em transparent}}.btn-gray-900,.btn-outline-gray-900{border-color:#111827}.btn-gray-900 .btn-spinner,.btn-outline-gray-900 .btn-spinner{animation:btn-glow-gray-900 1s ease infinite}.btn-gray-900:hover,.btn-outline-gray-900:hover{background:#111827;border-color:#111827;box-shadow:0 8px 25px -8px #111827}.btn-gray-900:focus,.btn-outline-gray-900:focus{box-shadow:none;box-shadow:0 8px 25px -8px #111827}.btn-raised.btn-raised-gray-900{background:#111827;box-shadow:0 4px 6px rgba(17,24,39,.11),0 1px 3px rgba(17,24,39,.08)}@keyframes btn-glow-gray-900{0%{box-shadow:0 0 0 .4em #020203,0 0 0 .1em #020203;transform:rotate(1turn)}50%{border-top-color:#fff}to{box-shadow:0 0 0 .4em #020203,0 0 0 3.6em transparent}}.btn-facebook{color:#fff}.btn-facebook,.btn-facebook:hover{background-color:#3765c9;border-color:#3765c9}.btn-google{background-color:#ec412c;border-color:#ec412c;color:#fff}.btn-twitter{background-color:#039ff5;border-color:#039ff5;color:#fff}.btn-instagram{background-color:#c13584;border-color:#c13584;color:#fff}.btn-linkedin{background-color:#0077b5;border-color:#0077b5;color:#fff}.btn-dribble{background-color:#ea4c89;border-color:#ea4c89;color:#fff}.btn-youtube{background-color:#c4302b;border-color:#c4302b;color:#fff}.btn-outline-facebook{background:rgba(229,231,235,.6);border-color:#3765c9;color:#3765c9!important}.btn-outline-facebook:hover{background:#315bb5;border-color:#315bb5;color:#fff!important}.btn-outline-google{background:rgba(229,231,235,.6);border-color:#ec412c;color:#ec412c!important}.btn-outline-google:hover{background:#e92c15;border-color:#e92c15;color:#fff!important}.btn-outline-twitter{background:rgba(229,231,235,.6);border-color:#039ff5;color:#039ff5!important}.btn-outline-twitter:hover{background:#038fdc;border-color:#038fdc}.ripple{overflow:hidden;position:relative;transform:translateZ(0)}.ripple:after{background-image:radial-gradient(circle,#fff 10%,transparent 10.01%);background-position:50%;background-repeat:no-repeat;content:"";display:block;height:100%;left:0;opacity:0;pointer-events:none;position:absolute;top:0;transform:scale(10);transition:transform .5s,opacity 1s;width:100%}.ripple:active:after{opacity:.3;transform:scale(0);transition:0s}.nav-tabs{border:0}.nav-tabs .nav-item .nav-link{border:0;padding:1rem}.nav-tabs .nav-item .nav-link:not(.disabled){color:inherit}.nav-tabs .nav-item .nav-link.active{background:rgba(255,99,15,.1);border-bottom:2px solid #ff630f}.nav-tabs .nav-item .dropdown-toggle:after{position:absolute;right:6px!important;top:calc(50% - 2px)}.tab-content{padding:1rem}ngb-tabset.p-0 .tab-content{padding:1rem 0}.dropdown-toggle{position:relative}.dropdown-toggle.btn{padding-right:28px}.dropdown-toggle:after{position:absolute;right:10px!important;top:calc(50% - 2px)}.dropdown-menu{border:0;box-shadow:0 1px 15px 1px rgba(0,0,0,.04),0 1px 6px rgba(0,0,0,.08);padding:0!important}.dropdown-item{padding:.42rem 1.5rem}.menu-icon-grid{display:flex;flex-wrap:wrap;justify-content:space-between;padding:0 8px;width:220px}.menu-icon-grid>a{align-items:center;border-radius:4px;color:#1f2937;display:inline-flex;flex-direction:column;padding:18px 12px;width:6rem}.menu-icon-grid>a i{font-size:28px;margin-bottom:4px}.menu-icon-grid>a:hover{background:#ff630f;color:#fff}.mega-menu{position:static}.mega-menu .dropdown-menu{left:auto;max-height:calc(100vh - 100px);max-width:1200px;overflow:hidden;overflow-y:scroll;padding:0;right:auto;width:calc(100% - 120px)}.mega-menu .dropdown-menu .bg-img{background:linear-gradient(90deg,#ff630f,#3b82f6)}.mega-menu .dropdown-menu .bg-img,.mega-menu .dropdown-menu .bg-img .title{color:#fff}.mega-menu .dropdown-menu ul.links{-moz-column-count:2;column-count:2;list-style:none;margin:0;padding:0}.mega-menu .dropdown-menu ul.links li a{color:#4b5563;display:inline-block;margin-bottom:8px}.mega-menu .dropdown-menu ul.links li a:hover{color:#ff630f}.widget_dropdown .dropdown-menu{left:auto!important;right:2px!important}@media (max-width:767px){.mega-menu .dropdown-menu{width:calc(100% - 10px)}}[dir=rtl] .mega-menu .dropdown-menu{left:0!important;margin:auto!important;right:0!important}table.dataTable-collapse{border-collapse:collapse!important}.table thead th{border-bottom:1px solid #dee2e6;vertical-align:bottom}.form-group{margin-bottom:10px;position:relative}.form-group label{color:#4b5563;font-size:12px;margin-bottom:4px}.form-control{background:#f3f4f6;border:1px solid #9ca3af;color:#111827;outline:initial!important}.form-control::-moz-placeholder{color:#6b7280}.form-control::placeholder{color:#6b7280}.form-control.form-control-rounded,.form-control.rounded{border-radius:20px}select.form-control{-webkit-appearance:none}.input-group [type=text].form-control{height:34px}.input-group-append .btn{border:0;height:34px}.card-input{display:flex;flex-wrap:wrap}.card-input legend{margin-right:auto;width:auto}.card-input .ul-widget-list__payment-method img{height:24px;width:auto}[ngbdatepicker]{height:34px}.checkbox,.radio{cursor:pointer;display:block;margin-bottom:12px;padding-left:28px;position:relative;-webkit-user-select:none;-moz-user-select:none;user-select:none}.checkbox:hover input~.checkmark,.radio:hover input~.checkmark{background-color:#6b7280}.checkbox input,.radio input{cursor:pointer;height:0;opacity:0;position:absolute;width:0}.checkbox input:checked~.checkmark,.radio input:checked~.checkmark{background-color:#ff630f}.checkbox input:checked~.checkmark:after,.radio input:checked~.checkmark:after{display:block}.checkbox input[disabled]~*,.radio input[disabled]~*{color:#d1d5db}.checkbox .checkmark,.radio .checkmark{background-color:#d1d5db;border-radius:4px;height:20px;left:0;position:absolute;top:0;width:20px}.checkbox .checkmark:after,.radio .checkmark:after{border:solid #fff;border-width:0 2px 2px 0;bottom:0;content:"";display:none;height:8px;left:0;margin:auto;position:absolute;right:0;top:0;transform:rotate(45deg);width:4px}.checkbox-primary input:checked~.checkmark{background-color:#ff630f!important}.checkbox-secondary input:checked~.checkmark{background-color:#1f2937!important}.checkbox-success input:checked~.checkmark{background-color:#10b981!important}.checkbox-info input:checked~.checkmark{background-color:#3b82f6!important}.checkbox-warning input:checked~.checkmark{background-color:#f59e0b!important}.checkbox-danger input:checked~.checkmark{background-color:#ef4444!important}.checkbox-light input:checked~.checkmark{background-color:#6b7280!important}.checkbox-dark input:checked~.checkmark{background-color:#111827!important}.checkbox-gray-100 input:checked~.checkmark{background-color:#f3f4f6!important}.checkbox-gray-200 input:checked~.checkmark{background-color:#e5e7eb!important}.checkbox-gray-300 input:checked~.checkmark{background-color:#d1d5db!important}.checkbox-gray-400 input:checked~.checkmark{background-color:#9ca3af!important}.checkbox-gray-500 input:checked~.checkmark{background-color:#6b7280!important}.checkbox-gray-600 input:checked~.checkmark{background-color:#4b5563!important}.checkbox-gray-700 input:checked~.checkmark{background-color:#374151!important}.checkbox-gray-800 input:checked~.checkmark{background-color:#1f2937!important}.checkbox-gray-900 input:checked~.checkmark{background-color:#111827!important}.checkbox-outline-primary:hover input~.checkmark{background-color:#e5e7eb}.checkbox-outline-primary input:checked~.checkmark{background-color:#fff!important}.checkbox-outline-primary .checkmark{background:#fff;border:1px solid #ff630f}.checkbox-outline-primary .checkmark:after{border-color:#ff630f}.checkbox-outline-secondary:hover input~.checkmark{background-color:#e5e7eb}.checkbox-outline-secondary input:checked~.checkmark{background-color:#fff!important}.checkbox-outline-secondary .checkmark{background:#fff;border:1px solid #1f2937}.checkbox-outline-secondary .checkmark:after{border-color:#1f2937}.checkbox-outline-success:hover input~.checkmark{background-color:#e5e7eb}.checkbox-outline-success input:checked~.checkmark{background-color:#fff!important}.checkbox-outline-success .checkmark{background:#fff;border:1px solid #10b981}.checkbox-outline-success .checkmark:after{border-color:#10b981}.checkbox-outline-info:hover input~.checkmark{background-color:#e5e7eb}.checkbox-outline-info input:checked~.checkmark{background-color:#fff!important}.checkbox-outline-info .checkmark{background:#fff;border:1px solid #3b82f6}.checkbox-outline-info .checkmark:after{border-color:#3b82f6}.checkbox-outline-warning:hover input~.checkmark{background-color:#e5e7eb}.checkbox-outline-warning input:checked~.checkmark{background-color:#fff!important}.checkbox-outline-warning .checkmark{background:#fff;border:1px solid #f59e0b}.checkbox-outline-warning .checkmark:after{border-color:#f59e0b}.checkbox-outline-danger:hover input~.checkmark{background-color:#e5e7eb}.checkbox-outline-danger input:checked~.checkmark{background-color:#fff!important}.checkbox-outline-danger .checkmark{background:#fff;border:1px solid #ef4444}.checkbox-outline-danger .checkmark:after{border-color:#ef4444}.checkbox-outline-light:hover input~.checkmark{background-color:#e5e7eb}.checkbox-outline-light input:checked~.checkmark{background-color:#fff!important}.checkbox-outline-light .checkmark{background:#fff;border:1px solid #6b7280}.checkbox-outline-light .checkmark:after{border-color:#6b7280}.checkbox-outline-dark:hover input~.checkmark{background-color:#e5e7eb}.checkbox-outline-dark input:checked~.checkmark{background-color:#fff!important}.checkbox-outline-dark .checkmark{background:#fff;border:1px solid #111827}.checkbox-outline-dark .checkmark:after{border-color:#111827}.checkbox-outline-gray-100:hover input~.checkmark{background-color:#e5e7eb}.checkbox-outline-gray-100 input:checked~.checkmark{background-color:#fff!important}.checkbox-outline-gray-100 .checkmark{background:#fff;border:1px solid #f3f4f6}.checkbox-outline-gray-100 .checkmark:after{border-color:#f3f4f6}.checkbox-outline-gray-200:hover input~.checkmark{background-color:#e5e7eb}.checkbox-outline-gray-200 input:checked~.checkmark{background-color:#fff!important}.checkbox-outline-gray-200 .checkmark{background:#fff;border:1px solid #e5e7eb}.checkbox-outline-gray-200 .checkmark:after{border-color:#e5e7eb}.checkbox-outline-gray-300:hover input~.checkmark{background-color:#e5e7eb}.checkbox-outline-gray-300 input:checked~.checkmark{background-color:#fff!important}.checkbox-outline-gray-300 .checkmark{background:#fff;border:1px solid #d1d5db}.checkbox-outline-gray-300 .checkmark:after{border-color:#d1d5db}.checkbox-outline-gray-400:hover input~.checkmark{background-color:#e5e7eb}.checkbox-outline-gray-400 input:checked~.checkmark{background-color:#fff!important}.checkbox-outline-gray-400 .checkmark{background:#fff;border:1px solid #9ca3af}.checkbox-outline-gray-400 .checkmark:after{border-color:#9ca3af}.checkbox-outline-gray-500:hover input~.checkmark{background-color:#e5e7eb}.checkbox-outline-gray-500 input:checked~.checkmark{background-color:#fff!important}.checkbox-outline-gray-500 .checkmark{background:#fff;border:1px solid #6b7280}.checkbox-outline-gray-500 .checkmark:after{border-color:#6b7280}.checkbox-outline-gray-600:hover input~.checkmark{background-color:#e5e7eb}.checkbox-outline-gray-600 input:checked~.checkmark{background-color:#fff!important}.checkbox-outline-gray-600 .checkmark{background:#fff;border:1px solid #4b5563}.checkbox-outline-gray-600 .checkmark:after{border-color:#4b5563}.checkbox-outline-gray-700:hover input~.checkmark{background-color:#e5e7eb}.checkbox-outline-gray-700 input:checked~.checkmark{background-color:#fff!important}.checkbox-outline-gray-700 .checkmark{background:#fff;border:1px solid #374151}.checkbox-outline-gray-700 .checkmark:after{border-color:#374151}.checkbox-outline-gray-800:hover input~.checkmark{background-color:#e5e7eb}.checkbox-outline-gray-800 input:checked~.checkmark{background-color:#fff!important}.checkbox-outline-gray-800 .checkmark{background:#fff;border:1px solid #1f2937}.checkbox-outline-gray-800 .checkmark:after{border-color:#1f2937}.checkbox-outline-gray-900:hover input~.checkmark{background-color:#e5e7eb}.checkbox-outline-gray-900 input:checked~.checkmark{background-color:#fff!important}.checkbox-outline-gray-900 .checkmark{background:#fff;border:1px solid #111827}.checkbox-outline-gray-900 .checkmark:after{border-color:#111827}.radio .checkmark{border-radius:50%}.radio .checkmark:after{background:#fff;border-radius:50%;height:6px;width:6px}.radio-primary input:checked~.checkmark{background-color:#ff630f}.radio-secondary input:checked~.checkmark{background-color:#1f2937}.radio-success input:checked~.checkmark{background-color:#10b981}.radio-info input:checked~.checkmark{background-color:#3b82f6}.radio-warning input:checked~.checkmark{background-color:#f59e0b}.radio-danger input:checked~.checkmark{background-color:#ef4444}.radio-light input:checked~.checkmark{background-color:#6b7280}.radio-dark input:checked~.checkmark{background-color:#111827}.radio-gray-100 input:checked~.checkmark{background-color:#f3f4f6}.radio-gray-200 input:checked~.checkmark{background-color:#e5e7eb}.radio-gray-300 input:checked~.checkmark{background-color:#d1d5db}.radio-gray-400 input:checked~.checkmark{background-color:#9ca3af}.radio-gray-500 input:checked~.checkmark{background-color:#6b7280}.radio-gray-600 input:checked~.checkmark{background-color:#4b5563}.radio-gray-700 input:checked~.checkmark{background-color:#374151}.radio-gray-800 input:checked~.checkmark{background-color:#1f2937}.radio-gray-900 input:checked~.checkmark{background-color:#111827}.radio-outline-primary:hover input~.checkmark{background-color:#e5e7eb}.radio-outline-primary input:checked~.checkmark{background-color:#fff!important}.radio-outline-primary .checkmark{background:#fff;border:1px solid #ff630f}.radio-outline-primary .checkmark:after{background:#ff630f;border:0}.radio-outline-secondary:hover input~.checkmark{background-color:#e5e7eb}.radio-outline-secondary input:checked~.checkmark{background-color:#fff!important}.radio-outline-secondary .checkmark{background:#fff;border:1px solid #1f2937}.radio-outline-secondary .checkmark:after{background:#1f2937;border:0}.radio-outline-success:hover input~.checkmark{background-color:#e5e7eb}.radio-outline-success input:checked~.checkmark{background-color:#fff!important}.radio-outline-success .checkmark{background:#fff;border:1px solid #10b981}.radio-outline-success .checkmark:after{background:#10b981;border:0}.radio-outline-info:hover input~.checkmark{background-color:#e5e7eb}.radio-outline-info input:checked~.checkmark{background-color:#fff!important}.radio-outline-info .checkmark{background:#fff;border:1px solid #3b82f6}.radio-outline-info .checkmark:after{background:#3b82f6;border:0}.radio-outline-warning:hover input~.checkmark{background-color:#e5e7eb}.radio-outline-warning input:checked~.checkmark{background-color:#fff!important}.radio-outline-warning .checkmark{background:#fff;border:1px solid #f59e0b}.radio-outline-warning .checkmark:after{background:#f59e0b;border:0}.radio-outline-danger:hover input~.checkmark{background-color:#e5e7eb}.radio-outline-danger input:checked~.checkmark{background-color:#fff!important}.radio-outline-danger .checkmark{background:#fff;border:1px solid #ef4444}.radio-outline-danger .checkmark:after{background:#ef4444;border:0}.radio-outline-light:hover input~.checkmark{background-color:#e5e7eb}.radio-outline-light input:checked~.checkmark{background-color:#fff!important}.radio-outline-light .checkmark{background:#fff;border:1px solid #6b7280}.radio-outline-light .checkmark:after{background:#6b7280;border:0}.radio-outline-dark:hover input~.checkmark{background-color:#e5e7eb}.radio-outline-dark input:checked~.checkmark{background-color:#fff!important}.radio-outline-dark .checkmark{background:#fff;border:1px solid #111827}.radio-outline-dark .checkmark:after{background:#111827;border:0}.radio-outline-gray-100:hover input~.checkmark{background-color:#e5e7eb}.radio-outline-gray-100 input:checked~.checkmark{background-color:#fff!important}.radio-outline-gray-100 .checkmark{background:#fff;border:1px solid #f3f4f6}.radio-outline-gray-100 .checkmark:after{background:#f3f4f6;border:0}.radio-outline-gray-200:hover input~.checkmark{background-color:#e5e7eb}.radio-outline-gray-200 input:checked~.checkmark{background-color:#fff!important}.radio-outline-gray-200 .checkmark{background:#fff;border:1px solid #e5e7eb}.radio-outline-gray-200 .checkmark:after{background:#e5e7eb;border:0}.radio-outline-gray-300:hover input~.checkmark{background-color:#e5e7eb}.radio-outline-gray-300 input:checked~.checkmark{background-color:#fff!important}.radio-outline-gray-300 .checkmark{background:#fff;border:1px solid #d1d5db}.radio-outline-gray-300 .checkmark:after{background:#d1d5db;border:0}.radio-outline-gray-400:hover input~.checkmark{background-color:#e5e7eb}.radio-outline-gray-400 input:checked~.checkmark{background-color:#fff!important}.radio-outline-gray-400 .checkmark{background:#fff;border:1px solid #9ca3af}.radio-outline-gray-400 .checkmark:after{background:#9ca3af;border:0}.radio-outline-gray-500:hover input~.checkmark{background-color:#e5e7eb}.radio-outline-gray-500 input:checked~.checkmark{background-color:#fff!important}.radio-outline-gray-500 .checkmark{background:#fff;border:1px solid #6b7280}.radio-outline-gray-500 .checkmark:after{background:#6b7280;border:0}.radio-outline-gray-600:hover input~.checkmark{background-color:#e5e7eb}.radio-outline-gray-600 input:checked~.checkmark{background-color:#fff!important}.radio-outline-gray-600 .checkmark{background:#fff;border:1px solid #4b5563}.radio-outline-gray-600 .checkmark:after{background:#4b5563;border:0}.radio-outline-gray-700:hover input~.checkmark{background-color:#e5e7eb}.radio-outline-gray-700 input:checked~.checkmark{background-color:#fff!important}.radio-outline-gray-700 .checkmark{background:#fff;border:1px solid #374151}.radio-outline-gray-700 .checkmark:after{background:#374151;border:0}.radio-outline-gray-800:hover input~.checkmark{background-color:#e5e7eb}.radio-outline-gray-800 input:checked~.checkmark{background-color:#fff!important}.radio-outline-gray-800 .checkmark{background:#fff;border:1px solid #1f2937}.radio-outline-gray-800 .checkmark:after{background:#1f2937;border:0}.radio-outline-gray-900:hover input~.checkmark{background-color:#e5e7eb}.radio-outline-gray-900 input:checked~.checkmark{background-color:#fff!important}.radio-outline-gray-900 .checkmark{background:#fff;border:1px solid #111827}.radio-outline-gray-900 .checkmark:after{background:#111827;border:0}.switch{display:inline-block;height:16px;padding-left:50px;position:relative}.switch span:not(.slider){cursor:pointer;position:relative;top:-2px}.switch input{height:0;opacity:0;width:0}.switch .slider{background-color:#d1d5db;border-radius:34px;bottom:0;cursor:pointer;left:0;position:absolute;right:0;top:0;transition:.4s;width:42px}.switch .slider:before{background-color:#fff;border-radius:50%;bottom:-4px;box-shadow:0 3px 1px -2px rgba(0,0,0,.2),0 2px 2px 0 rgba(0,0,0,.14),0 1px 5px 0 rgba(0,0,0,.12);content:"";height:24px;left:-1px;position:absolute;transition:.4s;width:24px}.switch input:checked+.slider{background-color:#ff630f}.switch input:focus+.slider{box-shadow:0 0 1px #ff630f}.switch input:checked+.slider:before{transform:translateX(20px)}.switch-primary input:checked+.slider{background-color:#ff630f}.switch-primary input:focus+.slider{box-shadow:0 0 1px #ff630f}.switch-secondary input:checked+.slider{background-color:#1f2937}.switch-secondary input:focus+.slider{box-shadow:0 0 1px #1f2937}.switch-success input:checked+.slider{background-color:#10b981}.switch-success input:focus+.slider{box-shadow:0 0 1px #10b981}.switch-info input:checked+.slider{background-color:#3b82f6}.switch-info input:focus+.slider{box-shadow:0 0 1px #3b82f6}.switch-warning input:checked+.slider{background-color:#f59e0b}.switch-warning input:focus+.slider{box-shadow:0 0 1px #f59e0b}.switch-danger input:checked+.slider{background-color:#ef4444}.switch-danger input:focus+.slider{box-shadow:0 0 1px #ef4444}.switch-light input:checked+.slider{background-color:#6b7280}.switch-light input:focus+.slider{box-shadow:0 0 1px #6b7280}.switch-dark input:checked+.slider{background-color:#111827}.switch-dark input:focus+.slider{box-shadow:0 0 1px #111827}.switch-gray-100 input:checked+.slider{background-color:#f3f4f6}.switch-gray-100 input:focus+.slider{box-shadow:0 0 1px #f3f4f6}.switch-gray-200 input:checked+.slider{background-color:#e5e7eb}.switch-gray-200 input:focus+.slider{box-shadow:0 0 1px #e5e7eb}.switch-gray-300 input:checked+.slider{background-color:#d1d5db}.switch-gray-300 input:focus+.slider{box-shadow:0 0 1px #d1d5db}.switch-gray-400 input:checked+.slider{background-color:#9ca3af}.switch-gray-400 input:focus+.slider{box-shadow:0 0 1px #9ca3af}.switch-gray-500 input:checked+.slider{background-color:#6b7280}.switch-gray-500 input:focus+.slider{box-shadow:0 0 1px #6b7280}.switch-gray-600 input:checked+.slider{background-color:#4b5563}.switch-gray-600 input:focus+.slider{box-shadow:0 0 1px #4b5563}.switch-gray-700 input:checked+.slider{background-color:#374151}.switch-gray-700 input:focus+.slider{box-shadow:0 0 1px #374151}.switch-gray-800 input:checked+.slider{background-color:#1f2937}.switch-gray-800 input:focus+.slider{box-shadow:0 0 1px #1f2937}.switch-gray-900 input:checked+.slider{background-color:#111827}.switch-gray-900 input:focus+.slider{box-shadow:0 0 1px #111827}[dir=rtl] .checkbox,[dir=rtl] .radio{padding-left:0;padding-right:28px}[dir=rtl] .checkbox .checkmark,[dir=rtl] .radio .checkmark{left:auto;right:0}.icon-regular{-webkit-font-smoothing:subpixel-antialiased;font-size:18px}.link-icon{align-items:center;color:#111827;display:flex;flex-direction:row}.link-icon i{margin:0 8px}.spinner-glow{animation:glow 1s ease infinite;background:#d1d5db;border:2px solid transparent;border-radius:50%;display:inline-block;height:1em;margin:4px auto;width:1em}@keyframes glow{0%{box-shadow:0 0 0 .4em #a1a2a1,0 0 0 .1em #a1a2a1;transform:rotate(1turn)}50%{border-top-color:#605556}to{box-shadow:0 0 0 .4em #a1a2a1,0 0 0 3.6em transparent}}.spinner-glow-primary{animation:glow-primary 1s ease infinite;background:rgba(255,99,15,.45)}.spinner-glow-secondary{animation:glow-secondary 1s ease infinite;background:rgba(31,41,55,.45)}.spinner-glow-success{animation:glow-success 1s ease infinite;background:rgba(16,185,129,.45)}.spinner-glow-info{animation:glow-info 1s ease infinite;background:rgba(59,130,246,.45)}.spinner-glow-warning{animation:glow-warning 1s ease infinite;background:rgba(245,158,11,.45)}.spinner-glow-danger{animation:glow-danger 1s ease infinite;background:rgba(239,68,68,.45)}.spinner-glow-light{animation:glow-light 1s ease infinite;background:hsla(220,9%,46%,.45)}.spinner-glow-dark{animation:glow-dark 1s ease infinite;background:rgba(17,24,39,.45)}.spinner-glow-gray-100{animation:glow-gray-100 1s ease infinite;background:rgba(243,244,246,.45)}.spinner-glow-gray-200{animation:glow-gray-200 1s ease infinite;background:rgba(229,231,235,.45)}.spinner-glow-gray-300{animation:glow-gray-300 1s ease infinite;background:rgba(209,213,219,.45)}.spinner-glow-gray-400{animation:glow-gray-400 1s ease infinite;background:rgba(156,163,175,.45)}.spinner-glow-gray-500{animation:glow-gray-500 1s ease infinite;background:hsla(220,9%,46%,.45)}.spinner-glow-gray-600{animation:glow-gray-600 1s ease infinite;background:rgba(75,85,99,.45)}.spinner-glow-gray-700{animation:glow-gray-700 1s ease infinite;background:rgba(55,65,81,.45)}.spinner-glow-gray-800{animation:glow-gray-800 1s ease infinite;background:rgba(31,41,55,.45)}.spinner-glow-gray-900{animation:glow-gray-900 1s ease infinite;background:rgba(17,24,39,.45)}@keyframes glow-primary{0%{box-shadow:0 0 0 .4em rgba(255,99,15,.45),0 0 0 .1em rgba(255,99,15,.45);transform:rotate(1turn)}50%{border-top-color:rgba(255,99,15,.9)}to{box-shadow:0 0 0 .4em rgba(255,99,15,.75),0 0 0 3.6em transparent}}@keyframes glow-secondary{0%{box-shadow:0 0 0 .4em rgba(31,41,55,.45),0 0 0 .1em rgba(31,41,55,.45);transform:rotate(1turn)}50%{border-top-color:rgba(31,41,55,.9)}to{box-shadow:0 0 0 .4em rgba(31,41,55,.75),0 0 0 3.6em transparent}}@keyframes glow-success{0%{box-shadow:0 0 0 .4em rgba(16,185,129,.45),0 0 0 .1em rgba(16,185,129,.45);transform:rotate(1turn)}50%{border-top-color:rgba(16,185,129,.9)}to{box-shadow:0 0 0 .4em rgba(16,185,129,.75),0 0 0 3.6em transparent}}@keyframes glow-info{0%{box-shadow:0 0 0 .4em rgba(59,130,246,.45),0 0 0 .1em rgba(59,130,246,.45);transform:rotate(1turn)}50%{border-top-color:rgba(59,130,246,.9)}to{box-shadow:0 0 0 .4em rgba(59,130,246,.75),0 0 0 3.6em transparent}}@keyframes glow-warning{0%{box-shadow:0 0 0 .4em rgba(245,158,11,.45),0 0 0 .1em rgba(245,158,11,.45);transform:rotate(1turn)}50%{border-top-color:rgba(245,158,11,.9)}to{box-shadow:0 0 0 .4em rgba(245,158,11,.75),0 0 0 3.6em transparent}}@keyframes glow-danger{0%{box-shadow:0 0 0 .4em rgba(239,68,68,.45),0 0 0 .1em rgba(239,68,68,.45);transform:rotate(1turn)}50%{border-top-color:rgba(239,68,68,.9)}to{box-shadow:0 0 0 .4em rgba(239,68,68,.75),0 0 0 3.6em transparent}}@keyframes glow-light{0%{box-shadow:0 0 0 .4em hsla(220,9%,46%,.45),0 0 0 .1em hsla(220,9%,46%,.45);transform:rotate(1turn)}50%{border-top-color:hsla(220,9%,46%,.9)}to{box-shadow:0 0 0 .4em hsla(220,9%,46%,.75),0 0 0 3.6em transparent}}@keyframes glow-dark{0%{box-shadow:0 0 0 .4em rgba(17,24,39,.45),0 0 0 .1em rgba(17,24,39,.45);transform:rotate(1turn)}50%{border-top-color:rgba(17,24,39,.9)}to{box-shadow:0 0 0 .4em rgba(17,24,39,.75),0 0 0 3.6em transparent}}@keyframes glow-gray-100{0%{box-shadow:0 0 0 .4em rgba(243,244,246,.45),0 0 0 .1em rgba(243,244,246,.45);transform:rotate(1turn)}50%{border-top-color:rgba(243,244,246,.9)}to{box-shadow:0 0 0 .4em rgba(243,244,246,.75),0 0 0 3.6em transparent}}@keyframes glow-gray-200{0%{box-shadow:0 0 0 .4em rgba(229,231,235,.45),0 0 0 .1em rgba(229,231,235,.45);transform:rotate(1turn)}50%{border-top-color:rgba(229,231,235,.9)}to{box-shadow:0 0 0 .4em rgba(229,231,235,.75),0 0 0 3.6em transparent}}@keyframes glow-gray-300{0%{box-shadow:0 0 0 .4em rgba(209,213,219,.45),0 0 0 .1em rgba(209,213,219,.45);transform:rotate(1turn)}50%{border-top-color:rgba(209,213,219,.9)}to{box-shadow:0 0 0 .4em rgba(209,213,219,.75),0 0 0 3.6em transparent}}@keyframes glow-gray-400{0%{box-shadow:0 0 0 .4em rgba(156,163,175,.45),0 0 0 .1em rgba(156,163,175,.45);transform:rotate(1turn)}50%{border-top-color:rgba(156,163,175,.9)}to{box-shadow:0 0 0 .4em rgba(156,163,175,.75),0 0 0 3.6em transparent}}@keyframes glow-gray-500{0%{box-shadow:0 0 0 .4em hsla(220,9%,46%,.45),0 0 0 .1em hsla(220,9%,46%,.45);transform:rotate(1turn)}50%{border-top-color:hsla(220,9%,46%,.9)}to{box-shadow:0 0 0 .4em hsla(220,9%,46%,.75),0 0 0 3.6em transparent}}@keyframes glow-gray-600{0%{box-shadow:0 0 0 .4em rgba(75,85,99,.45),0 0 0 .1em rgba(75,85,99,.45);transform:rotate(1turn)}50%{border-top-color:rgba(75,85,99,.9)}to{box-shadow:0 0 0 .4em rgba(75,85,99,.75),0 0 0 3.6em transparent}}@keyframes glow-gray-700{0%{box-shadow:0 0 0 .4em rgba(55,65,81,.45),0 0 0 .1em rgba(55,65,81,.45);transform:rotate(1turn)}50%{border-top-color:rgba(55,65,81,.9)}to{box-shadow:0 0 0 .4em rgba(55,65,81,.75),0 0 0 3.6em transparent}}@keyframes glow-gray-800{0%{box-shadow:0 0 0 .4em rgba(31,41,55,.45),0 0 0 .1em rgba(31,41,55,.45);transform:rotate(1turn)}50%{border-top-color:rgba(31,41,55,.9)}to{box-shadow:0 0 0 .4em rgba(31,41,55,.75),0 0 0 3.6em transparent}}@keyframes glow-gray-900{0%{box-shadow:0 0 0 .4em rgba(17,24,39,.45),0 0 0 .1em rgba(17,24,39,.45);transform:rotate(1turn)}50%{border-top-color:rgba(17,24,39,.9)}to{box-shadow:0 0 0 .4em rgba(17,24,39,.75),0 0 0 3.6em transparent}}.spinner{animation:spin 1.4s linear infinite;border-radius:50%;display:inline-block;font-size:10px;height:4em;margin:auto;position:relative;text-indent:-9999em;transform:translateZ(0);width:4em}.spinner:before{border-radius:100% 0 0 0;height:50%;width:50%}.spinner:after,.spinner:before{content:"";left:0;position:absolute;top:0}.spinner:after{background:#fff;border-radius:50%;bottom:0;height:75%;margin:auto;right:0;width:75%}.spinner-primary{background:#ff630f;background:linear-gradient(90deg,#ff630f 10%,rgba(67,236,76,0) 42%)}.spinner-primary:before{background:#ff630f}.spinner-secondary{background:#1f2937;background:linear-gradient(90deg,#1f2937 10%,rgba(67,236,76,0) 42%)}.spinner-secondary:before{background:#1f2937}.spinner-success{background:#10b981;background:linear-gradient(90deg,#10b981 10%,rgba(67,236,76,0) 42%)}.spinner-success:before{background:#10b981}.spinner-info{background:#3b82f6;background:linear-gradient(90deg,#3b82f6 10%,rgba(67,236,76,0) 42%)}.spinner-info:before{background:#3b82f6}.spinner-warning{background:#f59e0b;background:linear-gradient(90deg,#f59e0b 10%,rgba(67,236,76,0) 42%)}.spinner-warning:before{background:#f59e0b}.spinner-danger{background:#ef4444;background:linear-gradient(90deg,#ef4444 10%,rgba(67,236,76,0) 42%)}.spinner-danger:before{background:#ef4444}.spinner-light{background:#6b7280;background:linear-gradient(90deg,#6b7280 10%,rgba(67,236,76,0) 42%)}.spinner-light:before{background:#6b7280}.spinner-dark{background:#111827;background:linear-gradient(90deg,#111827 10%,rgba(67,236,76,0) 42%)}.spinner-dark:before{background:#111827}.spinner-gray-100{background:#f3f4f6;background:linear-gradient(90deg,#f3f4f6 10%,rgba(67,236,76,0) 42%)}.spinner-gray-100:before{background:#f3f4f6}.spinner-gray-200{background:#e5e7eb;background:linear-gradient(90deg,#e5e7eb 10%,rgba(67,236,76,0) 42%)}.spinner-gray-200:before{background:#e5e7eb}.spinner-gray-300{background:#d1d5db;background:linear-gradient(90deg,#d1d5db 10%,rgba(67,236,76,0) 42%)}.spinner-gray-300:before{background:#d1d5db}.spinner-gray-400{background:#9ca3af;background:linear-gradient(90deg,#9ca3af 10%,rgba(67,236,76,0) 42%)}.spinner-gray-400:before{background:#9ca3af}.spinner-gray-500{background:#6b7280;background:linear-gradient(90deg,#6b7280 10%,rgba(67,236,76,0) 42%)}.spinner-gray-500:before{background:#6b7280}.spinner-gray-600{background:#4b5563;background:linear-gradient(90deg,#4b5563 10%,rgba(67,236,76,0) 42%)}.spinner-gray-600:before{background:#4b5563}.spinner-gray-700{background:#374151;background:linear-gradient(90deg,#374151 10%,rgba(67,236,76,0) 42%)}.spinner-gray-700:before{background:#374151}.spinner-gray-800{background:#1f2937;background:linear-gradient(90deg,#1f2937 10%,rgba(67,236,76,0) 42%)}.spinner-gray-800:before{background:#1f2937}.spinner-gray-900{background:#111827;background:linear-gradient(90deg,#111827 10%,rgba(67,236,76,0) 42%)}.spinner-gray-900:before{background:#111827}@keyframes spin{0%{transform:rotate(0deg)}to{transform:rotate(1turn)}}.spinner-bubble{animation:bubble-circle 1.3s linear infinite;border-radius:50%;display:inline-block;font-size:8px;height:1em;margin:30px auto;position:relative;text-indent:-9999em;transform:translateZ(0);width:1em}.spinner-bubble-primary{color:#ff630f}.spinner-bubble-secondary{color:#1f2937}.spinner-bubble-success{color:#10b981}.spinner-bubble-info{color:#3b82f6}.spinner-bubble-warning{color:#f59e0b}.spinner-bubble-danger{color:#ef4444}.spinner-bubble-light{color:#6b7280}.spinner-bubble-dark{color:#111827}.spinner-bubble-gray-100{color:#f3f4f6}.spinner-bubble-gray-200{color:#e5e7eb}.spinner-bubble-gray-300{color:#d1d5db}.spinner-bubble-gray-400{color:#9ca3af}.spinner-bubble-gray-500{color:#6b7280}.spinner-bubble-gray-600{color:#4b5563}.spinner-bubble-gray-700{color:#374151}.spinner-bubble-gray-800{color:#1f2937}.spinner-bubble-gray-900{color:#111827}@keyframes bubble-circle{0%,to{box-shadow:0 -3em 0 .2em,2em -2em 0 0,3em 0 0 -1em,2em 2em 0 -1em,0 3em 0 -1em,-2em 2em 0 -1em,-3em 0 0 -1em,-2em -2em 0 0}12.5%{box-shadow:0 -3em 0 0,2em -2em 0 .2em,3em 0 0 0,2em 2em 0 -1em,0 3em 0 -1em,-2em 2em 0 -1em,-3em 0 0 -1em,-2em -2em 0 -1em}25%{box-shadow:0 -3em 0 -.5em,2em -2em 0 0,3em 0 0 .2em,2em 2em 0 0,0 3em 0 -1em,-2em 2em 0 -1em,-3em 0 0 -1em,-2em -2em 0 -1em}37.5%{box-shadow:0 -3em 0 -1em,2em -2em 0 -1em,3em 0 0 0,2em 2em 0 .2em,0 3em 0 0,-2em 2em 0 -1em,-3em 0 0 -1em,-2em -2em 0 -1em}50%{box-shadow:0 -3em 0 -1em,2em -2em 0 -1em,3em 0 0 -1em,2em 2em 0 0,0 3em 0 .2em,-2em 2em 0 0,-3em 0 0 -1em,-2em -2em 0 -1em}62.5%{box-shadow:0 -3em 0 -1em,2em -2em 0 -1em,3em 0 0 -1em,2em 2em 0 -1em,0 3em 0 0,-2em 2em 0 .2em,-3em 0 0 0,-2em -2em 0 -1em}75%{box-shadow:0 -3em 0 -1em,2em -2em 0 -1em,3em 0 0 -1em,2em 2em 0 -1em,0 3em 0 -1em,-2em 2em 0 0,-3em 0 0 .2em,-2em -2em 0 0}87.5%{box-shadow:0 -3em 0 0,2em -2em 0 -1em,3em 0 0 -1em,2em 2em 0 -1em,0 3em 0 -1em,-2em 2em 0 0,-3em 0 0 0,-2em -2em 0 .2em}}.loader-bubble,.loader-bubble:after,.loader-bubble:before{animation-fill-mode:both;animation:bubble-horz 1.8s ease-in-out infinite;border-radius:50%;height:2em;width:2em}.loader-bubble{animation-delay:-.16s;display:inline-block;font-size:6px;margin:auto;position:relative;text-indent:-9999em;transform:translateZ(0)}.loader-bubble-primary{color:#ff630f}.loader-bubble-secondary{color:#1f2937}.loader-bubble-success{color:#10b981}.loader-bubble-info{color:#3b82f6}.loader-bubble-warning{color:#f59e0b}.loader-bubble-danger{color:#ef4444}.loader-bubble-light{color:#6b7280}.loader-bubble-dark{color:#111827}.loader-bubble-gray-100{color:#f3f4f6}.loader-bubble-gray-200{color:#e5e7eb}.loader-bubble-gray-300{color:#d1d5db}.loader-bubble-gray-400{color:#9ca3af}.loader-bubble-gray-500{color:#6b7280}.loader-bubble-gray-600{color:#4b5563}.loader-bubble-gray-700{color:#374151}.loader-bubble-gray-800{color:#1f2937}.loader-bubble-gray-900{color:#111827}.loader-bubble:after,.loader-bubble:before{content:"";position:absolute;top:0}.loader-bubble:before{animation-delay:-.32s;left:-3.5em}.loader-bubble:after{left:3.5em}@keyframes bubble-horz{0%,80%,to{box-shadow:0 2.5em 0 -1.3em}40%{box-shadow:0 2.5em 0 0}}.alert{border-radius:10px}.alert .close:focus{outline:0}.alert-card{border:none;box-shadow:0 4px 15px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.1),inset 0 2px 0 0 #9ca3af}.alert-card.alert-success{box-shadow:0 4px 15px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.1),inset 0 2px 0 0 #10b981}.alert-card.alert-warning{box-shadow:0 4px 15px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.1),inset 0 2px 0 0 #f59e0b}.alert-card.alert-info{box-shadow:0 4px 15px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.1),inset 0 2px 0 0 #3b82f6}.alert-card.alert-danger{box-shadow:0 4px 15px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.1),inset 0 2px 0 0 #ef4444}.alert-card.alert-dark{box-shadow:0 4px 15px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.1),inset 0 2px 0 0 #4b5563}.swal2-container .swal2-modal{font-family:Nunito,sans-serif}.swal2-container .swal2-spacer{margin:1.5rem 0}.swal2-container .swal2-styled:not(.swal2-cancel){background:#ff630f!important;outline:none}.swal2-container .swal2-styled:not(.swal2-cancel):focus{box-shadow:0 0 0 .2rem rgba(255,99,15,.5)}.sidebar-container{min-height:400px;overflow:hidden;position:relative}.sidebar-container .sidebar-content{height:100%;position:relative;transition:all .3s ease-in}.sidebar-container .sidebar-content:after{content:"";height:100%;left:0;position:absolute;right:0;width:100%}.sidebar-container .sidebar{position:absolute;top:0;transition:all .3s ease-in;z-index:60}.sidebar-container .sidebar .sidebar-close{cursor:pointer;display:none;position:absolute;right:4px;top:4px;z-index:999}@media (max-width:767px){.sidebar-container .sidebar{background:#fff}.sidebar-container .sidebar .sidebar-close{display:block}}.badge{font-weight:600}.badge-outline-primary{background:unset;border:1px solid #ff630f;color:#ff630f}.badge-outline-secondary{background:unset;border:1px solid #1f2937;color:#1f2937}.badge-outline-success{background:unset;border:1px solid #10b981;color:#10b981}.badge-outline-info{background:unset;border:1px solid #3b82f6;color:#3b82f6}.badge-outline-warning{background:unset;border:1px solid #f59e0b;color:#f59e0b}.badge-outline-danger{background:unset;border:1px solid #ef4444;color:#ef4444}.badge-outline-light{background:unset;border:1px solid #6b7280;color:#6b7280}.badge-outline-dark{background:unset;border:1px solid #111827;color:#111827}.badge-outline-gray-100{background:unset;border:1px solid #f3f4f6;color:#f3f4f6}.badge-outline-gray-200{background:unset;border:1px solid #e5e7eb;color:#e5e7eb}.badge-outline-gray-300{background:unset;border:1px solid #d1d5db;color:#d1d5db}.badge-outline-gray-400{background:unset;border:1px solid #9ca3af;color:#9ca3af}.badge-outline-gray-500{background:unset;border:1px solid #6b7280;color:#6b7280}.badge-outline-gray-600{background:unset;border:1px solid #4b5563;color:#4b5563}.badge-outline-gray-700{background:unset;border:1px solid #374151;color:#374151}.badge-outline-gray-800{background:unset;border:1px solid #1f2937;color:#1f2937}.badge-outline-gray-900{background:unset;border:1px solid #111827;color:#111827}.badge-top-container{position:relative}.badge-top-container .badge{border-radius:10px;position:absolute;right:4px;top:2px}.ul-badge-pill-primary{background:#ff630f}.ul-badge-pill-primary,.ul-badge-pill-secondary{border-radius:50%;color:#fff;font-size:.8rem;height:18px;line-height:20px;width:25px}.ul-badge-pill-secondary{background:#1f2937}.ul-badge-pill-success{background:#10b981}.ul-badge-pill-info,.ul-badge-pill-success{border-radius:50%;color:#fff;font-size:.8rem;height:18px;line-height:20px;width:25px}.ul-badge-pill-info{background:#3b82f6}.ul-badge-pill-warning{background:#f59e0b}.ul-badge-pill-danger,.ul-badge-pill-warning{border-radius:50%;color:#fff;font-size:.8rem;height:18px;line-height:20px;width:25px}.ul-badge-pill-danger{background:#ef4444}.ul-badge-pill-light{background:#6b7280}.ul-badge-pill-dark,.ul-badge-pill-light{border-radius:50%;color:#fff;font-size:.8rem;height:18px;line-height:20px;width:25px}.ul-badge-pill-dark{background:#111827}.ul-badge-pill-gray-100{background:#f3f4f6}.ul-badge-pill-gray-100,.ul-badge-pill-gray-200{border-radius:50%;color:#fff;font-size:.8rem;height:18px;line-height:20px;width:25px}.ul-badge-pill-gray-200{background:#e5e7eb}.ul-badge-pill-gray-300{background:#d1d5db}.ul-badge-pill-gray-300,.ul-badge-pill-gray-400{border-radius:50%;color:#fff;font-size:.8rem;height:18px;line-height:20px;width:25px}.ul-badge-pill-gray-400{background:#9ca3af}.ul-badge-pill-gray-500{background:#6b7280}.ul-badge-pill-gray-500,.ul-badge-pill-gray-600{border-radius:50%;color:#fff;font-size:.8rem;height:18px;line-height:20px;width:25px}.ul-badge-pill-gray-600{background:#4b5563}.ul-badge-pill-gray-700{background:#374151}.ul-badge-pill-gray-700,.ul-badge-pill-gray-800{border-radius:50%;color:#fff;font-size:.8rem;height:18px;line-height:20px;width:25px}.ul-badge-pill-gray-800{background:#1f2937}.ul-badge-pill-gray-900{background:#111827;font-size:.8rem;height:18px}.badge-round-primary,.ul-badge-pill-gray-900{border-radius:50%;color:#fff;line-height:20px;width:25px}.badge-round-primary{background:#ff630f;height:25px;justify-content:center}.badge-round-primary.lg{font-size:1.2rem;height:40px;line-height:30px;width:40px}.badge-round-primary.xl{font-size:1.3rem;font-weight:700;height:50px;line-height:40px;width:50px}.badge-round-primary.sm{height:18px;justify-content:center;line-height:13px;width:18px}.badge-round-primary.pill{border-radius:10px;height:18px;line-height:13px;width:45px}.badge-round-secondary{background:#1f2937;border-radius:50%;color:#fff;height:25px;justify-content:center;line-height:20px;width:25px}.badge-round-secondary.lg{font-size:1.2rem;height:40px;line-height:30px;width:40px}.badge-round-secondary.xl{font-size:1.3rem;font-weight:700;height:50px;line-height:40px;width:50px}.badge-round-secondary.sm{height:18px;justify-content:center;line-height:13px;width:18px}.badge-round-secondary.pill{border-radius:10px;height:18px;line-height:13px;width:45px}.badge-round-success{background:#10b981;border-radius:50%;color:#fff;height:25px;justify-content:center;line-height:20px;width:25px}.badge-round-success.lg{font-size:1.2rem;height:40px;line-height:30px;width:40px}.badge-round-success.xl{font-size:1.3rem;font-weight:700;height:50px;line-height:40px;width:50px}.badge-round-success.sm{height:18px;justify-content:center;line-height:13px;width:18px}.badge-round-success.pill{border-radius:10px;height:18px;line-height:13px;width:45px}.badge-round-info{background:#3b82f6;border-radius:50%;color:#fff;height:25px;justify-content:center;line-height:20px;width:25px}.badge-round-info.lg{font-size:1.2rem;height:40px;line-height:30px;width:40px}.badge-round-info.xl{font-size:1.3rem;font-weight:700;height:50px;line-height:40px;width:50px}.badge-round-info.sm{height:18px;justify-content:center;line-height:13px;width:18px}.badge-round-info.pill{border-radius:10px;height:18px;line-height:13px;width:45px}.badge-round-warning{background:#f59e0b;border-radius:50%;color:#fff;height:25px;justify-content:center;line-height:20px;width:25px}.badge-round-warning.lg{font-size:1.2rem;height:40px;line-height:30px;width:40px}.badge-round-warning.xl{font-size:1.3rem;font-weight:700;height:50px;line-height:40px;width:50px}.badge-round-warning.sm{height:18px;justify-content:center;line-height:13px;width:18px}.badge-round-warning.pill{border-radius:10px;height:18px;line-height:13px;width:45px}.badge-round-danger{background:#ef4444;border-radius:50%;color:#fff;height:25px;justify-content:center;line-height:20px;width:25px}.badge-round-danger.lg{font-size:1.2rem;height:40px;line-height:30px;width:40px}.badge-round-danger.xl{font-size:1.3rem;font-weight:700;height:50px;line-height:40px;width:50px}.badge-round-danger.sm{height:18px;justify-content:center;line-height:13px;width:18px}.badge-round-danger.pill{border-radius:10px;height:18px;line-height:13px;width:45px}.badge-round-light{background:#6b7280;border-radius:50%;color:#fff;height:25px;justify-content:center;line-height:20px;width:25px}.badge-round-light.lg{font-size:1.2rem;height:40px;line-height:30px;width:40px}.badge-round-light.xl{font-size:1.3rem;font-weight:700;height:50px;line-height:40px;width:50px}.badge-round-light.sm{height:18px;justify-content:center;line-height:13px;width:18px}.badge-round-light.pill{border-radius:10px;height:18px;line-height:13px;width:45px}.badge-round-dark{background:#111827;border-radius:50%;color:#fff;height:25px;justify-content:center;line-height:20px;width:25px}.badge-round-dark.lg{font-size:1.2rem;height:40px;line-height:30px;width:40px}.badge-round-dark.xl{font-size:1.3rem;font-weight:700;height:50px;line-height:40px;width:50px}.badge-round-dark.sm{height:18px;justify-content:center;line-height:13px;width:18px}.badge-round-dark.pill{border-radius:10px;height:18px;line-height:13px;width:45px}.badge-round-gray-100{background:#f3f4f6;border-radius:50%;color:#fff;height:25px;justify-content:center;line-height:20px;width:25px}.badge-round-gray-100.lg{font-size:1.2rem;height:40px;line-height:30px;width:40px}.badge-round-gray-100.xl{font-size:1.3rem;font-weight:700;height:50px;line-height:40px;width:50px}.badge-round-gray-100.sm{height:18px;justify-content:center;line-height:13px;width:18px}.badge-round-gray-100.pill{border-radius:10px;height:18px;line-height:13px;width:45px}.badge-round-gray-200{background:#e5e7eb;border-radius:50%;color:#fff;height:25px;justify-content:center;line-height:20px;width:25px}.badge-round-gray-200.lg{font-size:1.2rem;height:40px;line-height:30px;width:40px}.badge-round-gray-200.xl{font-size:1.3rem;font-weight:700;height:50px;line-height:40px;width:50px}.badge-round-gray-200.sm{height:18px;justify-content:center;line-height:13px;width:18px}.badge-round-gray-200.pill{border-radius:10px;height:18px;line-height:13px;width:45px}.badge-round-gray-300{background:#d1d5db;border-radius:50%;color:#fff;height:25px;justify-content:center;line-height:20px;width:25px}.badge-round-gray-300.lg{font-size:1.2rem;height:40px;line-height:30px;width:40px}.badge-round-gray-300.xl{font-size:1.3rem;font-weight:700;height:50px;line-height:40px;width:50px}.badge-round-gray-300.sm{height:18px;justify-content:center;line-height:13px;width:18px}.badge-round-gray-300.pill{border-radius:10px;height:18px;line-height:13px;width:45px}.badge-round-gray-400{background:#9ca3af;border-radius:50%;color:#fff;height:25px;justify-content:center;line-height:20px;width:25px}.badge-round-gray-400.lg{font-size:1.2rem;height:40px;line-height:30px;width:40px}.badge-round-gray-400.xl{font-size:1.3rem;font-weight:700;height:50px;line-height:40px;width:50px}.badge-round-gray-400.sm{height:18px;justify-content:center;line-height:13px;width:18px}.badge-round-gray-400.pill{border-radius:10px;height:18px;line-height:13px;width:45px}.badge-round-gray-500{background:#6b7280;border-radius:50%;color:#fff;height:25px;justify-content:center;line-height:20px;width:25px}.badge-round-gray-500.lg{font-size:1.2rem;height:40px;line-height:30px;width:40px}.badge-round-gray-500.xl{font-size:1.3rem;font-weight:700;height:50px;line-height:40px;width:50px}.badge-round-gray-500.sm{height:18px;justify-content:center;line-height:13px;width:18px}.badge-round-gray-500.pill{border-radius:10px;height:18px;line-height:13px;width:45px}.badge-round-gray-600{background:#4b5563;border-radius:50%;color:#fff;height:25px;justify-content:center;line-height:20px;width:25px}.badge-round-gray-600.lg{font-size:1.2rem;height:40px;line-height:30px;width:40px}.badge-round-gray-600.xl{font-size:1.3rem;font-weight:700;height:50px;line-height:40px;width:50px}.badge-round-gray-600.sm{height:18px;justify-content:center;line-height:13px;width:18px}.badge-round-gray-600.pill{border-radius:10px;height:18px;line-height:13px;width:45px}.badge-round-gray-700{background:#374151;border-radius:50%;color:#fff;height:25px;justify-content:center;line-height:20px;width:25px}.badge-round-gray-700.lg{font-size:1.2rem;height:40px;line-height:30px;width:40px}.badge-round-gray-700.xl{font-size:1.3rem;font-weight:700;height:50px;line-height:40px;width:50px}.badge-round-gray-700.sm{height:18px;justify-content:center;line-height:13px;width:18px}.badge-round-gray-700.pill{border-radius:10px;height:18px;line-height:13px;width:45px}.badge-round-gray-800{background:#1f2937;border-radius:50%;color:#fff;height:25px;justify-content:center;line-height:20px;width:25px}.badge-round-gray-800.lg{font-size:1.2rem;height:40px;line-height:30px;width:40px}.badge-round-gray-800.xl{font-size:1.3rem;font-weight:700;height:50px;line-height:40px;width:50px}.badge-round-gray-800.sm{height:18px;justify-content:center;line-height:13px;width:18px}.badge-round-gray-800.pill{border-radius:10px;height:18px;line-height:13px;width:45px}.badge-round-gray-900{background:#111827;border-radius:50%;color:#fff;height:25px;justify-content:center;line-height:20px;width:25px}.badge-round-gray-900.lg{font-size:1.2rem;height:40px;line-height:30px;width:40px}.badge-round-gray-900.xl{font-size:1.3rem;font-weight:700;height:50px;line-height:40px;width:50px}.badge-round-gray-900.sm{height:18px;justify-content:center;line-height:13px;width:18px}.badge-round-gray-900.pill{border-radius:10px;height:18px;line-height:13px;width:45px}.badge-dot-primary{background-color:#ff630f}.badge-dot-primary,.badge-dot-secondary{border-radius:50%;display:inline-block;height:4px;vertical-align:middle;width:4px}.badge-dot-secondary{background-color:#1f2937}.badge-dot-success{background-color:#10b981}.badge-dot-info,.badge-dot-success{border-radius:50%;display:inline-block;height:4px;vertical-align:middle;width:4px}.badge-dot-info{background-color:#3b82f6}.badge-dot-warning{background-color:#f59e0b}.badge-dot-danger,.badge-dot-warning{border-radius:50%;display:inline-block;height:4px;vertical-align:middle;width:4px}.badge-dot-danger{background-color:#ef4444}.badge-dot-light{background-color:#6b7280}.badge-dot-dark,.badge-dot-light{border-radius:50%;display:inline-block;height:4px;vertical-align:middle;width:4px}.badge-dot-dark{background-color:#111827}.badge-dot-gray-100{background-color:#f3f4f6}.badge-dot-gray-100,.badge-dot-gray-200{border-radius:50%;display:inline-block;height:4px;vertical-align:middle;width:4px}.badge-dot-gray-200{background-color:#e5e7eb}.badge-dot-gray-300{background-color:#d1d5db}.badge-dot-gray-300,.badge-dot-gray-400{border-radius:50%;display:inline-block;height:4px;vertical-align:middle;width:4px}.badge-dot-gray-400{background-color:#9ca3af}.badge-dot-gray-500{background-color:#6b7280}.badge-dot-gray-500,.badge-dot-gray-600{border-radius:50%;display:inline-block;height:4px;vertical-align:middle;width:4px}.badge-dot-gray-600{background-color:#4b5563}.badge-dot-gray-700{background-color:#374151}.badge-dot-gray-700,.badge-dot-gray-800{border-radius:50%;display:inline-block;height:4px;vertical-align:middle;width:4px}.badge-dot-gray-800{background-color:#1f2937}.badge-dot-gray-900{background-color:#111827;border-radius:50%;display:inline-block;height:4px;vertical-align:middle;width:4px}.outline-round-primary{border:1px solid #ff630f;border-radius:50%;color:#ff630f}.outline-round-primary,.outline-round-secondary{background:#fff;height:18px;justify-content:center;line-height:13px;width:18px}.outline-round-secondary{border:1px solid #1f2937;border-radius:50%;color:#1f2937}.outline-round-success{border:1px solid #10b981;border-radius:50%;color:#10b981}.outline-round-info,.outline-round-success{background:#fff;height:18px;justify-content:center;line-height:13px;width:18px}.outline-round-info{border:1px solid #3b82f6;border-radius:50%;color:#3b82f6}.outline-round-warning{border:1px solid #f59e0b;border-radius:50%;color:#f59e0b}.outline-round-danger,.outline-round-warning{background:#fff;height:18px;justify-content:center;line-height:13px;width:18px}.outline-round-danger{border:1px solid #ef4444;border-radius:50%;color:#ef4444}.outline-round-light{border:1px solid #6b7280;border-radius:50%;color:#6b7280}.outline-round-dark,.outline-round-light{background:#fff;height:18px;justify-content:center;line-height:13px;width:18px}.outline-round-dark{border:1px solid #111827;border-radius:50%;color:#111827}.outline-round-gray-100{border:1px solid #f3f4f6;border-radius:50%;color:#f3f4f6}.outline-round-gray-100,.outline-round-gray-200{background:#fff;height:18px;justify-content:center;line-height:13px;width:18px}.outline-round-gray-200{border:1px solid #e5e7eb;border-radius:50%;color:#e5e7eb}.outline-round-gray-300{border:1px solid #d1d5db;border-radius:50%;color:#d1d5db}.outline-round-gray-300,.outline-round-gray-400{background:#fff;height:18px;justify-content:center;line-height:13px;width:18px}.outline-round-gray-400{border:1px solid #9ca3af;border-radius:50%;color:#9ca3af}.outline-round-gray-500{border:1px solid #6b7280;border-radius:50%;color:#6b7280}.outline-round-gray-500,.outline-round-gray-600{background:#fff;height:18px;justify-content:center;line-height:13px;width:18px}.outline-round-gray-600{border:1px solid #4b5563;border-radius:50%;color:#4b5563}.outline-round-gray-700{border:1px solid #374151;border-radius:50%;color:#374151}.outline-round-gray-700,.outline-round-gray-800{background:#fff;height:18px;justify-content:center;line-height:13px;width:18px}.outline-round-gray-800{border:1px solid #1f2937;border-radius:50%;color:#1f2937}.outline-round-gray-900{background:#fff;border:1px solid #111827;border-radius:50%;color:#111827;height:18px;justify-content:center;line-height:13px;width:18px}.badge-square-primary{background:#ff630f;border-radius:20%;color:#fff;height:25px;line-height:20px;text-align:center;width:25px}.badge-square-primary.lg{font-size:1.2rem;height:40px;line-height:30px;width:40px}.badge-square-primary.xl{font-size:1.3rem;font-weight:700;height:50px;line-height:40px;width:50px}.badge-square-secondary{background:#1f2937;border-radius:20%;color:#fff;height:25px;line-height:20px;text-align:center;width:25px}.badge-square-secondary.lg{font-size:1.2rem;height:40px;line-height:30px;width:40px}.badge-square-secondary.xl{font-size:1.3rem;font-weight:700;height:50px;line-height:40px;width:50px}.badge-square-success{background:#10b981;border-radius:20%;color:#fff;height:25px;line-height:20px;text-align:center;width:25px}.badge-square-success.lg{font-size:1.2rem;height:40px;line-height:30px;width:40px}.badge-square-success.xl{font-size:1.3rem;font-weight:700;height:50px;line-height:40px;width:50px}.badge-square-info{background:#3b82f6;border-radius:20%;color:#fff;height:25px;line-height:20px;text-align:center;width:25px}.badge-square-info.lg{font-size:1.2rem;height:40px;line-height:30px;width:40px}.badge-square-info.xl{font-size:1.3rem;font-weight:700;height:50px;line-height:40px;width:50px}.badge-square-warning{background:#f59e0b;border-radius:20%;color:#fff;height:25px;line-height:20px;text-align:center;width:25px}.badge-square-warning.lg{font-size:1.2rem;height:40px;line-height:30px;width:40px}.badge-square-warning.xl{font-size:1.3rem;font-weight:700;height:50px;line-height:40px;width:50px}.badge-square-danger{background:#ef4444;border-radius:20%;color:#fff;height:25px;line-height:20px;text-align:center;width:25px}.badge-square-danger.lg{font-size:1.2rem;height:40px;line-height:30px;width:40px}.badge-square-danger.xl{font-size:1.3rem;font-weight:700;height:50px;line-height:40px;width:50px}.badge-square-light{background:#6b7280;border-radius:20%;color:#fff;height:25px;line-height:20px;text-align:center;width:25px}.badge-square-light.lg{font-size:1.2rem;height:40px;line-height:30px;width:40px}.badge-square-light.xl{font-size:1.3rem;font-weight:700;height:50px;line-height:40px;width:50px}.badge-square-dark{background:#111827;border-radius:20%;color:#fff;height:25px;line-height:20px;text-align:center;width:25px}.badge-square-dark.lg{font-size:1.2rem;height:40px;line-height:30px;width:40px}.badge-square-dark.xl{font-size:1.3rem;font-weight:700;height:50px;line-height:40px;width:50px}.badge-square-gray-100{background:#f3f4f6;border-radius:20%;color:#fff;height:25px;line-height:20px;text-align:center;width:25px}.badge-square-gray-100.lg{font-size:1.2rem;height:40px;line-height:30px;width:40px}.badge-square-gray-100.xl{font-size:1.3rem;font-weight:700;height:50px;line-height:40px;width:50px}.badge-square-gray-200{background:#e5e7eb;border-radius:20%;color:#fff;height:25px;line-height:20px;text-align:center;width:25px}.badge-square-gray-200.lg{font-size:1.2rem;height:40px;line-height:30px;width:40px}.badge-square-gray-200.xl{font-size:1.3rem;font-weight:700;height:50px;line-height:40px;width:50px}.badge-square-gray-300{background:#d1d5db;border-radius:20%;color:#fff;height:25px;line-height:20px;text-align:center;width:25px}.badge-square-gray-300.lg{font-size:1.2rem;height:40px;line-height:30px;width:40px}.badge-square-gray-300.xl{font-size:1.3rem;font-weight:700;height:50px;line-height:40px;width:50px}.badge-square-gray-400{background:#9ca3af;border-radius:20%;color:#fff;height:25px;line-height:20px;text-align:center;width:25px}.badge-square-gray-400.lg{font-size:1.2rem;height:40px;line-height:30px;width:40px}.badge-square-gray-400.xl{font-size:1.3rem;font-weight:700;height:50px;line-height:40px;width:50px}.badge-square-gray-500{background:#6b7280;border-radius:20%;color:#fff;height:25px;line-height:20px;text-align:center;width:25px}.badge-square-gray-500.lg{font-size:1.2rem;height:40px;line-height:30px;width:40px}.badge-square-gray-500.xl{font-size:1.3rem;font-weight:700;height:50px;line-height:40px;width:50px}.badge-square-gray-600{background:#4b5563;border-radius:20%;color:#fff;height:25px;line-height:20px;text-align:center;width:25px}.badge-square-gray-600.lg{font-size:1.2rem;height:40px;line-height:30px;width:40px}.badge-square-gray-600.xl{font-size:1.3rem;font-weight:700;height:50px;line-height:40px;width:50px}.badge-square-gray-700{background:#374151;border-radius:20%;color:#fff;height:25px;line-height:20px;text-align:center;width:25px}.badge-square-gray-700.lg{font-size:1.2rem;height:40px;line-height:30px;width:40px}.badge-square-gray-700.xl{font-size:1.3rem;font-weight:700;height:50px;line-height:40px;width:50px}.badge-square-gray-800{background:#1f2937;border-radius:20%;color:#fff;height:25px;line-height:20px;text-align:center;width:25px}.badge-square-gray-800.lg{font-size:1.2rem;height:40px;line-height:30px;width:40px}.badge-square-gray-800.xl{font-size:1.3rem;font-weight:700;height:50px;line-height:40px;width:50px}.badge-square-gray-900{background:#111827;border-radius:20%;color:#fff;height:25px;line-height:20px;text-align:center;width:25px}.badge-square-gray-900.lg{font-size:1.2rem;height:40px;line-height:30px;width:40px}.badge-square-gray-900.xl{font-size:1.3rem;font-weight:700;height:50px;line-height:40px;width:50px}.badge-round{border-radius:50%;font-size:1.2rem;height:40px;line-height:30px;width:40px}.badge-round.badge-round-opacity-primary{background:#ffe8db;color:#ff630f}.badge-round.badge-round-opacity-secondary{background:#728cb0;color:#1f2937}.badge-round.badge-round-opacity-success{background:#9ef7d9;color:#10b981}.badge-round.badge-round-opacity-info{background:#fefeff;color:#3b82f6}.badge-round.badge-round-opacity-warning{background:#fdeccf;color:#f59e0b}.badge-round.badge-round-opacity-danger{background:#fff;color:#ef4444}.badge-round.badge-round-opacity-light{background:#d8dadf;color:#6b7280}.badge-round.badge-round-opacity-dark{background:#5170b3;color:#111827}.badge-round.badge-round-opacity-gray-100{background:#fff;color:#f3f4f6}.badge-round.badge-round-opacity-gray-200{background:#fff;color:#e5e7eb}.badge-round.badge-round-opacity-gray-300{background:#fff;color:#d1d5db}.badge-round.badge-round-opacity-gray-400{background:#fff;color:#9ca3af}.badge-round.badge-round-opacity-gray-500{background:#d8dadf;color:#6b7280}.badge-round.badge-round-opacity-gray-600{background:#b4bbc6;color:#4b5563}.badge-round.badge-round-opacity-gray-700{background:#9aa6ba;color:#374151}.badge-round.badge-round-opacity-gray-800{background:#728cb0;color:#1f2937}.badge-round.badge-round-opacity-gray-900{background:#5170b3;color:#111827}.badge-square{border-radius:20%;font-size:1.2rem;height:40px;line-height:30px;width:40px}.badge-square.badge-square-opacity-primary{background:#ffe8db;color:#ff630f}.badge-square.badge-square-opacity-secondary{background:#728cb0;color:#1f2937}.badge-square.badge-square-opacity-success{background:#9ef7d9;color:#10b981}.badge-square.badge-square-opacity-info{background:#fefeff;color:#3b82f6}.badge-square.badge-square-opacity-warning{background:#fdeccf;color:#f59e0b}.badge-square.badge-square-opacity-danger{background:#fff;color:#ef4444}.badge-square.badge-square-opacity-light{background:#d8dadf;color:#6b7280}.badge-square.badge-square-opacity-dark{background:#5170b3;color:#111827}.badge-square.badge-square-opacity-gray-100{background:#fff;color:#f3f4f6}.badge-square.badge-square-opacity-gray-200{background:#fff;color:#e5e7eb}.badge-square.badge-square-opacity-gray-300{background:#fff;color:#d1d5db}.badge-square.badge-square-opacity-gray-400{background:#fff;color:#9ca3af}.badge-square.badge-square-opacity-gray-500{background:#d8dadf;color:#6b7280}.badge-square.badge-square-opacity-gray-600{background:#b4bbc6;color:#4b5563}.badge-square.badge-square-opacity-gray-700{background:#9aa6ba;color:#374151}.badge-square.badge-square-opacity-gray-800{background:#728cb0;color:#1f2937}.badge-square.badge-square-opacity-gray-900{background:#5170b3;color:#111827}.w-badge{border-radius:0;color:#fff}.r-badge,.w-badge{padding:4px}.popover{border:none;box-shadow:0 4px 20px 1px rgba(0,0,0,.06),0 1px 4px rgba(0,0,0,.08)}.popover .arrow:before{border-color:transparent}.search-ui{background:#fff;bottom:0;display:none;left:0;margin:auto;padding:.75rem 1.5rem 1.5rem 4.5rem;position:fixed;right:0;top:0;z-index:999}.search-ui.open{animation-delay:0;animation-duration:.3s;animation-fill-mode:both;animation-iteration-count:1;animation-name:slideInDown;animation-timing-function:ease;backface-visibility:hidden;display:block;z-index:999}.search-ui .search-header .logo{height:64px;width:auto}.search-ui .search-height{height:55vh}.search-ui input.search-input{border:0;font-size:4rem;font-weight:600;margin-bottom:1.5rem}.search-ui input.search-input:focus{outline:0}.search-ui input.search-input::-moz-placeholder{color:#9ca3af}.search-ui input.search-input::placeholder{color:#9ca3af}.search-ui .search-title{margin-bottom:1.25rem}.search-ui .search-title span{font-weight:600}@media (max-width:767px){.search-ui{padding:1rem}}.tagging{border:1px solid #d1d5db;border-radius:4px;font-size:1em;height:auto;padding:10px 10px 15px}.tagging.editable{cursor:text}.tag{background:none repeat scroll 0 0 #ff630f;border-radius:2px;color:#fff;cursor:default;display:inline-block;margin:5px 10px 0 0;padding:4px 20px 4px 0;position:relative;white-space:nowrap}.tag span{background:none repeat scroll 0 0 #f55600;border-radius:2px 0 0 2px;margin-right:5px;padding:5px 10px}.tag .tag-i{color:#fff;cursor:pointer;font-size:1.3em;height:0;line-height:.1em;position:absolute;right:5px;text-align:center;top:.7em;width:10px}.tag .tag-i:hover{color:#000;text-decoration:underline}.type-zone{border:0;display:inline-block;height:auto;min-width:20px;width:auto}.type-zone:focus{outline:none}.customizer{position:fixed;right:-380px;top:100px;transition:all .3s ease-in-out;width:380px;z-index:9999}.customizer.open{right:0}.customizer .handle{border-bottom-left-radius:4px;border-top-left-radius:4px;box-shadow:-3px 0 4px rgba(0,0,0,.06);cursor:pointer;display:flex;font-size:20px;left:-36px;padding:10px 8px;position:absolute;top:8px;transition:all .3s ease-in-out}.customizer .handle,.customizer .handle:hover{background:#ff630f;color:#fff}.customizer .customizer-body{background:#fff;border-bottom-left-radius:10px;border-top-left-radius:10px;box-shadow:0 4px 20px 1px rgba(0,0,0,.06),0 1px 4px rgba(0,0,0,.08);max-height:calc(100vh - 140px);overflow-x:visible;overflow-y:scroll}.customizer .customizer-body .layouts{display:flex;flex-wrap:wrap;margin:0 -8px}.customizer .customizer-body .layouts .layout-box{border:1px solid rgba(0,0,0,.08);border-radius:8px;box-shadow:0 4px 20px 1px rgba(0,0,0,.06),0 1px 4px rgba(0,0,0,.03);cursor:pointer;margin:0 8px;overflow:hidden;position:relative;width:calc(50% - 16px)}.customizer .customizer-body .layouts .layout-box img{width:180px}.customizer .customizer-body .layouts .layout-box i{background:#8b5cf6;border-radius:0 0 0 6px;color:#fff;display:none;font-size:18px;height:24px;line-height:24px;position:absolute;right:0;text-align:center;top:0;width:32px}.customizer .customizer-body .layouts .layout-box.active{border:1px solid #ff630f}.customizer .customizer-body .layouts .layout-box.active i{display:inline-block}.customizer .customizer-body .colors{display:flex;flex-wrap:wrap}.customizer .customizer-body .colors .color{border-radius:50%;box-shadow:0 4px 20px 1px rgba(0,0,0,.06),0 1px 4px rgba(0,0,0,.03);cursor:pointer;display:inline-block;height:36px;margin:8px;text-align:center;width:36px}.customizer .customizer-body .colors .color.purple{background:#8b5cf6}.customizer .customizer-body .colors .color.blue{background:#2f47c2}.customizer .customizer-body .colors .color i{color:#fff;display:none;font-size:18px;line-height:36px}.customizer .customizer-body .colors .color.active i{display:unset}@media (max-width:767px){.customizer{right:-280px;width:280px}}[dir=rtl] .customizer{left:-380px;right:auto}[dir=rtl] .customizer.open{left:0;right:auto}[dir=rtl] .customizer .handle{border-bottom-left-radius:0;border-bottom-right-radius:4px;border-top-left-radius:0;border-top-right-radius:4px;box-shadow:-3px 0 4px rgba(0,0,0,.06);left:auto;right:-36px;top:8px}.slider-default{background:#fafafa!important;border:0 solid #d3d3d3!important;border-radius:15px!important;box-shadow:inset 0 1px 1px #f0f0f0,0 3px 6px -5px #bbb;height:10px!important}.slider-default .noUi-value-horizontal{display:none}.slider-default .noUi-handle{border:5px solid #ff630f;border-radius:50%;box-shadow:none;cursor:pointer;height:20px!important;left:-5px!important;top:-5px!important;width:20px!important}.slider-default .noUi-handle:after,.slider-default .noUi-handle:before{background:#e8e7e6;content:none!important;display:block;height:14px;left:14px;position:absolute;top:6px;width:1px}.slider-default .noUi-handle:focus{outline:none}.slider-default .noUi-connect{background:#ff630f;border-radius:15px!important;box-shadow:inset 0 0 3px rgba(51,51,51,.45);transition:background .45s}.square-default{background:#fafafa!important;border:0 solid #d3d3d3!important;border-radius:15px!important;box-shadow:inset 0 1px 1px #f0f0f0,0 3px 6px -5px #bbb;height:10px!important}.square-default .noUi-handle{border:5px solid #ff630f;box-shadow:none;cursor:pointer;height:20px!important;width:20px!important}.square-default .noUi-handle:after,.square-default .noUi-handle:before{background:#e8e7e6;content:" "!important;display:none;height:14px;left:14px;position:absolute;top:6px;width:1px}.square-default .noUi-handle:focus{outline:none}.square-default .noUi-connect{background:#ff630f;border-radius:15px!important;box-shadow:inset 0 0 3px rgba(51,51,51,.45);transition:background .45s}.slider-primary .noUi-connect{background:#ff630f}.slider-primary .noUi-handle{border:5px solid #ff630f}.slider-secondary .noUi-connect{background:#1f2937}.slider-secondary .noUi-handle{border:5px solid #1f2937}.slider-success .noUi-connect{background:#10b981}.slider-success .noUi-handle{border:5px solid #10b981}.slider-info .noUi-connect{background:#3b82f6}.slider-info .noUi-handle{border:5px solid #3b82f6}.slider-warning .noUi-connect{background:#f59e0b}.slider-warning .noUi-handle{border:5px solid #f59e0b}.slider-danger .noUi-connect{background:#ef4444}.slider-danger .noUi-handle{border:5px solid #ef4444}.slider-light .noUi-connect{background:#6b7280}.slider-light .noUi-handle{border:5px solid #6b7280}.slider-dark .noUi-connect{background:#111827}.slider-dark .noUi-handle{border:5px solid #111827}.slider-gray-100 .noUi-connect{background:#f3f4f6}.slider-gray-100 .noUi-handle{border:5px solid #f3f4f6}.slider-gray-200 .noUi-connect{background:#e5e7eb}.slider-gray-200 .noUi-handle{border:5px solid #e5e7eb}.slider-gray-300 .noUi-connect{background:#d1d5db}.slider-gray-300 .noUi-handle{border:5px solid #d1d5db}.slider-gray-400 .noUi-connect{background:#9ca3af}.slider-gray-400 .noUi-handle{border:5px solid #9ca3af}.slider-gray-500 .noUi-connect{background:#6b7280}.slider-gray-500 .noUi-handle{border:5px solid #6b7280}.slider-gray-600 .noUi-connect{background:#4b5563}.slider-gray-600 .noUi-handle{border:5px solid #4b5563}.slider-gray-700 .noUi-connect{background:#374151}.slider-gray-700 .noUi-handle{border:5px solid #374151}.slider-gray-800 .noUi-connect{background:#1f2937}.slider-gray-800 .noUi-handle{border:5px solid #1f2937}.slider-gray-900 .noUi-connect{background:#111827}.slider-gray-900 .noUi-handle{border:5px solid #111827}.slider-custom .noUi-connect{background:#3fb8af}.slider-custom .noUi-handle{border:5px solid #b2dfdb}.slider-extra-large{height:14px!important}.slider-extra-large .noUi-handle{height:28px!important;top:-7px!important;width:28px!important}.slider-large{height:12px!important}.slider-large .noUi-handle{height:24px!important;top:-6px!important;width:24px!important}.slider-small{height:6px!important}.slider-small .noUi-handle{top:-7px!important}.slider-extra-small{height:3px!important}.slider-extra-small .noUi-handle{top:-8px!important}.circle-filled.slider-primary .noUi-handle{background:#ff630f}.circle-filled.slider-secondary .noUi-handle{background:#1f2937}.circle-filled.slider-success .noUi-handle{background:#10b981}.circle-filled.slider-info .noUi-handle{background:#3b82f6}.circle-filled.slider-warning .noUi-handle{background:#f59e0b}.circle-filled.slider-danger .noUi-handle{background:#ef4444}.circle-filled.slider-light .noUi-handle{background:#6b7280}.circle-filled.slider-dark .noUi-handle{background:#111827}.circle-filled.slider-gray-100 .noUi-handle{background:#f3f4f6}.circle-filled.slider-gray-200 .noUi-handle{background:#e5e7eb}.circle-filled.slider-gray-300 .noUi-handle{background:#d1d5db}.circle-filled.slider-gray-400 .noUi-handle{background:#9ca3af}.circle-filled.slider-gray-500 .noUi-handle{background:#6b7280}.circle-filled.slider-gray-600 .noUi-handle{background:#4b5563}.circle-filled.slider-gray-700 .noUi-handle{background:#374151}.circle-filled.slider-gray-800 .noUi-handle{background:#1f2937}.circle-filled.slider-gray-900 .noUi-handle{background:#111827}.square-default.slider-primary .noUi-handle{background:#ff630f}.square-default.slider-secondary .noUi-handle{background:#1f2937}.square-default.slider-success .noUi-handle{background:#10b981}.square-default.slider-info .noUi-handle{background:#3b82f6}.square-default.slider-warning .noUi-handle{background:#f59e0b}.square-default.slider-danger .noUi-handle{background:#ef4444}.square-default.slider-light .noUi-handle{background:#6b7280}.square-default.slider-dark .noUi-handle{background:#111827}.square-default.slider-gray-100 .noUi-handle{background:#f3f4f6}.square-default.slider-gray-200 .noUi-handle{background:#e5e7eb}.square-default.slider-gray-300 .noUi-handle{background:#d1d5db}.square-default.slider-gray-400 .noUi-handle{background:#9ca3af}.square-default.slider-gray-500 .noUi-handle{background:#6b7280}.square-default.slider-gray-600 .noUi-handle{background:#4b5563}.square-default.slider-gray-700 .noUi-handle{background:#374151}.square-default.slider-gray-800 .noUi-handle{background:#1f2937}.square-default.slider-gray-900 .noUi-handle{background:#111827}.circle-filled.slider-custom .noUi-handle,.square-default.slider-custom .noUi-handle{background:#b2dfdb}.vertical-slider-example{display:inline-block}.noUi-vertical{height:150px!important;width:10px!important}.toast-primary{background-color:#ff630f!important}.toast-secondary{background-color:#1f2937!important}.toast-success{background-color:#10b981!important}.toast-info{background-color:#3b82f6!important}.toast-warning{background-color:#f59e0b!important}.toast-danger{background-color:#ef4444!important}.toast-light{background-color:#6b7280!important}.toast-dark{background-color:#111827!important}.toast-gray-100{background-color:#f3f4f6!important}.toast-gray-200{background-color:#e5e7eb!important}.toast-gray-300{background-color:#d1d5db!important}.toast-gray-400{background-color:#9ca3af!important}.toast-gray-500{background-color:#6b7280!important}.toast-gray-600{background-color:#4b5563!important}.toast-gray-700{background-color:#374151!important}.toast-gray-800{background-color:#1f2937!important}.toast-gray-900{background-color:#111827!important}.dropzone{background:#f5f5f5!important;border:2px dashed #673ab75e!important;min-height:150px;padding:20px}.nav-tabs{border-bottom:1px solid #ff630f}.nav-tabs .nav-item .nav-link.active{background:rgba(102,51,153,.1);border:1px solid #ff630f;border-bottom-color:#fff}.dropdown-toggle:after{border-bottom:0;border-left:.3em solid transparent;border-right:.3em solid transparent;border-top:.3em solid;content:"";display:inline-block;height:0;right:5px;vertical-align:.255em;width:0}#calendar{float:right;width:100%}#external-events h4{font-size:16px;margin-top:0;padding-top:1em}#external-events .fc-event{cursor:move;margin:2px 0}.create_event_wrap p{color:#666;font-size:11px;margin:1.5em 0}.create_event_wrap p input{margin:0;vertical-align:middle}.fc-event{border:0 solid #ff630f!important;border-radius:3px;display:block;font-size:.85em;line-height:1.3;position:relative}a.fc-day-grid-event{background:#ff630f;padding:5px}th.fc-day-header{background:#f5f5f5;border-bottom-width:2px;display:table-cell;font-size:16px;font-weight:700;padding:10px 0;text-align:center}td.fc-head-container{padding:0!important}.fc-toolbar h2{font-weight:700;margin:0}span.fa{speak:none;-webkit-font-smoothing:antialiased;font-family:iconsmind!important;font-style:normal;font-variant:normal;font-weight:400;line-height:1;text-transform:none}span.fa.fa-chevron-left:before{content:"\f077"}span.fa.fa-chevron-right:before{content:"\f07d"}.echarts{height:100%;width:100%}table.tableOne.vgt-table thead tr th{background:#fff}table.tableOne.vgt-table{font-size:13px}.vgt-global-search.vgt-clearfix{background:#fff}.vgt-table.full-height{min-height:390px!important}.vgt-table.non-height{min-height:none!important}.vgt-wrap .vgt-inner-wrap{box-shadow:unset!important}div.vgt-wrap__footer.vgt-clearfix{background:#fff;font-size:14px}.vgt-wrap__footer .footer__navigation__page-btn span{font-size:14px!important}.vgt-wrap__footer .footer__row-count__label{color:#909399;font-size:14px}.vgt-wrap__footer .footer__row-count:after{display:none}.vgt-wrap__footer .footer__row-count__select{-webkit-appearance:auto!important;-moz-appearance:auto!important;appearance:auto!important;background-color:transparent;border:0;border-radius:0;color:#606266;font-size:14px;font-weight:700;height:auto;margin-left:8px;padding:0;width:auto}.vgt-wrap__footer .footer__row-count__label{margin-bottom:0!important}.vgt-wrap__footer .footer__navigation{font-size:14px}span.chevron.right:after{border-left:6px solid #b0b1b3!important}span.chevron.left:after{border-right:6px solid #b0b1b3!important}table.tableOne tbody tr th.line-numbers,table.tableOne tbody tr th.vgt-checkbox-col{background:#fff}.vgt-wrap__footer .footer__navigation>button:first-of-type{margin-right:0}input.vgt-input.vgt-pull-left{width:auto}.table-alert__box{background-color:#d4edda!important;border-color:#c3e6cb!important;color:#155724!important;padding:.75rem!important}.gull-border-none{border-bottom:none!important}.vgt-global-search.vgt-clearfix,.vgt-wrap__footer.vgt-clearfix,table.tableOne.vgt-table{border:none!important}th.line-numbers,th.vgt-checkbox-col{border-bottom:1px solid #dcdfe6;border-right:none!important}.order-table.vgt-table{border:0 solid #dcdfe6;font-size:14px}.order-table.vgt-table thead th{background:transparent;font-weight:600!important;padding-right:1.5em;vertical-align:bottom}.order-table.vgt-table td,.order-table.vgt-table thead th{border-bottom:0 solid #dcdfe6;color:#111827;font-size:14px;min-width:140px!important}.order-table.vgt-table td{padding:10px;vertical-align:middle}.order-table.vgt-table tbody tr{cursor:pointer;padding:15px;transition:all .5s}.order-table.vgt-table tbody tr:hover{background:#eee;border-radius:10px}@media only screen and (max-width:750px){.vgt-wrap__footer .footer__navigation__page-info{display:none}.vgt-table th.sortable button{top:8px}}@media (min-width:750px) and (max-width:1024px){.vgt-table th.sortable button{top:8px}}@media (min-width:1024px) and (max-width:1024px){.vgt-table th.sortable button{top:0}}.clock-picker__input{background:#f8f9fa;background-clip:padding-box;border:1px solid #ced4da;border-radius:.25rem;color:#47404f;color:#665c70;display:block;font-size:.813rem;font-weight:400;height:calc(1.5em + .75rem + 2px);line-height:1.5;outline:initial!important;padding:.375rem .75rem;transition:border-color .15s ease-in-out,box-shadow .15s ease-in-out;width:100%}.clock-picker__input--error,.clock-picker__input--error.clock-picker__input--has-value{color:#f44336}.clock-picker__input--error .clock-picker__input,.clock-picker__input--error.clock-picker__input--has-value .clock-picker__input{border-color:#f44336}.clock-picker__input--has-value .clock-picker__input{border-color:#00e676}.clock-picker__button{background:none;border:0;border-radius:12px;color:#757575;cursor:pointer;display:inline-block;font-size:13px;font-weight:500;height:24px;line-height:24px;margin:0;padding:0;width:24px}.clock-picker__button:hover{background-color:#f5f5f5}.clock-picker__button:active{background-color:#ededed}.clock-picker__button:focus{background-color:#e8e8e8}.clock-picker__button--active,.clock-picker__button--active:active,.clock-picker__button--active:focus,.clock-picker__button--active:hover{background-color:#a48bd1;color:#fff}.clock-picker__button[disabled]{cursor:default;opacity:.4!important}.clock-picker__button[disabled],.clock-picker__button[disabled]:active,.clock-picker__button[disabled]:focus,.clock-picker__button[disabled]:hover{background-color:#f5f5f5;color:#757575}.clock-picker__dialog{display:none}.clock-picker__dialog--active{display:block}.clock-picker__dialog-drop{background-color:rgba(0,0,0,.2);height:100%;left:0;position:fixed;top:0;width:100%;z-index:200}.clock-picker__dialog-body{background-color:#fff;border-radius:5px;left:50%;margin:-235px -160px;max-height:100%;max-width:100%;overflow:auto;position:fixed;top:50%;transform:scale(1);width:320px;z-index:201}.clock-picker__dialog-header{font-size:2rem;padding:1.5rem;text-align:center;-webkit-user-select:none;-moz-user-select:none;user-select:none}.clock-picker__dialog-header span:focus,.clock-picker__dialog-header span:hover{cursor:pointer}.clock-picker__dialog-content{height:280px;margin-bottom:24px;margin-top:24px;position:relative;width:100%}.clock-picker__dialog-content .clock-picker__hours,.clock-picker__dialog-content .clock-picker__minutes{position:absolute}.clock-picker__dialog-actions{border-top:1px solid #f5f5f5;display:flex;flex-direction:row;padding:.5rem}.clock-picker__dialog-action{background:transparent;border:0;cursor:pointer;display:inline-block;flex:1;font-size:16px;font-weight:500;line-height:32px;margin:0;padding:0 1rem}.clock-picker__dialog-action:hover{background-color:#f5f5f5}.clock-picker__dialog-action:focus{background-color:#ededed}.clock-picker__dialog-action:active{background-color:#e6e6e6}.clock-picker__dialog-action[disabled]{background-color:#f5f5f5;color:#e6e6e6}.clock-picker__dialog-action[disabled]:active,.clock-picker__dialog-action[disabled]:focus,.clock-picker__dialog-action[disabled]:hover{cursor:not-allowed}.clock-picker__dialog .fade-enter-active,.clock-picker__dialog .fade-leave-active,.clock-picker__dialog .scale-enter-active,.clock-picker__dialog .scale-leave-active{transition:all .3s ease}.clock-picker__dialog .scale-enter,.clock-picker__dialog .scale-leave-active{opacity:0;transform:scale(0)}.clock-picker__dialog .fade-enter,.clock-picker__dialog .fade-leave-active{opacity:0}.clock-picker__hours,.clock-picker__minutes{height:280px;position:relative;width:100%}.tag-custom{border-bottom:1px solid #000;max-width:1000%!important}.ti-input{border:none!important}.ti-tag.ti-valid{background-color:#8b5cf6!important;border-radius:50rem!important;min-height:30px;padding:0 12px!important}.echarts{height:100%!important;width:100%!important}.chart-wrapper{height:300px;width:100%}.apexcharts-legend.center.position-bottom{bottom:-2px!important}@media (max-width:767px){.apexcharts-toolbar{display:none!important}}.v-select{background:#f3f4f6}.v-select.is-invalid~.invalid-feedback{display:block}.vs__search,.vs__search:focus{height:calc(1rem + 7px)}.main-header{align-items:center;background:#fff;box-shadow:0 1px 15px rgba(0,0,0,.04),0 1px 6px rgba(0,0,0,.04);display:flex;flex-wrap:wrap;height:80px;justify-content:space-between;position:fixed;width:100%;z-index:100}.main-header .menu-toggle{align-items:center;cursor:pointer;display:flex;flex-direction:column;margin-right:12px;width:90px}.main-header .menu-toggle div{background:#111827;height:1px;margin:3px 0;width:24px}.main-header .search-bar{align-items:center;background:#f3f4f6;border:1px solid #e5e7eb;border-radius:20px;display:flex;height:40px;justify-content:left;position:relative;width:230px}.main-header .search-bar input{background:transparent;border:0;color:#212121;font-size:.8rem;height:100%;line-height:2;outline:initial!important;padding:.5rem 1rem;width:calc(100% - 32px)}.main-header .search-bar .search-icon{display:inline-block;font-size:18px;width:24px}.main-header .logo{width:120px}.main-header .logo img{display:block;height:60px;margin:0 auto;width:60px}.main-header .show .header-icon{background:#f3f4f6}.main-header .header-icon{border-radius:8px;cursor:pointer;display:inline-block;font-size:19px;height:36px;line-height:36px;margin:0 2px;text-align:center;width:36px}.main-header .header-icon:hover{background:#f3f4f6}.main-header .header-icon.dropdown-toggle:after{display:none}.main-header .header-part-right{align-items:center;display:flex}.main-header .header-part-right .user{margin-right:2rem}.main-header .header-part-right .user img{border-radius:50%;cursor:pointer;height:36px;width:36px}.main-header .notification-dropdown{cursor:pointer;max-height:260px;padding:0}.main-header .notification-dropdown .dropdown-item{align-items:center;border-bottom:1px solid #d1d5db;display:flex;height:72px;padding:0}.main-header .notification-dropdown .dropdown-item .notification-icon{align-items:center;background:#e5e7eb;display:flex;height:100%;justify-content:center;width:44px}.main-header .notification-dropdown .dropdown-item .notification-icon i{font-size:18px}.main-header .notification-dropdown .dropdown-item .notification-details{padding:.25rem .75rem}.main-header .notification-dropdown .dropdown-item:active{background:inherit;color:inherit}@media (max-width:991px){.main-header .search-bar{width:180px}.main-header .menu-toggle{margin-right:36px;width:24px}}@media (max-width:615px){.main-header .header-part-right .user{margin-right:0}}@media (max-width:580px){.main-header{height:70px;padding:0 1.5rem}.main-header .logo{width:60px}.main-header .search-bar{display:none}.main-header .menu-toggle{width:60px}.main-header .header-part-right .user{margin-right:0;padding-right:0}.notification-dropdown{left:10px!important}}@media (max-width:360px){.main-header .menu-toggle{margin:0}}.layout-horizontal-bar .header-topnav{background-color:#fff;box-shadow:0 1px 15px rgba(0,0,0,.04),0 1px 6px rgba(0,0,0,.04);margin:0;padding:0;position:relative;position:fixed;top:80px;width:100%;z-index:10}.layout-horizontal-bar .header-topnav .container{padding:0}.layout-horizontal-bar .header-topnav .topbar-branding{float:left;height:48px;margin:0 8px;padding:8px}.layout-horizontal-bar .header-topnav .topbar-branding img{height:100%;width:auto}.layout-horizontal-bar .header-topnav .ps{-ms-overflow-style:none;overflow:initial!important;overflow-anchor:none;touch-action:auto;-ms-touch-action:auto}.layout-horizontal-bar .header-topnav .topnav{align-items:center;display:flex;height:auto}.layout-horizontal-bar .header-topnav .header-topnav-right{align-items:center;display:flex;float:right;height:48px;padding-right:.67rem}.layout-horizontal-bar .header-topnav .topnav:after{clear:both;content:"";display:table}.layout-horizontal-bar .header-topnav .topnav a{-webkit-text-decoration-skip:objects;background-color:transparent;color:#333!important;text-decoration:none}.layout-horizontal-bar .header-topnav .topnav label.menu-toggle{border-radius:50%;box-sizing:border-box;height:48px;padding:12px;width:48px}.layout-horizontal-bar .header-topnav .topnav label.menu-toggle .mat-icon{font-size:24px}.layout-horizontal-bar .header-topnav .topnav .toggle,.layout-horizontal-bar .header-topnav .topnav [id^=drop]{display:none}.layout-horizontal-bar .header-topnav .topnav ul{list-style:none;margin:0;padding:0;position:relative}.layout-horizontal-bar .header-topnav .topnav ul:not(.menu){box-shadow:0 0 4px transparent,0 4px 8px rgba(0,0,0,.28)}.layout-horizontal-bar .header-topnav .topnav ul.menu{float:left;height:48px;padding-right:45px}.layout-horizontal-bar .header-topnav .topnav ul.menu>li{float:left}.layout-horizontal-bar .header-topnav .topnav ul.menu>li>div>a,.layout-horizontal-bar .header-topnav .topnav ul.menu>li>div>div{border-bottom:2px solid;border-color:transparent;box-sizing:border-box;height:48px;margin:0 6px}.layout-horizontal-bar .header-topnav .topnav ul li{display:inline-block;margin:0}.layout-horizontal-bar .header-topnav .topnav a,.layout-horizontal-bar .header-topnav .topnav label{align-items:center;box-sizing:border-box;cursor:pointer;display:flex;flex-direction:row;font-size:.875rem;height:44px;padding:13px 20px;text-decoration:none}.layout-horizontal-bar .header-topnav .topnav ul li ul li.open,.layout-horizontal-bar .header-topnav .topnav ul li ul li:hover{background:#eee}.layout-horizontal-bar .header-topnav .topnav ul ul{background:#fff;border-radius:5px;color:rgba(0,0,0,.87);opacity:0;position:absolute;top:48px;transform:translateY(-100px);transition:all .3s ease-in-out;visibility:hidden;z-index:-1}.layout-horizontal-bar .header-topnav .topnav ul li:hover>div>div>ul,.layout-horizontal-bar .header-topnav .topnav ul li:hover>div>ul{opacity:1;transform:translateY(0);visibility:visible}.layout-horizontal-bar .header-topnav .topnav ul ul li{display:list-item;float:none;position:relative;width:170px}.layout-horizontal-bar .header-topnav .topnav ul ul ul{left:170px;top:0}.layout-horizontal-bar .header-topnav .topnav ul ul ul li{position:relative;top:0}.layout-horizontal-bar .header-topnav .topnav li>a:after{content:" +"}.layout-horizontal-bar .header-topnav .topnav li>a:only-child:after{content:""}@media (max-width:959px){.header-topnav-right{position:absolute;right:6px;top:0}}@media only screen and (max-width:768px){.layout-horizontal-bar .header-topnav{background-color:#fff;box-shadow:0 1px 15px rgba(0,0,0,.04),0 1px 6px rgba(0,0,0,.04);height:100%;left:-200px;margin:0;padding:20px 0 0;position:relative;position:fixed;top:70px;transition:all .5s ease-in-out;width:200px;z-index:10}.layout-horizontal-bar .header-topnav .ps{-ms-overflow-style:none;overflow:hidden!important;overflow-anchor:none;touch-action:auto;-ms-touch-action:auto}.layout-horizontal-bar .topnav{margin:0;max-height:calc(100vh - 80px)!important}.layout-horizontal-bar .topnav .menu{height:auto!important;padding-right:0!important;width:100%}.layout-horizontal-bar .topnav .menu li a{border:none!important}.layout-horizontal-bar .topnav ul.menu{float:left;padding-left:0}.layout-horizontal-bar .topnav ul.menu>li{float:left}.layout-horizontal-bar .topnav ul.menu>li>div>a,.layout-horizontal-bar .topnav ul.menu>li>div>div{border-bottom:2px solid;border-color:transparent;box-sizing:border-box;height:auto!important;margin:0 6px}.layout-horizontal-bar .topnav .toggle{border:none;display:flex;text-decoration:none}.layout-horizontal-bar .topnav ul{transform:translateY(0)!important;transition:max-height .3s ease-in-out}.layout-horizontal-bar .topnav [id^=drop]:checked+ul{max-height:2000px;opacity:1;visibility:visible}.layout-horizontal-bar .topnav [id^=drop]:checked+ul.menu{max-height:300px;overflow-y:scroll}.layout-horizontal-bar .topnav ul li{opacity:1;position:relative;visibility:visible;width:100%;z-index:1}.layout-horizontal-bar .topnav ul ul .toggle,.layout-horizontal-bar .topnav ul ul a{padding:0 40px}.layout-horizontal-bar .topnav ul ul ul a{padding:0 80px}.layout-horizontal-bar .topnav ul li ul li .toggle,.layout-horizontal-bar .topnav ul ul a,.layout-horizontal-bar .topnav ul ul ul a{padding:14px 20px}.layout-horizontal-bar .topnav ul ul{background:#fff;border-radius:5px;color:rgba(0,0,0,.87);left:0;max-height:0;opacity:1!important;overflow:hidden;position:relative!important;top:0!important;transform:translateY(-100px);transition:all 1s ease-in-out!important;visibility:hidden!important;z-index:99!important}.layout-horizontal-bar .topnav ul li:hover>div>div>ul,.layout-horizontal-bar .topnav ul li:hover>div>ul{max-height:400px;opacity:1!important;transform:translateY(0);transition:all .3s ease-in-out!important;visibility:visible!important}.layout-horizontal-bar .topnav ul ul li{opacity:1;visibility:visible;width:100%!important}.layout-horizontal-bar .topnav ul:not(.menu){border-left:1px dashed #eee;box-shadow:none!important;margin-left:5px}.layout-horizontal-bar .topnav ul ul ul{left:0}.layout-horizontal-bar .topnav ul ul ul li{position:static}}@media (max-width:330px){.topnav ul li{display:block;width:94%}}[dir=rtl] .topnav a .mat-icon,[dir=rtl] .topnav label .mat-icon{margin-left:2px;margin-right:0}.app-footer{background:#e5e7eb;border-top-left-radius:10px;border-top-right-radius:10px;margin-top:2rem;padding:1.25rem}.app-footer .footer-bottom{width:100%}.app-footer .footer-bottom .logo{height:auto;margin:4px;width:3rem}.custom-separator{border-bottom:1px dashed #ebedf2;margin:15px 0}div.tab-border{border:1px dashed #ebedf2!important;margin:30px 0!important}.m-0{margin:0!important}.mt-0{margin-top:0!important}.mr-0{margin-right:0!important}.mb-0{margin-bottom:0!important}.ml-0,.mx-0{margin-left:0!important}.mx-0{margin-right:0!important}.my-0{margin-bottom:0!important;margin-top:0!important}.p-0{padding:0!important}.pt-0{padding-top:0!important}.pr-0{padding-right:0!important}.pb-0{padding-bottom:0!important}.pl-0,.px-0{padding-left:0!important}.px-0{padding-right:0!important}.py-0{padding-bottom:0!important;padding-top:0!important}.m-8{margin:8px!important}.mt-8{margin-top:8px!important}.mr-8{margin-right:8px!important}.mb-8{margin-bottom:8px!important}.ml-8,.mx-8{margin-left:8px!important}.mx-8{margin-right:8px!important}.my-8{margin-bottom:8px!important;margin-top:8px!important}.p-8{padding:8px!important}.pt-8{padding-top:8px!important}.pr-8{padding-right:8px!important}.pb-8{padding-bottom:8px!important}.pl-8,.px-8{padding-left:8px!important}.px-8{padding-right:8px!important}.py-8{padding-bottom:8px!important;padding-top:8px!important}.m-12{margin:12px!important}.mt-12{margin-top:12px!important}.mr-12{margin-right:12px!important}.mb-12{margin-bottom:12px!important}.ml-12,.mx-12{margin-left:12px!important}.mx-12{margin-right:12px!important}.my-12{margin-bottom:12px!important;margin-top:12px!important}.p-12{padding:12px!important}.pt-12{padding-top:12px!important}.pr-12{padding-right:12px!important}.pb-12{padding-bottom:12px!important}.pl-12,.px-12{padding-left:12px!important}.px-12{padding-right:12px!important}.py-12{padding-bottom:12px!important;padding-top:12px!important}.m-16{margin:16px!important}.mt-16{margin-top:16px!important}.mr-16{margin-right:16px!important}.mb-16{margin-bottom:16px!important}.ml-16,.mx-16{margin-left:16px!important}.mx-16{margin-right:16px!important}.my-16{margin-bottom:16px!important;margin-top:16px!important}.p-16{padding:16px!important}.pt-16{padding-top:16px!important}.pr-16{padding-right:16px!important}.pb-16{padding-bottom:16px!important}.pl-16,.px-16{padding-left:16px!important}.px-16{padding-right:16px!important}.py-16{padding-bottom:16px!important;padding-top:16px!important}.m-24{margin:24px!important}.mt-24{margin-top:24px!important}.mr-24{margin-right:24px!important}.mb-24{margin-bottom:24px!important}.ml-24,.mx-24{margin-left:24px!important}.mx-24{margin-right:24px!important}.my-24{margin-bottom:24px!important;margin-top:24px!important}.p-24{padding:24px!important}.pt-24{padding-top:24px!important}.pr-24{padding-right:24px!important}.pb-24{padding-bottom:24px!important}.pl-24,.px-24{padding-left:24px!important}.px-24{padding-right:24px!important}.py-24{padding-bottom:24px!important;padding-top:24px!important}.m-28{margin:28px!important}.mt-28{margin-top:28px!important}.mr-28{margin-right:28px!important}.mb-28{margin-bottom:28px!important}.ml-28,.mx-28{margin-left:28px!important}.mx-28{margin-right:28px!important}.my-28{margin-bottom:28px!important;margin-top:28px!important}.p-28{padding:28px!important}.pt-28{padding-top:28px!important}.pr-28{padding-right:28px!important}.pb-28{padding-bottom:28px!important}.pl-28,.px-28{padding-left:28px!important}.px-28{padding-right:28px!important}.py-28{padding-bottom:28px!important;padding-top:28px!important}.m-30{margin:30px!important}.mt-30{margin-top:30px!important}.mr-30{margin-right:30px!important}.mb-30{margin-bottom:30px!important}.ml-30,.mx-30{margin-left:30px!important}.mx-30{margin-right:30px!important}.my-30{margin-bottom:30px!important;margin-top:30px!important}.p-30{padding:30px!important}.pt-30{padding-top:30px!important}.pr-30{padding-right:30px!important}.pb-30{padding-bottom:30px!important}.pl-30,.px-30{padding-left:30px!important}.px-30{padding-right:30px!important}.py-30{padding-bottom:30px!important;padding-top:30px!important}.m-32{margin:32px!important}.mt-32{margin-top:32px!important}.mr-32{margin-right:32px!important}.mb-32{margin-bottom:32px!important}.ml-32,.mx-32{margin-left:32px!important}.mx-32{margin-right:32px!important}.my-32{margin-bottom:32px!important;margin-top:32px!important}.p-32{padding:32px!important}.pt-32{padding-top:32px!important}.pr-32{padding-right:32px!important}.pb-32{padding-bottom:32px!important}.pl-32,.px-32{padding-left:32px!important}.px-32{padding-right:32px!important}.py-32{padding-bottom:32px!important;padding-top:32px!important}.m-36{margin:36px!important}.mt-36{margin-top:36px!important}.mr-36{margin-right:36px!important}.mb-36{margin-bottom:36px!important}.ml-36,.mx-36{margin-left:36px!important}.mx-36{margin-right:36px!important}.my-36{margin-bottom:36px!important;margin-top:36px!important}.p-36{padding:36px!important}.pt-36{padding-top:36px!important}.pr-36{padding-right:36px!important}.pb-36{padding-bottom:36px!important}.pl-36,.px-36{padding-left:36px!important}.px-36{padding-right:36px!important}.py-36{padding-bottom:36px!important;padding-top:36px!important}.m-40{margin:40px!important}.mt-40{margin-top:40px!important}.mr-40{margin-right:40px!important}.mb-40{margin-bottom:40px!important}.ml-40,.mx-40{margin-left:40px!important}.mx-40{margin-right:40px!important}.my-40{margin-bottom:40px!important;margin-top:40px!important}.p-40{padding:40px!important}.pt-40{padding-top:40px!important}.pr-40{padding-right:40px!important}.pb-40{padding-bottom:40px!important}.pl-40,.px-40{padding-left:40px!important}.px-40{padding-right:40px!important}.py-40{padding-bottom:40px!important;padding-top:40px!important}.m-44{margin:44px!important}.mt-44{margin-top:44px!important}.mr-44{margin-right:44px!important}.mb-44{margin-bottom:44px!important}.ml-44,.mx-44{margin-left:44px!important}.mx-44{margin-right:44px!important}.my-44{margin-bottom:44px!important;margin-top:44px!important}.p-44{padding:44px!important}.pt-44{padding-top:44px!important}.pr-44{padding-right:44px!important}.pb-44{padding-bottom:44px!important}.pl-44,.px-44{padding-left:44px!important}.px-44{padding-right:44px!important}.py-44{padding-bottom:44px!important;padding-top:44px!important}.m-48{margin:48px!important}.mt-48{margin-top:48px!important}.mr-48{margin-right:48px!important}.mb-48{margin-bottom:48px!important}.ml-48,.mx-48{margin-left:48px!important}.mx-48{margin-right:48px!important}.my-48{margin-bottom:48px!important;margin-top:48px!important}.p-48{padding:48px!important}.pt-48{padding-top:48px!important}.pr-48{padding-right:48px!important}.pb-48{padding-bottom:48px!important}.pl-48,.px-48{padding-left:48px!important}.px-48{padding-right:48px!important}.py-48{padding-bottom:48px!important;padding-top:48px!important}.m-80{margin:80px!important}.mt-80{margin-top:80px!important}.mr-80{margin-right:80px!important}.mb-80{margin-bottom:80px!important}.ml-80,.mx-80{margin-left:80px!important}.mx-80{margin-right:80px!important}.my-80{margin-bottom:80px!important;margin-top:80px!important}.p-80{padding:80px!important}.pt-80{padding-top:80px!important}.pr-80{padding-right:80px!important}.pb-80{padding-bottom:80px!important}.pl-80,.px-80{padding-left:80px!important}.px-80{padding-right:80px!important}.py-80{padding-bottom:80px!important;padding-top:80px!important}.m-auto{margin:auto!important}.mx-auto{margin-left:auto!important;margin-right:auto!important}.my-auto{margin-bottom:auto!important;margin-top:auto!important}@media (max-width:991px){.mobile-reset-pb{padding-bottom:0!important}}._dot{background-color:#fff;border-radius:50%;height:5px;width:5px}._inline-dot{display:inline-block}._round-button{border-radius:50%!important}.progress--height-2{height:5px}.b-form-file.is-invalid~.invalid-feedback,.form-control.is-invalid .invalid-feedback,.input-group~.invalid-feedback,.tag-custom.is-invalid~.invalid-feedback,.vdp-datepicker~.invalid-feedback,input.is-invalid~.invalid-feedback{display:block}#my-strictly-unique-vue-upload-multiple-image{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;color:#2c3e50;font-family:Avenir,Helvetica,Arial,sans-serif;text-align:center}.inbox-main-sidebar-container{padding:15px}.inbox-main-sidebar-container .inbox-main-content{margin-left:180px}.inbox-main-sidebar-container .inbox-main-sidebar{height:100%;margin-left:0;overflow:hidden;width:180px}.inbox-main-sidebar-container .inbox-main-sidebar .inbox-main-nav{list-style:none;margin:0;padding:0}.inbox-main-sidebar-container .inbox-main-sidebar .inbox-main-nav li a{align-items:center;color:#111827;display:flex;flex-direction:row;padding:.66rem 0}.inbox-main-sidebar-container .inbox-main-sidebar .inbox-main-nav li a.active,.inbox-main-sidebar-container .inbox-main-sidebar .inbox-main-nav li a:hover{color:#ff630f}.inbox-main-sidebar-container .inbox-main-sidebar .inbox-main-nav li a i{margin-right:8px}.inbox-main-sidebar-container .inbox-secondary-sidebar-container{border-radius:10px;min-height:calc(100vh - 150px)}.inbox-main-sidebar-container .inbox-secondary-sidebar-container .sidebar-content{margin-left:360px}.inbox-main-sidebar-container .inbox-secondary-sidebar-container .inbox-secondary-sidebar-content .inbox-topbar{display:flex;flex-direction:row;height:52px}.inbox-main-sidebar-container .inbox-secondary-sidebar-container .inbox-secondary-sidebar-content .inbox-details{padding:1.5rem 2rem}.inbox-main-sidebar-container .inbox-secondary-sidebar-container .inbox-secondary-sidebar{border-right:1px solid #e5e7eb;height:100%;overflow:hidden;width:360px}.inbox-main-sidebar-container .inbox-secondary-sidebar-container .inbox-secondary-sidebar .mail-item{border-bottom:1px solid #e5e7eb;cursor:pointer;display:flex;padding:1.25rem 1rem}.inbox-main-sidebar-container .inbox-secondary-sidebar-container .inbox-secondary-sidebar .mail-item:hover{background:#f3f4f6}.inbox-main-sidebar-container .inbox-secondary-sidebar-container .inbox-secondary-sidebar .mail-item .avatar{width:15%}.inbox-main-sidebar-container .inbox-secondary-sidebar-container .inbox-secondary-sidebar .mail-item .details{width:60%}.inbox-main-sidebar-container .inbox-secondary-sidebar-container .inbox-secondary-sidebar .mail-item .date{font-size:10px;width:25%}.inbox-main-sidebar-container .inbox-secondary-sidebar-container .inbox-secondary-sidebar .mail-item .date span{float:right}.inbox-main-sidebar-container .inbox-secondary-sidebar-container .inbox-secondary-sidebar .avatar img{border-radius:50%;height:32px;margin:4px;width:32px}.inbox-main-sidebar-container .inbox-secondary-sidebar-container .inbox-secondary-sidebar .name{display:block;font-size:12px}@media (max-width:767px){.inbox-main-sidebar-container .inbox-secondary-sidebar-container .sidebar-content,.sidebar-container .sidebar-content{margin-left:0}.inbox-main-sidebar-container .inbox-secondary-sidebar-container .inbox-secondary-sidebar{margin-left:-280px}.inbox-main-sidebar-container .inbox-main-sidebar{margin-left:-260px}.mail-item{padding:1rem .5rem!important}.inbox-secondary-sidebar{margin-left:0;width:280px!important}}[dir=rtl] .inbox-main-sidebar-container .inbox-main-sidebar .inbox-main-nav li a i{margin-left:8px;margin-right:0}.pos_page{min-height:100vh;position:absolute;right:0;top:0;width:100%}#invoice-POS h1,#invoice-POS h2,#invoice-POS h3,#invoice-POS h4,#invoice-POS h5,#invoice-POS h6{color:#05070b;font-weight:bolder}#pos .pos-detail{height:42vh!important}#pos .pos-detail .table-responsive{border-bottom:none!important;height:40vh!important;max-height:40vh!important}#pos .pos-detail .table-responsive tr{font-size:14px}#pos .card-order{min-height:100%}#pos .card-order .main-header{position:relative}#pos .grandtotal{background-color:#7ec8ca;font-size:1.2rem;font-weight:800;height:40px;margin-bottom:20px;padding:5px;text-align:center}#pos .list-grid .list-item .list-thumb img{height:100px!important;max-height:100px!important;-o-object-fit:cover;object-fit:cover;width:100%!important}#pos .list-grid{height:100%;min-height:100%;overflow:scroll}#pos .brand-Active{border:2px solid}.centred{align-content:center;text-align:center}@media (min-width:1024px){#pos .list-grid{height:100vh;min-height:100vh;overflow:scroll}}#pos .card.o-hidden{max-width:18%;min-width:130px;width:18%}#pos .input-customer{align-items:stretch;display:flex;flex-wrap:unset;position:relative;width:100%}#pos .card.o-hidden:hover{border:1px solid;cursor:pointer}#invoice-POS{font-family:sans-serif;font-size:14px;line-height:20px;max-width:400px;text-transform:capitalize}@media print{body{visibility:hidden}#invoice-POS{font-size:12px;line-height:20px;visibility:visible}@page{margin:0}}#total tr{background-color:#ddd}#top .logo{background-size:100px 100px;height:100px;width:100px}.title{float:right}.title p{text-align:right}table{border-collapse:collapse;width:100%}#invoice-POS table tr{border-bottom:3px dotted #ddd!important}.tabletitle{background:#eee;font-size:.5em}#legalcopy{margin-top:5mm}#bar,#legalcopy p{text-align:center}.quantity{max-width:95px;width:95px}.quantity input{border:none;text-align:center}.quantity .form-control:focus{background-color:unset;border-color:#e1d5fd;box-shadow:unset;color:#374151;outline:0}.quantity span{padding:8px}.list-horizontal .list-item .list-thumb img{height:74px;-o-object-fit:cover;object-fit:cover}.list-horizontal .list-item .item-title{overflow:hidden!important;text-overflow:ellipsis!important;white-space:nowrap!important}.list-horizontal .list-item a{color:#111827}.list-grid .list-item .list-thumb img{height:180px;-o-object-fit:cover;object-fit:cover;width:100%}.list-grid .list-item .card-body{display:block!important}.list-grid .list-item .item-title{max-width:300px;overflow:hidden!important;text-overflow:ellipsis!important;white-space:nowrap!important}.list-grid .list-item a{color:#111827}.list-grid .list-item .item-actions,.list-grid .list-item .item-badges{position:absolute;top:16px}.list-grid .list-item .item-actions{right:16px}.list-grid .list-item .item-badges{left:16px}.list-grid .list-item .item-select{display:none}@media (max-width:991px){.list-horizontal .list-item .list-thumb img{height:100%;width:100px}.list-horizontal .list-item .item-title{max-width:200px}}@media (max-width:576px){.list-horizontal .list-item .item-title{max-width:150px}}.user-profile .header-cover{background-repeat:no-repeat;background-size:cover;height:300px;position:relative}.user-profile .header-cover:after{background:rgba(0,0,0,.1);content:"";height:100%;position:absolute;width:100%}.user-profile .user-info{align-items:center;display:flex;flex-direction:column;justify-content:center;margin-top:-40px;z-index:9}.user-profile .profile-picture{border:4px solid #fff;border-radius:50%}.user-profile .profile-nav{justify-content:center}.timeline{list-style:none;margin:0;padding:0;position:relative}.timeline .timeline-item{display:inline-block;position:relative;width:50%}.timeline .timeline-item:nth-child(2n){padding:0 3rem 3rem 0}.timeline .timeline-item:nth-child(2n) .timeline-badge{left:calc(100% - 24px)}.timeline .timeline-item:nth-child(odd){float:right;margin-top:6rem;padding:0 0 3rem 3rem}.timeline .timeline-item:nth-child(odd) .timeline-badge{right:calc(100% - 24px)}.timeline .timeline-item .timeline-badge{height:48px;position:absolute;width:48px}.timeline .timeline-item .badge-icon{font-size:22px;line-height:48px;text-align:center}.timeline .timeline-item .badge-icon,.timeline .timeline-item .badge-img{border-radius:50%;display:inline-block;height:100%;width:100%}.timeline .timeline-group{padding:0 0 2rem;position:relative;z-index:99}.timeline .timeline-line{background:#d1d5db;content:"";height:100%;left:0;margin:auto;position:absolute;right:0;width:1px}@media (max-width:767px){.user-profile .header-cover{height:200px}.timeline .timeline-item{padding:4rem 0 3rem!important;width:100%}.timeline .timeline-item:nth-child(odd){margin-top:1rem}.timeline .timeline-item .timeline-badge{left:0!important;margin:auto;right:0!important;top:-16px}.timeline .timeline-group{padding:0 0 3rem}}.auth-layout-wrap{align-items:center;background-size:cover;background:url(/images/photo-wide-4.jpg?ea98fbfd3510c4f272ebf0b557fc7eba);display:flex;flex-direction:column;justify-content:center;min-height:100vh}.auth-layout-wrap .auth-content{margin:auto;min-width:340px}.auth-right{align-items:center;display:flex;flex-direction:column;height:100%;justify-content:center}.auth-logo img{height:100px;width:100px}@media (min-width:1024px){.auth-layout-wrap .auth-content{min-width:340px}}@media (max-width:767px){.auth-layout-wrap .auth-content{min-width:320px;padding:15px}.auth-right{padding:80px 15px}}.not-found-wrap{background-image:url(/images/page-bg-bottom.png?83e9c72af45681bac04ea0d922febd71);background-position-y:bottom;background-repeat:no-repeat;background-size:cover;background-size:100%;height:100vh;padding:120px 0}.not-found-wrap h1{font-weight:800;line-height:1;margin-bottom:16px}.not-found-wrap .subheading{font-weight:800}.main-header{position:relative}.main-header .topbar .header-nav{display:flex;justify-content:space-between;padding:0}.main-header .topbar .header-nav .topbar-item ul li{padding-right:40px;text-transform:capitalize}.homepage{background:url(https://ui-lib.com/wp-content/uploads/2019/04/bg-1.png);background-repeat:no-repeat;background-size:contain;padding:80px 0}.homepage .main-content .logo{margin:auto;width:80px}.homepage .main-content h1{color:#1f2937;line-height:1.5}.homepage .main-content .btn-raised-primary:hover{color:#fff}.homepage .main-content .btn-raised{transition:all .15s ease-in}.homepage .main-content .btn-raised:hover{transform:translateY(-2px)}.homepage .main-content .dashboard-photo{border-radius:10px;box-shadow:0 4px 20px 1px rgba(0,0,0,.06),0 1px 4px rgba(0,0,0,.08);margin:auto;max-width:960px;overflow:hidden}.homepage .main-content .dashboard-photo img{width:100%}.features{background:#f8fafe;padding-bottom:126px;padding-top:126px}.features .section-title{margin-bottom:45px}.features .section-title h2{margin-bottom:5px}.features .section-title p{margin:0 auto;max-width:550px;opacity:.7}.features .features-wrap .feature-card{background:transparent;flex-direction:row;justify-content:space-around;margin-bottom:10px;padding:20px 0}.features .features-wrap .feature-card .card-icon{padding:15px}.features .features-wrap .feature-card .card-title{align-items:center;display:flex;flex-grow:0.5;margin:0}.features .features-wrap .feature-card .card-title h6{margin:0}.features .features-wrap .feature-card.active,.features .features-wrap .feature-card:hover{background:linear-gradient(#8470b9,#473886);cursor:pointer}.features .features-wrap .feature-card.active .card-icon,.features .features-wrap .feature-card:hover .card-icon{color:#fff;padding:15px}.features .features-wrap .feature-card.active .card-title h6,.features .features-wrap .feature-card:hover .card-title h6{color:#fff}.features .tab-panel{display:none;padding:0 20px}.features .tab-panel.active{display:block}.features .tab-panel img{width:100%}.framework{background:#f8fafe;padding-bottom:126px;padding-top:126px}.framework .section-title{padding-bottom:40px}.framework .item-photo{align-items:center;border-radius:50%;display:flex;height:180px;justify-content:center;padding:25px;width:180px}.framework .item-photo img{height:auto;width:auto}.framework .item-photo .item-photo-text{font-size:40px}.demos{padding-bottom:80px;padding-top:80px}.demos .section-title{padding-bottom:35px}.demos .demo-photo .thumbnail{display:block}.demos .demo-photo img{width:100%}.demos .demo-photo a{text-transform:capitalize}.demos .demo-photo a:hover{color:#fff}.component{padding-bottom:80px;padding-top:80px}.component .section-title{padding-bottom:50px}.component .component-list{margin-bottom:30px}.component .component-list ul .comoponent-list-heading{margin-left:15px;margin-top:2px;text-transform:capitalize}.component .component-list ul li{list-style:none;margin-left:45px;opacity:.7}.clients{background-color:#f8fafe;padding-bottom:80px;padding-top:80px}.clients .section-title{padding-bottom:50px;text-align:center}.clients .section-title h2{margin-bottom:10px}.clients .section-title p{margin:0 auto;max-width:550px}.clients .complement{margin:0 auto;max-width:900px}.clients .complement .client-card{box-shadow:0 4px 20px 1px rgba(0,0,0,.06),0 1px 4px rgba(0,0,0,.08);margin-bottom:20px;padding:10px}.clients .complement .client-card .user{margin-left:10px}.clients .complement .client-card .user .user-photo{margin-right:30px}.clients .complement .client-card .user .user-photo img{border-radius:50%;height:50px;width:50px}.clients .complement .client-card .user .user-detail{margin-top:5px}.clients .complement .client-card .user .user-detail h6{margin:0}.clients .complement .client-card .user .user-detail p{opacity:.8}.clients .complement .client-card .user-comment{margin-left:10px}.clients .complement .client-card .user-comment p{font-style:italic;max-width:800px;opacity:.7}.blog{padding-bottom:80px;padding-top:80px}.blog h2{margin:0 0 40px;max-width:890px}.blog p{max-width:890px;opacity:.7}.blog .blog-photo{margin:20px 0}.blog .blog-photo img{width:100%}.footer{background-color:#f8fafe;padding-top:80px}.footer .footer-item{margin-bottom:100px}.footer .footer-item .social-media ul li{display:inline-block;list-style:none;margin-left:10px}.footer .footer-item .social-media ul li a{background:#fff;border-radius:5px;color:#111111a8;padding:7px}.footer .footer-bootom{border-top:.2px solid #fffffffa;padding:10px 0}.footer .footer-bootom p{margin:0}.footer .btn-raised-primary:hover{color:#fff}.footer .btn-raised{transition:all .15s ease-in}.footer .btn-raised:hover{transform:translateY(-2px)}@media (max-width:960px){.dashboard .dashboard-photo{max-width:calc(100% - 80px)}.dashboard{height:350px}}@media (max-width:767px){.main-header .navbar-nav{flex-direction:row}.main-header .navbar-nav .nav-item{margin-right:8px}.main-header .topbar .header-nav{display:block}.brand{display:flex;justify-content:space-between;width:100%}.navbar-toggler{border:0 solid #fff;border-radius:.25rem;cursor:pointer;display:flex;flex-direction:column;font-size:1.25rem;justify-content:center;line-height:1;padding:5px 0}.navbar-toggler .navbar-toggler-icon{background:#1f2937}.navbar-toggler:focus,.navbar-toggler:hover{outline:none;text-decoration:none}.navbar-collapse{align-items:center;background:transparent;background-repeat:no-repeat;background-size:auto;flex-basis:100%;flex-grow:1;overflow:hidden;text-align:center;z-index:999}.navbar-toggler-icon{background:no-repeat 50%;background-size:100% 100%;background:#fff;content:"";display:inline-block;height:2px;margin-top:4px;vertical-align:middle;width:25px}.dashboard{height:250px}.features .features-wrap{display:flex;flex-direction:row;flex-wrap:wrap;justify-content:center}.features .features-wrap .feature-card{margin:5px;padding:10px}.features .features-wrap .feature-card .card-title,.features .features-wrap .feature-card .card-title h6{margin:0}.features .features-wrap .feature-card .card-icon{display:none}.framework .item-photo{margin-bottom:30px}.component .component-list{margin:0 auto}.component .component-list ul{padding:0;text-align:center}.component .component-list ul li{margin-left:30px}.component .component-list .comoponent-list-heading{margin-left:3px!important}.footer .footer-item .social-media{margin-top:18px}.footer .footer-item .social-media ul{padding:0}.footer .footer-item .social-media ul li{margin-left:0;margin-right:20px}.footer .footer-item .btn-arrow,.footer .footer-item .selling-btn{margin-top:10px}}@media (max-width:600px){.homepage{padding:80px 0}.dashboard{height:auto;padding:60px 0}.dashboard .dashboard-photo{position:unset!important}}@media only screen and (max-width:991px){.ul-landing__navbar.collapse:not(.show){display:block!important}.ul-landing__brand{max-width:80px!important}}label.ul-form__label{font-size:13px;font-weight:400;margin-bottom:5px;padding:7px 0;text-align:right}small.ul-form__text{color:#6b7280;font-weight:400;margin-top:10px}.input-right-icon{position:relative}span.span-left-input-icon{left:10px;position:absolute;top:9px}span.span-right-input-icon{position:absolute;right:10px;top:9px}i.ul-form__icon{color:#4b5563;font-size:15px;font-weight:600}.ul-form__radio-inline{display:flex}span.ul-form__radio-font{font-size:14px;font-weight:500}.footer-delete-right{float:right}.ul-card__margin-25{margin:25px 0}@media only screen and (max-width:991px){label.ul-form--margin{margin-left:20px;text-align:left}}label.action-bar-horizontal-label{font-size:15px}.ul-form__radio{position:relative}span.checkmark.ul-radio__position{left:4px;position:absolute;top:-8px}i.ul-tab__icon{font-size:14px;font-weight:500}.ul-tab__border{border:1px dashed #6b7280;margin:30px 0}.ul-tab__content{margin:0;padding-left:0}.ul-dropdown__toggle{margin:0 5px;padding:8px 25px}.tab-border{border:1px dashed #ebedf2!important;margin:30px 0!important}span._r_block-dot{display:block;margin:2px 0}._r_btn{border:1px solid #e8ecfa}._r_drop_right{padding-right:14px!important}.ul-accordion__link:hover{list-style:none}.ul-accordion__link:hover,button.ul-accordion__link{text-decoration:none!important}.ul-accordion__font{font-size:16px}.ul-cursor--pointer{cursor:pointer}.ul-border__bottom{border-bottom:1px solid #6366f1}.ul-card__v-space{border-radius:0;box-shadow:0;margin:30px 0}.ul-card__border-radius{border-radius:0;box-shadow:none}.header-elements-inline{align-items:center;display:flex;flex-wrap:nowrap;justify-content:space-between}.ul-card__list--icon-font i{font-weight:700;margin:0 2px}.accordion .ul-collapse__icon--size a:before{cursor:pointer;font-family:iconsmind;font-size:18px;font-weight:700;vertical-align:bottom}.accordion .ul-collapse__left-icon a.collapsed:before{content:"\f083";font-family:iconsmind;margin:0 8px}.accordion .ul-collapse__left-icon a:before{content:"\f072";font-family:iconsmind;margin:0 8px}.accordion .ul-collapse__right-icon a.collapsed:before{content:"\f083";float:right;font-family:iconsmind;margin:0 8px;position:absolute;right:15px}.accordion .ul-collapse__right-icon a:before{content:"\f072";float:right;font-family:iconsmind;margin:0 8px;position:absolute;right:15px}.ul-widget__item{align-items:center;border-bottom:.07rem dashed #d1d5db;display:flex;justify-content:space-between;padding:1.1rem 0}.ul-widget1__title{color:#4b5563;font-size:1.1rem;font-weight:700}.ul-widget__desc{font-size:.9rem;font-weight:400}.ul-widget__number{font-size:1.4rem;font-weight:700}.ul-widget__item:last-child{border-bottom:0}.ul-widget__head{align-items:center;border-bottom:1px solid #e5e7eb;display:flex;justify-content:space-between}.ul-widget__head.--v-margin{padding:10px 0}.ul-widget__head-title{color:#1f2937;font-size:1.2rem;font-weight:500;margin:0}.ul-widget-nav-tabs-line .nav-item .nav-link.active{border:1px solid;border-color:#fff #fff #6366f1}.ul-widget-nav-tabs-line .nav-link{font-weight:700}.ul-widget__body{margin-top:10px}.ul-widget2__item{align-items:center;display:flex;justify-content:space-between;margin-bottom:1.4rem;position:relative}.ul-widget2__info{display:flex;flex-direction:column;flex-grow:1;margin-left:10px}.ul-widget2__title{color:#4b5563;font-weight:600}.ul-widget2__username{color:#4b5563;font-size:.7rem}.ul-widget__link--font i{font-size:13px;font-weight:700;letter-spacing:2px}.ul-widget__link--font{color:#4b5563;font-size:15px;font-weight:600}.ul-pl-0{padding-left:0}.ul-checkmark{left:20px!important;position:absolute;top:-4px!important}.ul-widget2__actions{opacity:0;visibility:hidden}.ul-widget1:hover .ul-widget2__actions{opacity:1;transition:.3s;visibility:visible}.pb-20{padding-bottom:20px}.ul-widget-notification-item{align-items:center;border-bottom:1px solid #e5e7eb;display:flex;padding:10px 0;position:relative}.ul-widget-notification-item:last-child{border-bottom:none}.ul-widget-notification-item:hover{background-color:#f3f4f6}.ul-widget-notification-item-icon{padding-right:20px}.ul-widget-notification-item-title{color:#374151;font-size:1rem;font-weight:400;transition:color .3s ease}.ul-widget-notification-item-time{color:#6b7280;font-size:13px;font-weight:300}.ul-widget-notification-item:after{content:"\f07d";font-family:iconsmind;position:absolute;right:0}.ul-widget-notification-item i{font-size:27px}.ul-widget3-img img{border-radius:50%;width:3.2rem}.ul-widget3-item{border-bottom:.07rem dashed #e5e7eb;margin-bottom:1rem}.ul-widget3-item:last-child{border:none}.ul-widget3-header{align-items:center;display:flex;justify-content:space-between;padding-bottom:.8rem}span.ul-widget3-status{flex-grow:1;text-align:right}.ul-widget3-info{padding-left:10px}.ul-widget4__item{align-items:center;border-bottom:1px dashed #d1d5db;display:flex;padding:15px 0}.ul-widget4__item:last-child{border-bottom:0}.ul-widget4__pic-icon{font-size:25px;margin-right:15px}a.ul-widget4__title{color:#4b5563;font-size:15px;font-weight:700}a.ul-widget4__title:hover{color:#6366f1}.ul-widget4__img img{border-radius:5px;margin-right:15px;width:2.5rem}.ul-widget4__users{justify-content:space-between}.ul-widget2__info.ul-widget4__users-info{flex-grow:1;width:calc(100% - 135px)}span.ul-widget4__number.t-font-boldest{font-size:1.1rem}.ul-widget5__item{align-items:center;border-bottom:.07rem dashed #e5e7eb;display:flex;justify-content:space-between;margin-bottom:1.43rem;padding-bottom:1.57rem}.ul-widget5__item:last-child{border-bottom:none}.ul-widget5__content{align-items:center;display:flex}.ul-widget5__stats{display:flex;flex-direction:column;text-align:right}.ul-widget5__stats:first-child{padding-right:3rem}span.ul-widget5__number{color:#4b5563;font-size:1.3rem;font-weight:600}.ul-widget5__pic img{border-radius:4px;padding-right:1.43rem;width:8.6rem}p.ul-widget5__desc{color:#9ca3af;font-size:1rem;font-weight:400;margin:0;padding:.4rem 0}.ul-widget5__info span:nth-child(2n){font-weight:600;padding-right:.71rem}.ul-widget6__head .ul-widget6__item{align-items:center;display:flex;margin-bottom:1.07rem}.ul-widget6__head .ul-widget6__item span{color:#6b7280;flex:1;font-size:.8rem;font-weight:500;text-align:left}.ul-widget6__head .ul-widget6__item span:last-child{text-align:right}.ul-widget6__body .ul-widget6__item{align-items:center;border-bottom:.07rem dashed #e5e7eb;display:flex;padding:1.07rem 0}.ul-widget6__body .ul-widget6__item:last-child{border-bottom:none}.ul-widget6__body .ul-widget6__item span{color:#4b5563;flex:1;font-weight:400;text-align:left}.ul-widget6__body .ul-widget6__item span:last-child{text-align:right}.ul-widget6 .ul-widget6-footer{margin:0;text-align:right}.ul-widget-s5__pic img{border-radius:50%;width:4rem}.ul-widget-s5__pic{padding-right:1rem}a.ul-widget4__title.ul-widget5__title{font-size:1.1rem}.ul-widget-s5__desc{color:#4b5563;margin:0}.ul-widget-s5__item{display:flex;justify-content:space-between}.ul-widget-s5__content{align-items:center;display:flex}.ul-widget-s5__content:last-child{align-items:center;display:flex;justify-content:space-between}.ul-widget-s5__progress{flex:1;padding-right:1rem}.ul-widget-s5__stats{display:flex;justify-content:space-between;margin-bottom:.7rem}.ul-widget-s5__stats span{color:#374151;font-size:1rem;font-weight:600}.widget-badge{margin:0!important}.ul-widget-s6__items{position:relative}.ul-widget-s6__items:before{background-color:#d1d5db;content:"";display:block;height:100%;left:3px;position:absolute;top:14px;width:1px}p.ul-widget6__dot{height:8px;margin:0;position:relative;width:8px;z-index:1}.ul-widget-s6__item{display:flex;justify-content:space-between;margin:1rem 0}p.ul-widget-s6__text{flex-grow:1;margin-left:11px}span.ul-widget-s6__text{color:#4b5563;display:flex;flex-grow:1;font-weight:600;padding-left:12px}span.ul-widget-s6__time{color:#6b7280;font-size:.77rem}.ul-widget6__item--table{height:400px;overflow-y:scroll}tr.ul-widget6__tr--sticky-th th{background-color:#fff;position:sticky;top:0}.ul-widget-s7__items{display:flex}.ul-widget-s7__item-circle{margin:0 1rem}.ul-widget-s7__item-circle i{font-size:16px;font-weight:900}.ul-widget-s7{padding:15px 0;position:relative}.ul-widget-s7:before{background-color:#9ca3af;content:"";height:100%;left:72px;position:absolute;top:22px;width:1;width:.241rem}p.ul-widget7__big-dot{height:13px;margin:0;position:relative;width:13px;z-index:1}.ul-widget-s7__item-time{color:#4b5563;font-size:1.2rem;font-weight:500}.ul-widget-s7__item-time.ul-middle{align-items:center;display:flex}.ul-widget-s7__item-text{color:#4b5563;font-size:1rem}.ul-widget-s7:last-child:before{background-color:#f3f4f6}.ul-vertical-line{display:inline-block;height:100%;vertical-align:middle;width:7px}.ul-widget8__tbl-responsive{display:block;overflow-x:auto;width:100%}.ul-widget_user-card{align-items:center;display:flex}@media only screen and (max-width:425px){.ul-widget__number{font-size:1.1rem;font-weight:700}.ul-widget1__title{font-size:.9rem}.ul-widget__desc{font-size:.7rem}.ul-widget__head{flex-direction:column}.ul-widget__head-label{margin:10px 0}.ul-widget__head.v-margin{flex-direction:unset}}@media only screen and (max-width:1024px){.ul-widget2__actions{opacity:1;visibility:visible}}@media only screen and (max-width:768px){.ul-widget-s5__content:last-child{width:100%}.ul-widget-s5__item{display:block;justify-content:space-between}.ul-widget-s5__content{margin:15px 0}}@media only screen and (max-width:375px){.ul-widget5{overflow-x:auto}a.ul-widget4__title{font-size:12px;padding-right:5px}a.ul-widget4__title.ul-widget5__title,p.ul-widget-s5__desc{font-size:11px}}@media only screen and (max-width:725px){.ul-widget5__item{display:block;text-align:center!important}.ul-widget5__content{display:block;margin-bottom:15px}.ul-widget5__stats:first-child{padding-right:0}.ul-widget5__stats{text-align:center}}.ul-card__widget-chart{padding:0}.ul-widget__chart-info{padding:15px}.ul-widget__row{align-items:center;display:flex}.ul-widget__content{margin-left:30px}.ul-widget__row-v2{text-align:center;text-align:-webkit-center}.ul-widget-stat__font i{font-size:35px}.ul-widget__content-v4{text-align:center}.ul-widget-card__info{display:flex;justify-content:space-between}.ul-widget-card__info span p:first-child{font-size:20px;font-weight:500;margin-bottom:2px}.ul-widget-card__info span p:last-child{font-size:17px;margin:0}.ul-widget-card__progress-rate{display:flex;justify-content:space-between;margin-bottom:5px;margin-top:12px}.ul-widget-card__progress-rate span{font-weight:700}.ul-widget-card__progress-rate span:last-child{color:#9ca3af;font-weight:700}.progress--height{height:10px}.ul-widget-card__user-info{text-align:center}.ul-widget-card--line{border-bottom:1px solid #d1d5db;padding-bottom:20px}.ul-widget-card--line:last-child{border-bottom:none}.ul-widget-card__rate-icon{display:flex;justify-content:space-between;margin:15px 0}.ul-widget-card__rate-icon.--version-2{justify-content:flex-start}.ul-widget-card__rate-icon.--version-2 span{margin-right:18px}.ul-widget-card__rate-icon span i{font-size:14px}.ul-widget-card__rate-icon span{font-size:15px}.ul-widget-card__rate-icon span i{font-size:16px;font-weight:600;margin-right:2px}.ul-widget-card__full-status{display:flex;justify-content:space-between}.ul-widget-card__status1{display:grid;text-align:-webkit-center;text-align:center}.ul-widget-card__status1 span:first-child{font-size:1.25rem;font-weight:600}.ul-widget6__dot.ul-widget-card__dot-xl{padding:1.35rem}.ul-widget-s6__badge .ul-widget-card__dot{position:relative}.ul-widget6__dot.ul-widget-card__dot-xl i{content:"";left:35%;position:absolute;top:35%}.ul-widget-s6__items.ul-widget-card__position:before{left:20px;top:0}.ul-widget-card__item{align-items:center;display:flex;padding:20px 0}.ul-widget-card__info-v2{display:grid;margin-left:20px}.ul-widget-card__img-bg{background-repeat:no-repeat,repeat;background-size:cover;height:500px}.ul-widget-card__cloud .ul-widget-card__head h1{color:#fff}.ul-widget-card__cloud .ul-widget-card__head i{color:#fff!important}.ul-widget-card__head{align-items:center;display:flex;justify-content:space-around;margin:60px 0}.ul-widget-card__weather-info{align-items:center;display:flex;font-size:20px;justify-content:space-between;margin:45px 0}.ul-b4__box{background-color:#9ca3af;display:inline-block;height:5rem;margin:0 5px;width:5rem}.ul-b4__border{border:1px solid #6366f1}.ul-b4__border-top{border-top:1px solid #6366f1}.ul-b4__border-right{border-right:1px solid #6366f1}.ul-b4__border-bottom{border-bottom:1px solid #6366f1}.ul-b4__border-left{border-left:1px solid #6366f1}.ul-b4-utilities__code pre{font-size:15px;margin:0;padding:0}.ul-b4-utilities__code{background-color:#e5e7eb;padding:25px 10px}.ul-b4__border-0{border:none}.ul-b4__border-top-0{border:1px solid #6366f1;border-top:none}.ul-b4__border-right-0{border:1px solid #6366f1;border-right:none}.ul-b4__border-bottom-0{border:1px solid #6366f1;border-bottom:none}.ul-b4__border-left-0{border:1px solid #6366f1;border-left:none}.ul-b4-display__info-1{margin-bottom:60px}.ul-b4-display__info-1 p{color:#4b5563;font-size:14px}.ul-b4-display__table{margin-top:20px}.ul-b4-display__table tr th{font-size:17px}.ul-b4-display__table tr td{font-size:14px}.ul-display__print ul li code{font-size:15px}.ul-display__margin{margin:40px 0}.ul-display__paragraph{font-size:14px}.ul-weather-card__img-overlay{background-position-y:center;background-repeat:no-repeat;background-size:cover;height:400px}.display-4{font-size:3.5rem}.ul-weather-card__weather-time{padding:30px}.ul-weather-card__img-overlay span{font-size:20px}.display-5{font-size:2.5rem!important}.ul-weather-card__weather-info i{font-size:25px;font-weight:600}.ul-weather-card__weather-info{margin:20px 0}.ul-weather-card__font-md{font-size:20px;font-weight:600}.ul-weather-card__header{align-items:center;display:flex}.ul-weather-card__header span{color:#fff;font-size:18px}.ul-weather-card__calendar,.ul-weather-card__calendar-2{align-items:center;display:flex;justify-content:space-between}.ul-weather-card__both-group{padding:25px}.ul-weather-card__inner-card{width:100%}.ul-weather-card__info{display:flex;font-size:16px;justify-content:space-between}.card .ul-weather-card__bg-img img{height:300px;width:100%}.ul-weather-card__img-overlay-2{bottom:0;left:0;padding:1.25rem;position:absolute;right:0;top:0}.ul-weather-card__img-overlay-2 span{color:#fff}.font-25{font-size:25px}.ul-weather-card__footer-color{color:#6366f1;font-weight:600}.ul-weather-card__footer-color-2{color:#ec4899}.ul-weather-card__grid-style{display:grid}.ul-weather-card__weather-s-title{font-size:1rem}.ul-weather-card__footer-color-3 h4,.ul-weather-card__footer-color-3 h5{color:#14b8a6}.ul-widget-app__row-comments{align-items:center;display:flex;margin-bottom:10px;padding:14px}.ul-widget-app__row-comments:hover{background-color:#e5e7eb}.ul-widget-app__row-comments:hover .ul-widget-app__icons a i{opacity:1;visibility:visible}.ul-widget-app__icons a i:hover{color:#8b5cf6}.ul-widget-app__roundbg-icon{border-radius:50%!important;height:40px;line-height:40px;min-width:40px;padding:0!important;text-align:center}.ul-widget-app__comment{width:calc(100% - 86px)}.ul-widget-app__profile-status{align-items:center;display:flex;justify-content:space-between}.ul-widget-app__icons{flex-grow:1;font-size:17px}.ul-widget-app__icons a i{font-weight:600;margin:0 3px;opacity:0;vertical-align:middle;visibility:hidden}.ul-widget-app__recent-messages{cursor:pointer;height:calc(100vh - 350px);overflow-y:scroll}.ul-widget-app__skill-margin span{margin:0 5px}.ul-widget-app__profile-footer{align-items:center;display:flex;justify-content:space-around}.ul-widget-app__profile-footer-font a i,.ul-widget-app__profile-footer-font a span{vertical-align:middle}.notification_widget .ul-widget-app__browser-list-1,.ul-widget-app__browser-list-1{align-items:center;display:flex;justify-content:space-between}.notification_widget .ul-widget-app__browser-list-1{cursor:pointer}.notification_widget .ul-widget-app__browser-list-1:hover{background:#eee}.ul-widget-app__browser-list-1 span{flex-grow:1}.ul-widget-app__browser-list-1 span:last-child{flex-grow:0}span.ul-widget-app__find-font{bottom:0;color:#8b5cf6;font-size:20px;position:absolute;right:10px;top:4px}.ul-widget-app__small-title{display:grid}.user-profile.ul-widget-app__profile--position{left:0;margin:0 auto;position:absolute;right:0;top:40%;transform:translateY(-50%)}.timeline--align{bottom:8px}.ul-product-detail__features ul li{list-style:none;margin:8px 0}.ul-counter-cart .btn-group{align-items:center;display:flex}.ul-counter-cart .btn-group .btn{background-color:transparent;border:0;margin:0 14px;padding:0!important}ul.gull-pagination li{margin:0 12px}ul.gull-pagination li .page-link{border-color:#fff!important;border-radius:50%!important}.page-link:hover{background-color:#fff}.page-link:focus{box-shadow:0 0 0 .2rem #fff}.page-item.disabled .page-link{color:#d5d0d9}html{font-size:16px}body{background:#fff;letter-spacing:.3px;line-height:1.6;overflow-x:hidden;overflow-y:scroll}[tabindex="-1"]:focus{outline:none}hr{border:0;border-top:1px solid rgba(0,0,0,.1);height:0;margin-bottom:2rem;margin-top:2rem}button,input,select,textarea{vertical-align:baseline}div{box-sizing:border-box}body[dir=ltr],body[dir=rtl],html[dir=ltr],html[dir=rtl]{unicode-bidi:embed}bdo[dir=rtl]{direction:rtl}bdo[dir=ltr],bdo[dir=rtl]{unicode-bidi:bidi-override}bdo[dir=ltr]{direction:ltr}img{max-width:100%}a,a:focus,a:hover{text-decoration:none}blockquote{border-left:2px solid #e5e7eb;font-size:1.01625rem;margin-bottom:1rem;padding-left:1rem}.close:not(:disabled):not(.disabled):focus,.close:not(:disabled):not(.disabled):hover{outline:none}.o-hidden{overflow:hidden}.separator-breadcrumb{margin-bottom:2rem}.line-height-1{line-height:1}.line-height-2{line-height:2}.line-height-3{line-height:3}.line-height-4{line-height:4}.line-height-5{line-height:5}.app-inro-circle{left:0;margin:auto;position:absolute;right:0;text-align:center;top:calc(50% - 150px)}.app-inro-circle .big-bubble{align-items:center;background:#ff630f;display:flex;height:280px;justify-content:center;margin:0 auto 20px;text-align:center;width:280px}.app-inro-circle .big-bubble i{color:#fff;font-size:108px}.loadscreen{background:#fff;height:100vh;left:0;margin:auto;position:fixed;right:0;text-align:center;top:0;width:100%;z-index:999}.loadscreen .loader{left:0;margin:auto;position:absolute;right:0;top:calc(50vh - 50px)}.loadscreen .logo{display:inline-block!important;height:80px;width:80px}.img-preview{background-color:#e5e7eb;float:left;margin-bottom:10px;margin-right:10px;overflow:hidden;text-align:center;width:100%}.preview-lg{height:150px;width:200px}.preview-md{height:120px;width:150px}.preview-sm{height:75px;width:100px}.custom-select{appearance:none;-webkit-appearance:none;-moz-appearance:none}.header-cover{background:url(/images/photo-wide-5.jpeg?6c1e776a6d7279764999a21fcb444563)}.back_important{background:#f3f4f6!important}.nav-item-module{padding:26px 0 42px!important}.addon_triangle{border-color:transparent transparent #e11239;border-style:solid;border-width:0 0 35px 100px;bottom:0;height:0;position:absolute;right:0;width:0}.addon_triangle span{color:#fff;font-size:14px;font-weight:700;position:absolute;right:5px;top:15px}.loading_page{height:80px;left:calc(50% - 50px);margin-top:5%;width:80px}.spinner.sm{height:2em;width:2em}.row_deleted{background-color:#ef44443d}.change_amount{color:#ef4444;font-size:.9rem;margin-left:10px}#nprogress .bar{background:#ff630f}#nprogress .spinner-icon{border-left-color:#ff630f;border-top-color:#ff630f}#nprogress .spinner{display:block;height:auto;position:fixed;right:15px;top:15px;width:auto;z-index:1031}#nprogress .spinner,#nprogress .spinner:after{background:transparent}@media (max-width:576px){.app-inro-circle .big-bubble{height:220px;width:220px}button.close{color:#000;float:right;font-size:1.2195rem;font-weight:700;line-height:1;opacity:.5;position:absolute;right:5px;text-shadow:0 1px 0 #fff;top:0}}@media (max-width:764px){.vgt-global-search.vgt-clearfix{display:flex;flex-direction:column}}[dir=rtl] .rtl-ps-none .ps__rail-x,[dir=rtl] .rtl-ps-none .ps__rail-y{display:none}.dark-theme{background:#292929}.dark-theme .text-muted{color:#d8d8d8!important}.dark-theme .card,.dark-theme .main-header,.dark-theme .sidebar-left,.dark-theme .sidebar-left-secondary{background:#292929;color:#d8d8d8!important}.dark-theme .border-bottom{border-bottom:1px solid #202020!important}.dark-theme .main-content-wrap{background-color:#202020;color:#d8d8d8!important}.dark-theme .card-title,.dark-theme .text-title,.dark-theme h1,.dark-theme h2,.dark-theme h3,.dark-theme h4,.dark-theme h5,.dark-theme h6{color:#d8d8d8}.dark-theme .card-title,.dark-theme a{color:#d8d8d8!important}.dark-theme input,.dark-theme textarea{background:#202020!important;border-color:#292929;color:#d8d8d8!important}.dark-theme .app-footer{background:#292929}.dark-theme .navigation-left .nav-item{border-bottom:1px solid #202020!important;color:#d8d8d8!important}.dark-theme .navigation-left .nav-item .nav-item-hold,.dark-theme .navigation-left .nav-item .nav-item-hold a{color:#d8d8d8!important}.dark-theme .sidebar-left-secondary .childNav li.nav-item{display:block}.dark-theme .sidebar-left-secondary .childNav li.nav-item a{color:#d8d8d8}.dark-theme .sidebar-left-secondary .childNav li.nav-item a:hover{background:#202020}.dark-theme .sidebar-left-secondary .childNav li.nav-item a.open,.dark-theme .sidebar-left-secondary .childNav li.nav-item a.router-link-active,.dark-theme .sidebar-left-secondary .childNav li.nav-item a.router-link-active .nav-icon{color:#ff630f}.dark-theme .sidebar-left-secondary .childNav li.nav-item a .nav-icon{color:#d8d8d8}.dark-theme .search-ui{background:#202020;position:fixed}.dark-theme .search-ui input.search-input{background:#202020}.dark-theme .search-ui input.search-input::-moz-placeholder{color:#d8d8d8}.dark-theme .search-ui input.search-input::placeholder{color:#d8d8d8}.dark-theme .search-bar{background:#292929!important;border:1px solid #202020!important}.dark-theme .search-bar input{background:#292929!important;color:#d8d8d8!important}.dark-theme .border-top{border-top:1px solid #292929!important}.dark-theme .tab-border{border:1px dashed #202020!important}.dark-theme table.vgt-table{background:#292929}.dark-theme .vgt-table thead th{color:#d8d8d8!important}.dark-theme table.tableOne.vgt-table thead tr th{background:#292929;border-color:#202020}.dark-theme .list-group-item{background-color:#292929;border:1px solid #202020}.dark-theme .page-link{background-color:#202020;border:1px solid #292929;color:#d8d8d8}.dark-theme .dropdown-menu{background-color:#202020;border:1px solid #202020;color:#d8d8d8}.dark-theme .table td{border-top:1px solid #202020}.dark-theme .table thead th{border-bottom:2px solid #202020}.dark-theme .table .thead-light th{background-color:#202020;border-color:#202020;color:#d8d8d8}.dark-theme .apexcharts-xaxis-label,.dark-theme .apexcharts-yaxis-label{fill:#d8d8d8}.dark-theme .apexcharts-tooltip.light{background:#202020;border:1px solid #292929}.dark-theme .apexcharts-tooltip.light .apexcharts-tooltip-title{background:#292929;border-bottom:1px solid #292929}.dark-theme .apexcharts-legend-text{color:#d8d8d8!important}.dark-theme .custom-select,.dark-theme .input-group-text{background-color:#202020;border:1px solid #202020;color:#d8d8d8}.dark-theme .header-icon:hover{background:#202020!important}.dark-theme .calendar-parent{background-color:#292929}.dark-theme .cv-day,.dark-theme .cv-event,.dark-theme .cv-header-day,.dark-theme .cv-header-days,.dark-theme .cv-week,.dark-theme .cv-weeks{border-color:#202020;border-style:solid}.dark-theme .theme-default .cv-day.outsideOfMonth,.dark-theme .theme-default .cv-day.past{background-color:#292929}.dark-theme .theme-default .cv-day.today,.dark-theme .theme-default .cv-header,.dark-theme .theme-default .cv-header-day{background-color:#202020}.dark-theme .cv-header,.dark-theme .cv-header button{background:#202020;border-color:#292929;border-style:solid}.dark-theme .vgt-global-search.vgt-clearfix,.dark-theme div.vgt-wrap__footer.vgt-clearfix,.dark-theme table.tableOne tbody tr th.line-numbers{background:#292929}.dark-theme table.vgt-table td{border-bottom:1px solid #202020;color:#d8d8d8}.dark-theme table.tableOne tbody tr th.vgt-checkbox-col{background:#292929}.dark-theme th.line-numbers,.dark-theme th.vgt-checkbox-col{border-bottom:1px solid #292929}.dark-theme .ul-widget__item{border-bottom:.07rem dashed #202020}.dark-theme .order-table.vgt-table tbody tr:hover{background:#202020;border-radius:10px}.dark-theme .page-item.disabled .page-link{background-color:#292929;border-color:#292929}.dark-theme ul.gull-pagination li .page-link{border-color:#292929!important}.dark-theme ul.gull-pagination li .page-link:hover{background:#292929}.dark-theme .layout-sidebar-compact .sidebar-left{background:#202020}.dark-theme .layout-sidebar-compact .sidebar-left-secondary .childNav li.nav-item a.open{background:#202020;color:#ff630f}.dark-theme .layout-sidebar-compact .sidebar-left-secondary .childNav li.nav-item a.open .nav-icon{color:#ff630f}.dark-theme .layout-sidebar-compact .sidebar-left-secondary .childNav li.nav-item a .nav-icon{color:#d8d8d8}.dark-theme .chat-sidebar-container{height:calc(100vh - 140px);min-height:unset}.dark-theme .chat-sidebar-container .chat-topbar{height:52px}.dark-theme .chat-sidebar-container .chat-content-wrap .chat-content .message{background:#202020}.dark-theme .chat-sidebar-container .chat-content-wrap .chat-content .message:before{border-color:transparent transparent #202020}.dark-theme .chat-sidebar-container .chat-sidebar-wrap .contacts-scrollable .contact{cursor:pointer;position:relative;transition:all .15s ease-in}.dark-theme .chat-sidebar-container .chat-sidebar-wrap .contacts-scrollable .contact:hover{background:#202020}.dark-theme .chat-sidebar-container .chat-sidebar-wrap .contacts-scrollable .contact:before{background:#292929;border-radius:50%}.dark-theme .chat-sidebar-container .chat-sidebar-wrap .contacts-scrollable .contact.online:before{background:#10b981}.dark-theme .layout-sidebar-vertical .sidebar-panel{background:#292929;box-shadow:0 1px 15px #202020,0 1px 6px #202020}.dark-theme .layout-sidebar-vertical .main-content-wrap .main-header{background:#292929!important}.dark-theme .layout-sidebar-vertical-two .sidebar-panel{background:#292929;box-shadow:0 1px 15px #202020,0 1px 6px #202020}.dark-theme .layout-sidebar-vertical-two .main-content-wrap .main-header{background:#292929!important}.dark-theme .layout-horizontal-bar .header-topnav{background:#292929;box-shadow:0 1px 15px transparent,0 1px 6px transparent}.dark-theme .layout-horizontal-bar .header-topnav .topnav a{color:#d8d8d8!important}.dark-theme .layout-horizontal-bar .header-topnav .topnav ul ul{background:#292929;color:#d8d8d8}.dark-theme .layout-horizontal-bar .header-topnav .topnav ul li ul li:hover,.dark-theme .main-header .show .header-icon{background:#202020}.dark-theme .main-header .notification-dropdown{color:#d8d8d8}.dark-theme .main-header .notification-dropdown .dropdown-item{border-bottom:1px solid #292929;color:#d8d8d8}.dark-theme .main-header .notification-dropdown .notification-icon{background:#292929!important}.dark-theme .dropdown-item:focus,.dark-theme .dropdown-item:hover{background-color:#292929;color:#d8d8d8;text-decoration:none}.dark-theme .subheader{position:fixed;top:80px;width:100%;z-index:50}.dark-theme .subheader,.dark-theme .subheader .subheader-navbar{background-color:#292929}@media (max-width:577px){.dark-theme .subheader{top:70px}}.dark-theme .vnb{background-color:#292929}.dark-theme .vnb .tippy-box{background-color:#292929!important;box-shadow:0 .5rem 1rem rgba(0,0,0,.15)!important}.dark-theme .vnb__menu-options__option__link{color:#d8d8d8}.dark-theme .vnb__menu-options__option__link .vnb__menu-options__option__arrow{fill:#d8d8d8}.dark-theme .vnb__menu-options__option__link:focus{border:1px;outline:none}.dark-theme .vnb__menu-options__option__link:hover{color:#d8d8d8}.dark-theme .vnb__menu-options__option__link:hover .vnb__menu-options__option__arrow{fill:#d8d8d8}.dark-theme .vnb__menu-options__option__link__icon svg{fill:#ff630f!important}.dark-theme .vnb__sub-menu-options{background-color:#292929}.dark-theme .vnb__sub-menu-options__option__link{border-left:2px solid #8b5cf6;color:#d8d8d8}.dark-theme .vnb__sub-menu-options__option__link:focus{border:1px;outline:none}.dark-theme .vnb__sub-menu-options__option__link:hover{background-color:#8b5cf6;color:#d8d8d8!important}.dark-theme .vnb__popup{height:80vh!important;overflow-x:hidden!important;overflow-y:scroll!important}.dark-theme .vnb__popup .vnb__popup__top__close-button{right:-33px;top:20px}.dark-theme .vnb__popup .vnb__popup__top__close-button:focus{border:1px;outline:none}.dark-theme .vnb__popup .vnb__popup__top__close-button svg{fill:#000!important}</style><style>.swal2-popup.swal2-toast{flex-direction:row;align-items:center;width:auto;padding:.625em;overflow-y:hidden;background:#fff;box-shadow:0 0 .625em #d9d9d9}.swal2-popup.swal2-toast .swal2-header{flex-direction:row;padding:0}.swal2-popup.swal2-toast .swal2-title{flex-grow:1;justify-content:flex-start;margin:0 .6em;font-size:1em}.swal2-popup.swal2-toast .swal2-footer{margin:.5em 0 0;padding:.5em 0 0;font-size:.8em}.swal2-popup.swal2-toast .swal2-close{position:static;width:.8em;height:.8em;line-height:.8}.swal2-popup.swal2-toast .swal2-content{justify-content:flex-start;padding:0;font-size:1em}.swal2-popup.swal2-toast .swal2-icon{width:2em;min-width:2em;height:2em;margin:0}.swal2-popup.swal2-toast .swal2-icon .swal2-icon-content{display:flex;align-items:center;font-size:1.8em;font-weight:700}@media all and (-ms-high-contrast:none),(-ms-high-contrast:active){.swal2-popup.swal2-toast .swal2-icon .swal2-icon-content{font-size:.25em}}.swal2-popup.swal2-toast .swal2-icon.swal2-success .swal2-success-ring{width:2em;height:2em}.swal2-popup.swal2-toast .swal2-icon.swal2-error [class^=swal2-x-mark-line]{top:.875em;width:1.375em}.swal2-popup.swal2-toast .swal2-icon.swal2-error [class^=swal2-x-mark-line][class$=left]{left:.3125em}.swal2-popup.swal2-toast .swal2-icon.swal2-error [class^=swal2-x-mark-line][class$=right]{right:.3125em}.swal2-popup.swal2-toast .swal2-actions{flex-basis:auto!important;width:auto;height:auto;margin:0 .3125em}.swal2-popup.swal2-toast .swal2-styled{margin:0 .3125em;padding:.3125em .625em;font-size:1em}.swal2-popup.swal2-toast .swal2-styled:focus{box-shadow:0 0 0 1px #fff,0 0 0 3px rgba(50,100,150,.4)}.swal2-popup.swal2-toast .swal2-success{border-color:#a5dc86}.swal2-popup.swal2-toast .swal2-success [class^=swal2-success-circular-line]{position:absolute;width:1.6em;height:3em;transform:rotate(45deg);border-radius:50%}.swal2-popup.swal2-toast .swal2-success [class^=swal2-success-circular-line][class$=left]{top:-.8em;left:-.5em;transform:rotate(-45deg);transform-origin:2em 2em;border-radius:4em 0 0 4em}.swal2-popup.swal2-toast .swal2-success [class^=swal2-success-circular-line][class$=right]{top:-.25em;left:.9375em;transform-origin:0 1.5em;border-radius:0 4em 4em 0}.swal2-popup.swal2-toast .swal2-success .swal2-success-ring{width:2em;height:2em}.swal2-popup.swal2-toast .swal2-success .swal2-success-fix{top:0;left:.4375em;width:.4375em;height:2.6875em}.swal2-popup.swal2-toast .swal2-success [class^=swal2-success-line]{height:.3125em}.swal2-popup.swal2-toast .swal2-success [class^=swal2-success-line][class$=tip]{top:1.125em;left:.1875em;width:.75em}.swal2-popup.swal2-toast .swal2-success [class^=swal2-success-line][class$=long]{top:.9375em;right:.1875em;width:1.375em}.swal2-popup.swal2-toast .swal2-success.swal2-icon-show .swal2-success-line-tip{-webkit-animation:swal2-toast-animate-success-line-tip .75s;animation:swal2-toast-animate-success-line-tip .75s}.swal2-popup.swal2-toast .swal2-success.swal2-icon-show .swal2-success-line-long{-webkit-animation:swal2-toast-animate-success-line-long .75s;animation:swal2-toast-animate-success-line-long .75s}.swal2-popup.swal2-toast.swal2-show{-webkit-animation:swal2-toast-show .5s;animation:swal2-toast-show .5s}.swal2-popup.swal2-toast.swal2-hide{-webkit-animation:swal2-toast-hide .1s forwards;animation:swal2-toast-hide .1s forwards}.swal2-container{display:flex;position:fixed;z-index:1060;top:0;right:0;bottom:0;left:0;flex-direction:row;align-items:center;justify-content:center;padding:.625em;overflow-x:hidden;transition:background-color .1s;-webkit-overflow-scrolling:touch}.swal2-container.swal2-backdrop-show,.swal2-container.swal2-noanimation{background:rgba(0,0,0,.4)}.swal2-container.swal2-backdrop-hide{background:0 0!important}.swal2-container.swal2-top{align-items:flex-start}.swal2-container.swal2-top-left,.swal2-container.swal2-top-start{align-items:flex-start;justify-content:flex-start}.swal2-container.swal2-top-end,.swal2-container.swal2-top-right{align-items:flex-start;justify-content:flex-end}.swal2-container.swal2-center{align-items:center}.swal2-container.swal2-center-left,.swal2-container.swal2-center-start{align-items:center;justify-content:flex-start}.swal2-container.swal2-center-end,.swal2-container.swal2-center-right{align-items:center;justify-content:flex-end}.swal2-container.swal2-bottom{align-items:flex-end}.swal2-container.swal2-bottom-left,.swal2-container.swal2-bottom-start{align-items:flex-end;justify-content:flex-start}.swal2-container.swal2-bottom-end,.swal2-container.swal2-bottom-right{align-items:flex-end;justify-content:flex-end}.swal2-container.swal2-bottom-end>:first-child,.swal2-container.swal2-bottom-left>:first-child,.swal2-container.swal2-bottom-right>:first-child,.swal2-container.swal2-bottom-start>:first-child,.swal2-container.swal2-bottom>:first-child{margin-top:auto}.swal2-container.swal2-grow-fullscreen>.swal2-modal{display:flex!important;flex:1;align-self:stretch;justify-content:center}.swal2-container.swal2-grow-row>.swal2-modal{display:flex!important;flex:1;align-content:center;justify-content:center}.swal2-container.swal2-grow-column{flex:1;flex-direction:column}.swal2-container.swal2-grow-column.swal2-bottom,.swal2-container.swal2-grow-column.swal2-center,.swal2-container.swal2-grow-column.swal2-top{align-items:center}.swal2-container.swal2-grow-column.swal2-bottom-left,.swal2-container.swal2-grow-column.swal2-bottom-start,.swal2-container.swal2-grow-column.swal2-center-left,.swal2-container.swal2-grow-column.swal2-center-start,.swal2-container.swal2-grow-column.swal2-top-left,.swal2-container.swal2-grow-column.swal2-top-start{align-items:flex-start}.swal2-container.swal2-grow-column.swal2-bottom-end,.swal2-container.swal2-grow-column.swal2-bottom-right,.swal2-container.swal2-grow-column.swal2-center-end,.swal2-container.swal2-grow-column.swal2-center-right,.swal2-container.swal2-grow-column.swal2-top-end,.swal2-container.swal2-grow-column.swal2-top-right{align-items:flex-end}.swal2-container.swal2-grow-column>.swal2-modal{display:flex!important;flex:1;align-content:center;justify-content:center}.swal2-container.swal2-no-transition{transition:none!important}.swal2-container:not(.swal2-top):not(.swal2-top-start):not(.swal2-top-end):not(.swal2-top-left):not(.swal2-top-right):not(.swal2-center-start):not(.swal2-center-end):not(.swal2-center-left):not(.swal2-center-right):not(.swal2-bottom):not(.swal2-bottom-start):not(.swal2-bottom-end):not(.swal2-bottom-left):not(.swal2-bottom-right):not(.swal2-grow-fullscreen)>.swal2-modal{margin:auto}@media all and (-ms-high-contrast:none),(-ms-high-contrast:active){.swal2-container .swal2-modal{margin:0!important}}.swal2-popup{display:none;position:relative;box-sizing:border-box;flex-direction:column;justify-content:center;width:32em;max-width:100%;padding:1.25em;border:none;border-radius:.3125em;background:#fff;font-family:inherit;font-size:1rem}.swal2-popup:focus{outline:0}.swal2-popup.swal2-loading{overflow-y:hidden}.swal2-header{display:flex;flex-direction:column;align-items:center;padding:0 1.8em}.swal2-title{position:relative;max-width:100%;margin:0 0 .4em;padding:0;color:#595959;font-size:1.875em;font-weight:600;text-align:center;text-transform:none;word-wrap:break-word}.swal2-actions{display:flex;z-index:1;flex-wrap:wrap;align-items:center;justify-content:center;width:100%;margin:1.25em auto 0}.swal2-actions:not(.swal2-loading) .swal2-styled[disabled]{opacity:.4}.swal2-actions:not(.swal2-loading) .swal2-styled:hover{background-image:linear-gradient(rgba(0,0,0,.1),rgba(0,0,0,.1))}.swal2-actions:not(.swal2-loading) .swal2-styled:active{background-image:linear-gradient(rgba(0,0,0,.2),rgba(0,0,0,.2))}.swal2-actions.swal2-loading .swal2-styled.swal2-confirm{box-sizing:border-box;width:2.5em;height:2.5em;margin:.46875em;padding:0;-webkit-animation:swal2-rotate-loading 1.5s linear 0s infinite normal;animation:swal2-rotate-loading 1.5s linear 0s infinite normal;border:.25em solid transparent;border-radius:100%;border-color:transparent;background-color:transparent!important;color:transparent!important;cursor:default;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none}.swal2-actions.swal2-loading .swal2-styled.swal2-cancel{margin-right:30px;margin-left:30px}.swal2-actions.swal2-loading :not(.swal2-styled).swal2-confirm::after{content:"";display:inline-block;width:15px;height:15px;margin-left:5px;-webkit-animation:swal2-rotate-loading 1.5s linear 0s infinite normal;animation:swal2-rotate-loading 1.5s linear 0s infinite normal;border:3px solid #999;border-radius:50%;border-right-color:transparent;box-shadow:1px 1px 1px #fff}.swal2-styled{margin:.3125em;padding:.625em 2em;box-shadow:none;font-weight:500}.swal2-styled:not([disabled]){cursor:pointer}.swal2-styled.swal2-confirm{border:0;border-radius:.25em;background:initial;background-color:#3085d6;color:#fff;font-size:1.0625em}.swal2-styled.swal2-cancel{border:0;border-radius:.25em;background:initial;background-color:#aaa;color:#fff;font-size:1.0625em}.swal2-styled:focus{outline:0;box-shadow:0 0 0 1px #fff,0 0 0 3px rgba(50,100,150,.4)}.swal2-styled::-moz-focus-inner{border:0}.swal2-footer{justify-content:center;margin:1.25em 0 0;padding:1em 0 0;border-top:1px solid #eee;color:#545454;font-size:1em}.swal2-timer-progress-bar-container{position:absolute;right:0;bottom:0;left:0;height:.25em;overflow:hidden;border-bottom-right-radius:.3125em;border-bottom-left-radius:.3125em}.swal2-timer-progress-bar{width:100%;height:.25em;background:rgba(0,0,0,.2)}.swal2-image{max-width:100%;margin:1.25em auto}.swal2-close{position:absolute;z-index:2;top:0;right:0;align-items:center;justify-content:center;width:1.2em;height:1.2em;padding:0;overflow:hidden;transition:color .1s ease-out;border:none;border-radius:0;background:0 0;color:#ccc;font-family:serif;font-size:2.5em;line-height:1.2;cursor:pointer}.swal2-close:hover{transform:none;background:0 0;color:#f27474}.swal2-close::-moz-focus-inner{border:0}.swal2-content{z-index:1;justify-content:center;margin:0;padding:0 1.6em;color:#545454;font-size:1.125em;font-weight:400;line-height:normal;text-align:center;word-wrap:break-word}.swal2-checkbox,.swal2-file,.swal2-input,.swal2-radio,.swal2-select,.swal2-textarea{margin:1em auto}.swal2-file,.swal2-input,.swal2-textarea{box-sizing:border-box;width:100%;transition:border-color .3s,box-shadow .3s;border:1px solid #d9d9d9;border-radius:.1875em;background:inherit;box-shadow:inset 0 1px 1px rgba(0,0,0,.06);color:inherit;font-size:1.125em}.swal2-file.swal2-inputerror,.swal2-input.swal2-inputerror,.swal2-textarea.swal2-inputerror{border-color:#f27474!important;box-shadow:0 0 2px #f27474!important}.swal2-file:focus,.swal2-input:focus,.swal2-textarea:focus{border:1px solid #b4dbed;outline:0;box-shadow:0 0 3px #c4e6f5}.swal2-file::-moz-placeholder,.swal2-input::-moz-placeholder,.swal2-textarea::-moz-placeholder{color:#ccc}.swal2-file:-ms-input-placeholder,.swal2-input:-ms-input-placeholder,.swal2-textarea:-ms-input-placeholder{color:#ccc}.swal2-file::-ms-input-placeholder,.swal2-input::-ms-input-placeholder,.swal2-textarea::-ms-input-placeholder{color:#ccc}.swal2-file::placeholder,.swal2-input::placeholder,.swal2-textarea::placeholder{color:#ccc}.swal2-range{margin:1em auto;background:#fff}.swal2-range input{width:80%}.swal2-range output{width:20%;color:inherit;font-weight:600;text-align:center}.swal2-range input,.swal2-range output{height:2.625em;padding:0;font-size:1.125em;line-height:2.625em}.swal2-input{height:2.625em;padding:0 .75em}.swal2-input[type=number]{max-width:10em}.swal2-file{background:inherit;font-size:1.125em}.swal2-textarea{height:6.75em;padding:.75em}.swal2-select{min-width:50%;max-width:100%;padding:.375em .625em;background:inherit;color:inherit;font-size:1.125em}.swal2-checkbox,.swal2-radio{align-items:center;justify-content:center;background:#fff;color:inherit}.swal2-checkbox label,.swal2-radio label{margin:0 .6em;font-size:1.125em}.swal2-checkbox input,.swal2-radio input{margin:0 .4em}.swal2-validation-message{display:none;align-items:center;justify-content:center;padding:.625em;overflow:hidden;background:#f0f0f0;color:#666;font-size:1em;font-weight:300}.swal2-validation-message::before{content:"!";display:inline-block;width:1.5em;min-width:1.5em;height:1.5em;margin:0 .625em;border-radius:50%;background-color:#f27474;color:#fff;font-weight:600;line-height:1.5em;text-align:center}.swal2-icon{position:relative;box-sizing:content-box;justify-content:center;width:5em;height:5em;margin:1.25em auto 1.875em;border:.25em solid transparent;border-radius:50%;font-family:inherit;line-height:5em;cursor:default;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none}.swal2-icon .swal2-icon-content{display:flex;align-items:center;font-size:3.75em}.swal2-icon.swal2-error{border-color:#f27474;color:#f27474}.swal2-icon.swal2-error .swal2-x-mark{position:relative;flex-grow:1}.swal2-icon.swal2-error [class^=swal2-x-mark-line]{display:block;position:absolute;top:2.3125em;width:2.9375em;height:.3125em;border-radius:.125em;background-color:#f27474}.swal2-icon.swal2-error [class^=swal2-x-mark-line][class$=left]{left:1.0625em;transform:rotate(45deg)}.swal2-icon.swal2-error [class^=swal2-x-mark-line][class$=right]{right:1em;transform:rotate(-45deg)}.swal2-icon.swal2-error.swal2-icon-show{-webkit-animation:swal2-animate-error-icon .5s;animation:swal2-animate-error-icon .5s}.swal2-icon.swal2-error.swal2-icon-show .swal2-x-mark{-webkit-animation:swal2-animate-error-x-mark .5s;animation:swal2-animate-error-x-mark .5s}.swal2-icon.swal2-warning{border-color:#facea8;color:#f8bb86}.swal2-icon.swal2-info{border-color:#9de0f6;color:#3fc3ee}.swal2-icon.swal2-question{border-color:#c9dae1;color:#87adbd}.swal2-icon.swal2-success{border-color:#a5dc86;color:#a5dc86}.swal2-icon.swal2-success [class^=swal2-success-circular-line]{position:absolute;width:3.75em;height:7.5em;transform:rotate(45deg);border-radius:50%}.swal2-icon.swal2-success [class^=swal2-success-circular-line][class$=left]{top:-.4375em;left:-2.0635em;transform:rotate(-45deg);transform-origin:3.75em 3.75em;border-radius:7.5em 0 0 7.5em}.swal2-icon.swal2-success [class^=swal2-success-circular-line][class$=right]{top:-.6875em;left:1.875em;transform:rotate(-45deg);transform-origin:0 3.75em;border-radius:0 7.5em 7.5em 0}.swal2-icon.swal2-success .swal2-success-ring{position:absolute;z-index:2;top:-.25em;left:-.25em;box-sizing:content-box;width:100%;height:100%;border:.25em solid rgba(165,220,134,.3);border-radius:50%}.swal2-icon.swal2-success .swal2-success-fix{position:absolute;z-index:1;top:.5em;left:1.625em;width:.4375em;height:5.625em;transform:rotate(-45deg)}.swal2-icon.swal2-success [class^=swal2-success-line]{display:block;position:absolute;z-index:2;height:.3125em;border-radius:.125em;background-color:#a5dc86}.swal2-icon.swal2-success [class^=swal2-success-line][class$=tip]{top:2.875em;left:.8125em;width:1.5625em;transform:rotate(45deg)}.swal2-icon.swal2-success [class^=swal2-success-line][class$=long]{top:2.375em;right:.5em;width:2.9375em;transform:rotate(-45deg)}.swal2-icon.swal2-success.swal2-icon-show .swal2-success-line-tip{-webkit-animation:swal2-animate-success-line-tip .75s;animation:swal2-animate-success-line-tip .75s}.swal2-icon.swal2-success.swal2-icon-show .swal2-success-line-long{-webkit-animation:swal2-animate-success-line-long .75s;animation:swal2-animate-success-line-long .75s}.swal2-icon.swal2-success.swal2-icon-show .swal2-success-circular-line-right{-webkit-animation:swal2-rotate-success-circular-line 4.25s ease-in;animation:swal2-rotate-success-circular-line 4.25s ease-in}.swal2-progress-steps{align-items:center;margin:0 0 1.25em;padding:0;background:inherit;font-weight:600}.swal2-progress-steps li{display:inline-block;position:relative}.swal2-progress-steps .swal2-progress-step{z-index:20;width:2em;height:2em;border-radius:2em;background:#3085d6;color:#fff;line-height:2em;text-align:center}.swal2-progress-steps .swal2-progress-step.swal2-active-progress-step{background:#3085d6}.swal2-progress-steps .swal2-progress-step.swal2-active-progress-step~.swal2-progress-step{background:#add8e6;color:#fff}.swal2-progress-steps .swal2-progress-step.swal2-active-progress-step~.swal2-progress-step-line{background:#add8e6}.swal2-progress-steps .swal2-progress-step-line{z-index:10;width:2.5em;height:.4em;margin:0 -1px;background:#3085d6}[class^=swal2]{-webkit-tap-highlight-color:transparent}.swal2-show{-webkit-animation:swal2-show .3s;animation:swal2-show .3s}.swal2-hide{-webkit-animation:swal2-hide .15s forwards;animation:swal2-hide .15s forwards}.swal2-noanimation{transition:none}.swal2-scrollbar-measure{position:absolute;top:-9999px;width:50px;height:50px;overflow:scroll}.swal2-rtl .swal2-close{right:auto;left:0}.swal2-rtl .swal2-timer-progress-bar{right:0;left:auto}@supports (-ms-accelerator:true){.swal2-range input{width:100%!important}.swal2-range output{display:none}}@media all and (-ms-high-contrast:none),(-ms-high-contrast:active){.swal2-range input{width:100%!important}.swal2-range output{display:none}}@-moz-document url-prefix(){.swal2-close:focus{outline:2px solid rgba(50,100,150,.4)}}@-webkit-keyframes swal2-toast-show{0%{transform:translateY(-.625em) rotateZ(2deg)}33%{transform:translateY(0) rotateZ(-2deg)}66%{transform:translateY(.3125em) rotateZ(2deg)}100%{transform:translateY(0) rotateZ(0)}}@keyframes swal2-toast-show{0%{transform:translateY(-.625em) rotateZ(2deg)}33%{transform:translateY(0) rotateZ(-2deg)}66%{transform:translateY(.3125em) rotateZ(2deg)}100%{transform:translateY(0) rotateZ(0)}}@-webkit-keyframes swal2-toast-hide{100%{transform:rotateZ(1deg);opacity:0}}@keyframes swal2-toast-hide{100%{transform:rotateZ(1deg);opacity:0}}@-webkit-keyframes swal2-toast-animate-success-line-tip{0%{top:.5625em;left:.0625em;width:0}54%{top:.125em;left:.125em;width:0}70%{top:.625em;left:-.25em;width:1.625em}84%{top:1.0625em;left:.75em;width:.5em}100%{top:1.125em;left:.1875em;width:.75em}}@keyframes swal2-toast-animate-success-line-tip{0%{top:.5625em;left:.0625em;width:0}54%{top:.125em;left:.125em;width:0}70%{top:.625em;left:-.25em;width:1.625em}84%{top:1.0625em;left:.75em;width:.5em}100%{top:1.125em;left:.1875em;width:.75em}}@-webkit-keyframes swal2-toast-animate-success-line-long{0%{top:1.625em;right:1.375em;width:0}65%{top:1.25em;right:.9375em;width:0}84%{top:.9375em;right:0;width:1.125em}100%{top:.9375em;right:.1875em;width:1.375em}}@keyframes swal2-toast-animate-success-line-long{0%{top:1.625em;right:1.375em;width:0}65%{top:1.25em;right:.9375em;width:0}84%{top:.9375em;right:0;width:1.125em}100%{top:.9375em;right:.1875em;width:1.375em}}@-webkit-keyframes swal2-show{0%{transform:scale(.7)}45%{transform:scale(1.05)}80%{transform:scale(.95)}100%{transform:scale(1)}}@keyframes swal2-show{0%{transform:scale(.7)}45%{transform:scale(1.05)}80%{transform:scale(.95)}100%{transform:scale(1)}}@-webkit-keyframes swal2-hide{0%{transform:scale(1);opacity:1}100%{transform:scale(.5);opacity:0}}@keyframes swal2-hide{0%{transform:scale(1);opacity:1}100%{transform:scale(.5);opacity:0}}@-webkit-keyframes swal2-animate-success-line-tip{0%{top:1.1875em;left:.0625em;width:0}54%{top:1.0625em;left:.125em;width:0}70%{top:2.1875em;left:-.375em;width:3.125em}84%{top:3em;left:1.3125em;width:1.0625em}100%{top:2.8125em;left:.8125em;width:1.5625em}}@keyframes swal2-animate-success-line-tip{0%{top:1.1875em;left:.0625em;width:0}54%{top:1.0625em;left:.125em;width:0}70%{top:2.1875em;left:-.375em;width:3.125em}84%{top:3em;left:1.3125em;width:1.0625em}100%{top:2.8125em;left:.8125em;width:1.5625em}}@-webkit-keyframes swal2-animate-success-line-long{0%{top:3.375em;right:2.875em;width:0}65%{top:3.375em;right:2.875em;width:0}84%{top:2.1875em;right:0;width:3.4375em}100%{top:2.375em;right:.5em;width:2.9375em}}@keyframes swal2-animate-success-line-long{0%{top:3.375em;right:2.875em;width:0}65%{top:3.375em;right:2.875em;width:0}84%{top:2.1875em;right:0;width:3.4375em}100%{top:2.375em;right:.5em;width:2.9375em}}@-webkit-keyframes swal2-rotate-success-circular-line{0%{transform:rotate(-45deg)}5%{transform:rotate(-45deg)}12%{transform:rotate(-405deg)}100%{transform:rotate(-405deg)}}@keyframes swal2-rotate-success-circular-line{0%{transform:rotate(-45deg)}5%{transform:rotate(-45deg)}12%{transform:rotate(-405deg)}100%{transform:rotate(-405deg)}}@-webkit-keyframes swal2-animate-error-x-mark{0%{margin-top:1.625em;transform:scale(.4);opacity:0}50%{margin-top:1.625em;transform:scale(.4);opacity:0}80%{margin-top:-.375em;transform:scale(1.15)}100%{margin-top:0;transform:scale(1);opacity:1}}@keyframes swal2-animate-error-x-mark{0%{margin-top:1.625em;transform:scale(.4);opacity:0}50%{margin-top:1.625em;transform:scale(.4);opacity:0}80%{margin-top:-.375em;transform:scale(1.15)}100%{margin-top:0;transform:scale(1);opacity:1}}@-webkit-keyframes swal2-animate-error-icon{0%{transform:rotateX(100deg);opacity:0}100%{transform:rotateX(0);opacity:1}}@keyframes swal2-animate-error-icon{0%{transform:rotateX(100deg);opacity:0}100%{transform:rotateX(0);opacity:1}}@-webkit-keyframes swal2-rotate-loading{0%{transform:rotate(0)}100%{transform:rotate(360deg)}}@keyframes swal2-rotate-loading{0%{transform:rotate(0)}100%{transform:rotate(360deg)}}body.swal2-shown:not(.swal2-no-backdrop):not(.swal2-toast-shown){overflow:hidden}body.swal2-height-auto{height:auto!important}body.swal2-no-backdrop .swal2-container{top:auto;right:auto;bottom:auto;left:auto;max-width:calc(100% - .625em * 2);background-color:transparent!important}body.swal2-no-backdrop .swal2-container>.swal2-modal{box-shadow:0 0 10px rgba(0,0,0,.4)}body.swal2-no-backdrop .swal2-container.swal2-top{top:0;left:50%;transform:translateX(-50%)}body.swal2-no-backdrop .swal2-container.swal2-top-left,body.swal2-no-backdrop .swal2-container.swal2-top-start{top:0;left:0}body.swal2-no-backdrop .swal2-container.swal2-top-end,body.swal2-no-backdrop .swal2-container.swal2-top-right{top:0;right:0}body.swal2-no-backdrop .swal2-container.swal2-center{top:50%;left:50%;transform:translate(-50%,-50%)}body.swal2-no-backdrop .swal2-container.swal2-center-left,body.swal2-no-backdrop .swal2-container.swal2-center-start{top:50%;left:0;transform:translateY(-50%)}body.swal2-no-backdrop .swal2-container.swal2-center-end,body.swal2-no-backdrop .swal2-container.swal2-center-right{top:50%;right:0;transform:translateY(-50%)}body.swal2-no-backdrop .swal2-container.swal2-bottom{bottom:0;left:50%;transform:translateX(-50%)}body.swal2-no-backdrop .swal2-container.swal2-bottom-left,body.swal2-no-backdrop .swal2-container.swal2-bottom-start{bottom:0;left:0}body.swal2-no-backdrop .swal2-container.swal2-bottom-end,body.swal2-no-backdrop .swal2-container.swal2-bottom-right{right:0;bottom:0}@media print{body.swal2-shown:not(.swal2-no-backdrop):not(.swal2-toast-shown){overflow-y:scroll!important}body.swal2-shown:not(.swal2-no-backdrop):not(.swal2-toast-shown)>[aria-hidden=true]{display:none}body.swal2-shown:not(.swal2-no-backdrop):not(.swal2-toast-shown) .swal2-container{position:static!important}}body.swal2-toast-shown .swal2-container{background-color:transparent}body.swal2-toast-shown .swal2-container.swal2-top{top:0;right:auto;bottom:auto;left:50%;transform:translateX(-50%)}body.swal2-toast-shown .swal2-container.swal2-top-end,body.swal2-toast-shown .swal2-container.swal2-top-right{top:0;right:0;bottom:auto;left:auto}body.swal2-toast-shown .swal2-container.swal2-top-left,body.swal2-toast-shown .swal2-container.swal2-top-start{top:0;right:auto;bottom:auto;left:0}body.swal2-toast-shown .swal2-container.swal2-center-left,body.swal2-toast-shown .swal2-container.swal2-center-start{top:50%;right:auto;bottom:auto;left:0;transform:translateY(-50%)}body.swal2-toast-shown .swal2-container.swal2-center{top:50%;right:auto;bottom:auto;left:50%;transform:translate(-50%,-50%)}body.swal2-toast-shown .swal2-container.swal2-center-end,body.swal2-toast-shown .swal2-container.swal2-center-right{top:50%;right:0;bottom:auto;left:auto;transform:translateY(-50%)}body.swal2-toast-shown .swal2-container.swal2-bottom-left,body.swal2-toast-shown .swal2-container.swal2-bottom-start{top:auto;right:auto;bottom:0;left:0}body.swal2-toast-shown .swal2-container.swal2-bottom{top:auto;right:auto;bottom:0;left:50%;transform:translateX(-50%)}body.swal2-toast-shown .swal2-container.swal2-bottom-end,body.swal2-toast-shown .swal2-container.swal2-bottom-right{top:auto;right:0;bottom:0;left:auto}body.swal2-toast-column .swal2-toast{flex-direction:column;align-items:stretch}body.swal2-toast-column .swal2-toast .swal2-actions{flex:1;align-self:stretch;height:2.2em;margin-top:.3125em}body.swal2-toast-column .swal2-toast .swal2-loading{justify-content:center}body.swal2-toast-column .swal2-toast .swal2-input{height:2em;margin:.3125em auto;font-size:1em}body.swal2-toast-column .swal2-toast .swal2-validation-message{font-size:1em}</style><style>.swal2-popup.swal2-toast{align-items:center;background:#fff;box-shadow:0 0 .625em #d9d9d9;flex-direction:row;overflow-y:hidden;padding:.625em;width:auto}.swal2-popup.swal2-toast .swal2-header{flex-direction:row;padding:0}.swal2-popup.swal2-toast .swal2-title{flex-grow:1;font-size:1em;justify-content:flex-start;margin:0 .6em}.swal2-popup.swal2-toast .swal2-footer{font-size:.8em;margin:.5em 0 0;padding:.5em 0 0}.swal2-popup.swal2-toast .swal2-close{height:.8em;line-height:.8;position:static;width:.8em}.swal2-popup.swal2-toast .swal2-content{font-size:1em;justify-content:flex-start;padding:0}.swal2-popup.swal2-toast .swal2-icon{height:2em;margin:0;min-width:2em;width:2em}.swal2-popup.swal2-toast .swal2-icon .swal2-icon-content{align-items:center;display:flex;font-size:1.8em;font-weight:700}@media (-ms-high-contrast:active),(-ms-high-contrast:none){.swal2-popup.swal2-toast .swal2-icon .swal2-icon-content{font-size:.25em}}.swal2-popup.swal2-toast .swal2-icon.swal2-success .swal2-success-ring{height:2em;width:2em}.swal2-popup.swal2-toast .swal2-icon.swal2-error [class^=swal2-x-mark-line]{top:.875em;width:1.375em}.swal2-popup.swal2-toast .swal2-icon.swal2-error [class^=swal2-x-mark-line][class$=left]{left:.3125em}.swal2-popup.swal2-toast .swal2-icon.swal2-error [class^=swal2-x-mark-line][class$=right]{right:.3125em}.swal2-popup.swal2-toast .swal2-actions{flex-basis:auto!important;height:auto;margin:0 .3125em;width:auto}.swal2-popup.swal2-toast .swal2-styled{font-size:1em;margin:0 .3125em;padding:.3125em .625em}.swal2-popup.swal2-toast .swal2-styled:focus{box-shadow:0 0 0 1px #fff,0 0 0 3px rgba(50,100,150,.4)}.swal2-popup.swal2-toast .swal2-success{border-color:#a5dc86}.swal2-popup.swal2-toast .swal2-success [class^=swal2-success-circular-line]{border-radius:50%;height:3em;position:absolute;transform:rotate(45deg);width:1.6em}.swal2-popup.swal2-toast .swal2-success [class^=swal2-success-circular-line][class$=left]{border-radius:4em 0 0 4em;left:-.5em;top:-.8em;transform:rotate(-45deg);transform-origin:2em 2em}.swal2-popup.swal2-toast .swal2-success [class^=swal2-success-circular-line][class$=right]{border-radius:0 4em 4em 0;left:.9375em;top:-.25em;transform-origin:0 1.5em}.swal2-popup.swal2-toast .swal2-success .swal2-success-ring{height:2em;width:2em}.swal2-popup.swal2-toast .swal2-success .swal2-success-fix{height:2.6875em;left:.4375em;top:0;width:.4375em}.swal2-popup.swal2-toast .swal2-success [class^=swal2-success-line]{height:.3125em}.swal2-popup.swal2-toast .swal2-success [class^=swal2-success-line][class$=tip]{left:.1875em;top:1.125em;width:.75em}.swal2-popup.swal2-toast .swal2-success [class^=swal2-success-line][class$=long]{right:.1875em;top:.9375em;width:1.375em}.swal2-popup.swal2-toast .swal2-success.swal2-icon-show .swal2-success-line-tip{animation:swal2-toast-animate-success-line-tip .75s}.swal2-popup.swal2-toast .swal2-success.swal2-icon-show .swal2-success-line-long{animation:swal2-toast-animate-success-line-long .75s}.swal2-popup.swal2-toast.swal2-show{animation:swal2-toast-show .5s}.swal2-popup.swal2-toast.swal2-hide{animation:swal2-toast-hide .1s forwards}.swal2-container{-webkit-overflow-scrolling:touch;align-items:center;bottom:0;display:flex;flex-direction:row;justify-content:center;left:0;overflow-x:hidden;padding:.625em;position:fixed;right:0;top:0;transition:background-color .1s;z-index:1060}.swal2-container.swal2-backdrop-show,.swal2-container.swal2-noanimation{background:rgba(0,0,0,.4)}.swal2-container.swal2-backdrop-hide{background:0 0!important}.swal2-container.swal2-top{align-items:flex-start}.swal2-container.swal2-top-left,.swal2-container.swal2-top-start{align-items:flex-start;justify-content:flex-start}.swal2-container.swal2-top-end,.swal2-container.swal2-top-right{align-items:flex-start;justify-content:flex-end}.swal2-container.swal2-center{align-items:center}.swal2-container.swal2-center-left,.swal2-container.swal2-center-start{align-items:center;justify-content:flex-start}.swal2-container.swal2-center-end,.swal2-container.swal2-center-right{align-items:center;justify-content:flex-end}.swal2-container.swal2-bottom{align-items:flex-end}.swal2-container.swal2-bottom-left,.swal2-container.swal2-bottom-start{align-items:flex-end;justify-content:flex-start}.swal2-container.swal2-bottom-end,.swal2-container.swal2-bottom-right{align-items:flex-end;justify-content:flex-end}.swal2-container.swal2-bottom-end>:first-child,.swal2-container.swal2-bottom-left>:first-child,.swal2-container.swal2-bottom-right>:first-child,.swal2-container.swal2-bottom-start>:first-child,.swal2-container.swal2-bottom>:first-child{margin-top:auto}.swal2-container.swal2-grow-fullscreen>.swal2-modal{align-self:stretch;display:flex!important;flex:1;justify-content:center}.swal2-container.swal2-grow-row>.swal2-modal{align-content:center;display:flex!important;flex:1;justify-content:center}.swal2-container.swal2-grow-column{flex:1;flex-direction:column}.swal2-container.swal2-grow-column.swal2-bottom,.swal2-container.swal2-grow-column.swal2-center,.swal2-container.swal2-grow-column.swal2-top{align-items:center}.swal2-container.swal2-grow-column.swal2-bottom-left,.swal2-container.swal2-grow-column.swal2-bottom-start,.swal2-container.swal2-grow-column.swal2-center-left,.swal2-container.swal2-grow-column.swal2-center-start,.swal2-container.swal2-grow-column.swal2-top-left,.swal2-container.swal2-grow-column.swal2-top-start{align-items:flex-start}.swal2-container.swal2-grow-column.swal2-bottom-end,.swal2-container.swal2-grow-column.swal2-bottom-right,.swal2-container.swal2-grow-column.swal2-center-end,.swal2-container.swal2-grow-column.swal2-center-right,.swal2-container.swal2-grow-column.swal2-top-end,.swal2-container.swal2-grow-column.swal2-top-right{align-items:flex-end}.swal2-container.swal2-grow-column>.swal2-modal{align-content:center;display:flex!important;flex:1;justify-content:center}.swal2-container.swal2-no-transition{transition:none!important}.swal2-container:not(.swal2-top):not(.swal2-top-start):not(.swal2-top-end):not(.swal2-top-left):not(.swal2-top-right):not(.swal2-center-start):not(.swal2-center-end):not(.swal2-center-left):not(.swal2-center-right):not(.swal2-bottom):not(.swal2-bottom-start):not(.swal2-bottom-end):not(.swal2-bottom-left):not(.swal2-bottom-right):not(.swal2-grow-fullscreen)>.swal2-modal{margin:auto}@media (-ms-high-contrast:active),(-ms-high-contrast:none){.swal2-container .swal2-modal{margin:0!important}}.swal2-popup{background:#fff;border:none;border-radius:.3125em;box-sizing:border-box;display:none;flex-direction:column;font-family:inherit;font-size:1rem;justify-content:center;max-width:100%;padding:1.25em;position:relative;width:32em}.swal2-popup:focus{outline:0}.swal2-popup.swal2-loading{overflow-y:hidden}.swal2-header{align-items:center;display:flex;flex-direction:column;padding:0 1.8em}.swal2-title{word-wrap:break-word;color:#595959;font-size:1.875em;font-weight:600;margin:0 0 .4em;max-width:100%;padding:0;position:relative;text-align:center;text-transform:none}.swal2-actions{align-items:center;display:flex;flex-wrap:wrap;justify-content:center;margin:1.25em auto 0;width:100%;z-index:1}.swal2-actions:not(.swal2-loading) .swal2-styled[disabled]{opacity:.4}.swal2-actions:not(.swal2-loading) .swal2-styled:hover{background-image:linear-gradient(rgba(0,0,0,.1),rgba(0,0,0,.1))}.swal2-actions:not(.swal2-loading) .swal2-styled:active{background-image:linear-gradient(rgba(0,0,0,.2),rgba(0,0,0,.2))}.swal2-actions.swal2-loading .swal2-styled.swal2-confirm{animation:swal2-rotate-loading 1.5s linear 0s infinite normal;background-color:transparent!important;border:.25em solid transparent;border-radius:100%;box-sizing:border-box;color:transparent!important;cursor:default;height:2.5em;margin:.46875em;padding:0;-webkit-user-select:none;-moz-user-select:none;user-select:none;width:2.5em}.swal2-actions.swal2-loading .swal2-styled.swal2-cancel{margin-left:30px;margin-right:30px}.swal2-actions.swal2-loading :not(.swal2-styled).swal2-confirm:after{animation:swal2-rotate-loading 1.5s linear 0s infinite normal;border:3px solid #999;border-radius:50%;border-right-color:transparent;box-shadow:1px 1px 1px #fff;content:"";display:inline-block;height:15px;margin-left:5px;width:15px}.swal2-styled{box-shadow:none;font-weight:500;margin:.3125em;padding:.625em 2em}.swal2-styled:not([disabled]){cursor:pointer}.swal2-styled.swal2-confirm{background:initial;background-color:#3085d6}.swal2-styled.swal2-cancel,.swal2-styled.swal2-confirm{border:0;border-radius:.25em;color:#fff;font-size:1.0625em}.swal2-styled.swal2-cancel{background:initial;background-color:#aaa}.swal2-styled:focus{box-shadow:0 0 0 1px #fff,0 0 0 3px rgba(50,100,150,.4);outline:0}.swal2-styled::-moz-focus-inner{border:0}.swal2-footer{border-top:1px solid #eee;color:#545454;font-size:1em;justify-content:center;margin:1.25em 0 0;padding:1em 0 0}.swal2-timer-progress-bar-container{border-bottom-left-radius:.3125em;border-bottom-right-radius:.3125em;bottom:0;height:.25em;left:0;overflow:hidden;position:absolute;right:0}.swal2-timer-progress-bar{background:rgba(0,0,0,.2);height:.25em;width:100%}.swal2-image{margin:1.25em auto;max-width:100%}.swal2-close{align-items:center;background:0 0;border:none;border-radius:0;color:#ccc;cursor:pointer;font-family:serif;font-size:2.5em;height:1.2em;justify-content:center;line-height:1.2;overflow:hidden;padding:0;position:absolute;right:0;top:0;transition:color .1s ease-out;width:1.2em;z-index:2}.swal2-close:hover{background:0 0;color:#f27474;transform:none}.swal2-close::-moz-focus-inner{border:0}.swal2-content{word-wrap:break-word;color:#545454;font-size:1.125em;font-weight:400;justify-content:center;line-height:normal;margin:0;padding:0 1.6em;text-align:center;z-index:1}.swal2-checkbox,.swal2-file,.swal2-input,.swal2-radio,.swal2-select,.swal2-textarea{margin:1em auto}.swal2-file,.swal2-input,.swal2-textarea{background:inherit;border:1px solid #d9d9d9;border-radius:.1875em;box-shadow:inset 0 1px 1px rgba(0,0,0,.06);box-sizing:border-box;color:inherit;font-size:1.125em;transition:border-color .3s,box-shadow .3s;width:100%}.swal2-file.swal2-inputerror,.swal2-input.swal2-inputerror,.swal2-textarea.swal2-inputerror{border-color:#f27474!important;box-shadow:0 0 2px #f27474!important}.swal2-file:focus,.swal2-input:focus,.swal2-textarea:focus{border:1px solid #b4dbed;box-shadow:0 0 3px #c4e6f5;outline:0}.swal2-file::-moz-placeholder,.swal2-input::-moz-placeholder,.swal2-textarea::-moz-placeholder{color:#ccc}.swal2-file::placeholder,.swal2-input::placeholder,.swal2-textarea::placeholder{color:#ccc}.swal2-range{background:#fff;margin:1em auto}.swal2-range input{width:80%}.swal2-range output{color:inherit;font-weight:600;text-align:center;width:20%}.swal2-range input,.swal2-range output{font-size:1.125em;height:2.625em;line-height:2.625em;padding:0}.swal2-input{height:2.625em;padding:0 .75em}.swal2-input[type=number]{max-width:10em}.swal2-file{background:inherit;font-size:1.125em}.swal2-textarea{height:6.75em;padding:.75em}.swal2-select{background:inherit;color:inherit;font-size:1.125em;max-width:100%;min-width:50%;padding:.375em .625em}.swal2-checkbox,.swal2-radio{align-items:center;background:#fff;color:inherit;justify-content:center}.swal2-checkbox label,.swal2-radio label{font-size:1.125em;margin:0 .6em}.swal2-checkbox input,.swal2-radio input{margin:0 .4em}.swal2-validation-message{align-items:center;background:#f0f0f0;color:#666;display:none;font-size:1em;font-weight:300;justify-content:center;overflow:hidden;padding:.625em}.swal2-validation-message:before{background-color:#f27474;border-radius:50%;color:#fff;content:"!";display:inline-block;font-weight:600;height:1.5em;line-height:1.5em;margin:0 .625em;min-width:1.5em;text-align:center;width:1.5em}.swal2-icon{border:.25em solid transparent;border-radius:50%;box-sizing:content-box;cursor:default;font-family:inherit;height:5em;justify-content:center;line-height:5em;margin:1.25em auto 1.875em;position:relative;-webkit-user-select:none;-moz-user-select:none;user-select:none;width:5em}.swal2-icon .swal2-icon-content{align-items:center;display:flex;font-size:3.75em}.swal2-icon.swal2-error{border-color:#f27474;color:#f27474}.swal2-icon.swal2-error .swal2-x-mark{flex-grow:1;position:relative}.swal2-icon.swal2-error [class^=swal2-x-mark-line]{background-color:#f27474;border-radius:.125em;display:block;height:.3125em;position:absolute;top:2.3125em;width:2.9375em}.swal2-icon.swal2-error [class^=swal2-x-mark-line][class$=left]{left:1.0625em;transform:rotate(45deg)}.swal2-icon.swal2-error [class^=swal2-x-mark-line][class$=right]{right:1em;transform:rotate(-45deg)}.swal2-icon.swal2-error.swal2-icon-show{animation:swal2-animate-error-icon .5s}.swal2-icon.swal2-error.swal2-icon-show .swal2-x-mark{animation:swal2-animate-error-x-mark .5s}.swal2-icon.swal2-warning{border-color:#facea8;color:#f8bb86}.swal2-icon.swal2-info{border-color:#9de0f6;color:#3fc3ee}.swal2-icon.swal2-question{border-color:#c9dae1;color:#87adbd}.swal2-icon.swal2-success{border-color:#a5dc86;color:#a5dc86}.swal2-icon.swal2-success [class^=swal2-success-circular-line]{border-radius:50%;height:7.5em;position:absolute;transform:rotate(45deg);width:3.75em}.swal2-icon.swal2-success [class^=swal2-success-circular-line][class$=left]{border-radius:7.5em 0 0 7.5em;left:-2.0635em;top:-.4375em;transform:rotate(-45deg);transform-origin:3.75em 3.75em}.swal2-icon.swal2-success [class^=swal2-success-circular-line][class$=right]{border-radius:0 7.5em 7.5em 0;left:1.875em;top:-.6875em;transform:rotate(-45deg);transform-origin:0 3.75em}.swal2-icon.swal2-success .swal2-success-ring{border:.25em solid hsla(98,55%,69%,.3);border-radius:50%;box-sizing:content-box;height:100%;left:-.25em;position:absolute;top:-.25em;width:100%;z-index:2}.swal2-icon.swal2-success .swal2-success-fix{height:5.625em;left:1.625em;position:absolute;top:.5em;transform:rotate(-45deg);width:.4375em;z-index:1}.swal2-icon.swal2-success [class^=swal2-success-line]{background-color:#a5dc86;border-radius:.125em;display:block;height:.3125em;position:absolute;z-index:2}.swal2-icon.swal2-success [class^=swal2-success-line][class$=tip]{left:.8125em;top:2.875em;transform:rotate(45deg);width:1.5625em}.swal2-icon.swal2-success [class^=swal2-success-line][class$=long]{right:.5em;top:2.375em;transform:rotate(-45deg);width:2.9375em}.swal2-icon.swal2-success.swal2-icon-show .swal2-success-line-tip{animation:swal2-animate-success-line-tip .75s}.swal2-icon.swal2-success.swal2-icon-show .swal2-success-line-long{animation:swal2-animate-success-line-long .75s}.swal2-icon.swal2-success.swal2-icon-show .swal2-success-circular-line-right{animation:swal2-rotate-success-circular-line 4.25s ease-in}.swal2-progress-steps{align-items:center;background:inherit;font-weight:600;margin:0 0 1.25em;padding:0}.swal2-progress-steps li{display:inline-block;position:relative}.swal2-progress-steps .swal2-progress-step{background:#3085d6;border-radius:2em;color:#fff;height:2em;line-height:2em;text-align:center;width:2em;z-index:20}.swal2-progress-steps .swal2-progress-step.swal2-active-progress-step{background:#3085d6}.swal2-progress-steps .swal2-progress-step.swal2-active-progress-step~.swal2-progress-step{background:#add8e6;color:#fff}.swal2-progress-steps .swal2-progress-step.swal2-active-progress-step~.swal2-progress-step-line{background:#add8e6}.swal2-progress-steps .swal2-progress-step-line{background:#3085d6;height:.4em;margin:0 -1px;width:2.5em;z-index:10}[class^=swal2]{-webkit-tap-highlight-color:transparent}.swal2-show{animation:swal2-show .3s}.swal2-hide{animation:swal2-hide .15s forwards}.swal2-noanimation{transition:none}.swal2-scrollbar-measure{height:50px;overflow:scroll;position:absolute;top:-9999px;width:50px}.swal2-rtl .swal2-close{left:0;right:auto}.swal2-rtl .swal2-timer-progress-bar{left:auto;right:0}@supports (-ms-accelerator:true){.swal2-range input{width:100%!important}.swal2-range output{display:none}}@media (-ms-high-contrast:active),(-ms-high-contrast:none){.swal2-range input{width:100%!important}.swal2-range output{display:none}}@-moz-document url-prefix(){.swal2-close:focus{outline:2px solid rgba(50,100,150,.4)}}@keyframes swal2-toast-show{0%{transform:translateY(-.625em) rotate(2deg)}33%{transform:translateY(0) rotate(-2deg)}66%{transform:translateY(.3125em) rotate(2deg)}to{transform:translateY(0) rotate(0)}}@keyframes swal2-toast-hide{to{opacity:0;transform:rotate(1deg)}}@keyframes swal2-toast-animate-success-line-tip{0%{left:.0625em;top:.5625em;width:0}54%{left:.125em;top:.125em;width:0}70%{left:-.25em;top:.625em;width:1.625em}84%{left:.75em;top:1.0625em;width:.5em}to{left:.1875em;top:1.125em;width:.75em}}@keyframes swal2-toast-animate-success-line-long{0%{right:1.375em;top:1.625em;width:0}65%{right:.9375em;top:1.25em;width:0}84%{right:0;top:.9375em;width:1.125em}to{right:.1875em;top:.9375em;width:1.375em}}@keyframes swal2-show{0%{transform:scale(.7)}45%{transform:scale(1.05)}80%{transform:scale(.95)}to{transform:scale(1)}}@keyframes swal2-hide{0%{opacity:1;transform:scale(1)}to{opacity:0;transform:scale(.5)}}@keyframes swal2-animate-success-line-tip{0%{left:.0625em;top:1.1875em;width:0}54%{left:.125em;top:1.0625em;width:0}70%{left:-.375em;top:2.1875em;width:3.125em}84%{left:1.3125em;top:3em;width:1.0625em}to{left:.8125em;top:2.8125em;width:1.5625em}}@keyframes swal2-animate-success-line-long{0%{right:2.875em;top:3.375em;width:0}65%{right:2.875em;top:3.375em;width:0}84%{right:0;top:2.1875em;width:3.4375em}to{right:.5em;top:2.375em;width:2.9375em}}@keyframes swal2-rotate-success-circular-line{0%{transform:rotate(-45deg)}5%{transform:rotate(-45deg)}12%{transform:rotate(-405deg)}to{transform:rotate(-405deg)}}@keyframes swal2-animate-error-x-mark{0%{margin-top:1.625em;opacity:0;transform:scale(.4)}50%{margin-top:1.625em;opacity:0;transform:scale(.4)}80%{margin-top:-.375em;transform:scale(1.15)}to{margin-top:0;opacity:1;transform:scale(1)}}@keyframes swal2-animate-error-icon{0%{opacity:0;transform:rotateX(100deg)}to{opacity:1;transform:rotateX(0)}}@keyframes swal2-rotate-loading{0%{transform:rotate(0)}to{transform:rotate(1turn)}}body.swal2-shown:not(.swal2-no-backdrop):not(.swal2-toast-shown){overflow:hidden}body.swal2-height-auto{height:auto!important}body.swal2-no-backdrop .swal2-container{background-color:transparent!important;bottom:auto;left:auto;max-width:calc(100% - 1.25em);right:auto;top:auto}body.swal2-no-backdrop .swal2-container>.swal2-modal{box-shadow:0 0 10px rgba(0,0,0,.4)}body.swal2-no-backdrop .swal2-container.swal2-top{left:50%;top:0;transform:translateX(-50%)}body.swal2-no-backdrop .swal2-container.swal2-top-left,body.swal2-no-backdrop .swal2-container.swal2-top-start{left:0;top:0}body.swal2-no-backdrop .swal2-container.swal2-top-end,body.swal2-no-backdrop .swal2-container.swal2-top-right{right:0;top:0}body.swal2-no-backdrop .swal2-container.swal2-center{left:50%;top:50%;transform:translate(-50%,-50%)}body.swal2-no-backdrop .swal2-container.swal2-center-left,body.swal2-no-backdrop .swal2-container.swal2-center-start{left:0;top:50%;transform:translateY(-50%)}body.swal2-no-backdrop .swal2-container.swal2-center-end,body.swal2-no-backdrop .swal2-container.swal2-center-right{right:0;top:50%;transform:translateY(-50%)}body.swal2-no-backdrop .swal2-container.swal2-bottom{bottom:0;left:50%;transform:translateX(-50%)}body.swal2-no-backdrop .swal2-container.swal2-bottom-left,body.swal2-no-backdrop .swal2-container.swal2-bottom-start{bottom:0;left:0}body.swal2-no-backdrop .swal2-container.swal2-bottom-end,body.swal2-no-backdrop .swal2-container.swal2-bottom-right{bottom:0;right:0}@media print{body.swal2-shown:not(.swal2-no-backdrop):not(.swal2-toast-shown){overflow-y:scroll!important}body.swal2-shown:not(.swal2-no-backdrop):not(.swal2-toast-shown)>[aria-hidden=true]{display:none}body.swal2-shown:not(.swal2-no-backdrop):not(.swal2-toast-shown) .swal2-container{position:static!important}}body.swal2-toast-shown .swal2-container{background-color:transparent}body.swal2-toast-shown .swal2-container.swal2-top{bottom:auto;left:50%;right:auto;top:0;transform:translateX(-50%)}body.swal2-toast-shown .swal2-container.swal2-top-end,body.swal2-toast-shown .swal2-container.swal2-top-right{bottom:auto;left:auto;right:0;top:0}body.swal2-toast-shown .swal2-container.swal2-top-left,body.swal2-toast-shown .swal2-container.swal2-top-start{bottom:auto;left:0;right:auto;top:0}body.swal2-toast-shown .swal2-container.swal2-center-left,body.swal2-toast-shown .swal2-container.swal2-center-start{bottom:auto;left:0;right:auto;top:50%;transform:translateY(-50%)}body.swal2-toast-shown .swal2-container.swal2-center{bottom:auto;left:50%;right:auto;top:50%;transform:translate(-50%,-50%)}body.swal2-toast-shown .swal2-container.swal2-center-end,body.swal2-toast-shown .swal2-container.swal2-center-right{bottom:auto;left:auto;right:0;top:50%;transform:translateY(-50%)}body.swal2-toast-shown .swal2-container.swal2-bottom-left,body.swal2-toast-shown .swal2-container.swal2-bottom-start{bottom:0;left:0;right:auto;top:auto}body.swal2-toast-shown .swal2-container.swal2-bottom{bottom:0;left:50%;right:auto;top:auto;transform:translateX(-50%)}body.swal2-toast-shown .swal2-container.swal2-bottom-end,body.swal2-toast-shown .swal2-container.swal2-bottom-right{bottom:0;left:auto;right:0;top:auto}body.swal2-toast-column .swal2-toast{align-items:stretch;flex-direction:column}body.swal2-toast-column .swal2-toast .swal2-actions{align-self:stretch;flex:1;height:2.2em;margin-top:.3125em}body.swal2-toast-column .swal2-toast .swal2-loading{justify-content:center}body.swal2-toast-column .swal2-toast .swal2-input{font-size:1em;height:2em;margin:.3125em auto}body.swal2-toast-column .swal2-toast .swal2-validation-message{font-size:1em}</style><style>:root{--vs-colors--lightest:rgba(60,60,60,.26);--vs-colors--light:rgba(60,60,60,.5);--vs-colors--dark:#333;--vs-colors--darkest:rgba(0,0,0,.15);--vs-search-input-color:inherit;--vs-search-input-bg:#fff;--vs-search-input-placeholder-color:inherit;--vs-font-size:1rem;--vs-line-height:1.4;--vs-state-disabled-bg:#f8f8f8;--vs-state-disabled-color:var(--vs-colors--light);--vs-state-disabled-controls-color:var(--vs-colors--light);--vs-state-disabled-cursor:not-allowed;--vs-border-color:var(--vs-colors--lightest);--vs-border-width:1px;--vs-border-style:solid;--vs-border-radius:4px;--vs-actions-padding:4px 6px 0 3px;--vs-controls-color:var(--vs-colors--light);--vs-controls-size:1;--vs-controls--deselect-text-shadow:0 1px 0 #fff;--vs-selected-bg:#f0f0f0;--vs-selected-color:var(--vs-colors--dark);--vs-selected-border-color:var(--vs-border-color);--vs-selected-border-style:var(--vs-border-style);--vs-selected-border-width:var(--vs-border-width);--vs-dropdown-bg:#fff;--vs-dropdown-color:inherit;--vs-dropdown-z-index:1000;--vs-dropdown-min-width:160px;--vs-dropdown-max-height:350px;--vs-dropdown-box-shadow:0px 3px 6px 0px var(--vs-colors--darkest);--vs-dropdown-option-bg:#000;--vs-dropdown-option-color:var(--vs-dropdown-color);--vs-dropdown-option-padding:3px 20px;--vs-dropdown-option--active-bg:#5897fb;--vs-dropdown-option--active-color:#fff;--vs-dropdown-option--deselect-bg:#fb5858;--vs-dropdown-option--deselect-color:#fff;--vs-transition-timing-function:cubic-bezier(1,-0.115,0.975,0.855);--vs-transition-duration:150ms}.v-select{font-family:inherit;position:relative}.v-select,.v-select *{box-sizing:border-box}:root{--vs-transition-timing-function:cubic-bezier(1,0.5,0.8,1);--vs-transition-duration:0.15s}@keyframes vSelectSpinner{0%{transform:rotate(0deg)}to{transform:rotate(1turn)}}.vs__fade-enter-active,.vs__fade-leave-active{pointer-events:none;transition:opacity var(--vs-transition-duration) var(--vs-transition-timing-function)}.vs__fade-enter,.vs__fade-leave-to{opacity:0}:root{--vs-disabled-bg:var(--vs-state-disabled-bg);--vs-disabled-color:var(--vs-state-disabled-color);--vs-disabled-cursor:var(--vs-state-disabled-cursor)}.vs--disabled .vs__clear,.vs--disabled .vs__dropdown-toggle,.vs--disabled .vs__open-indicator,.vs--disabled .vs__search,.vs--disabled .vs__selected{background-color:var(--vs-disabled-bg);cursor:var(--vs-disabled-cursor)}.v-select[dir=rtl] .vs__actions{padding:0 3px 0 6px}.v-select[dir=rtl] .vs__clear{margin-left:6px;margin-right:0}.v-select[dir=rtl] .vs__deselect{margin-left:0;margin-right:2px}.v-select[dir=rtl] .vs__dropdown-menu{text-align:right}.vs__dropdown-toggle{-webkit-appearance:none;-moz-appearance:none;appearance:none;background:var(--vs-search-input-bg);border:var(--vs-border-width) var(--vs-border-style) var(--vs-border-color);border-radius:var(--vs-border-radius);display:flex;padding:0 0 4px;white-space:normal}.vs__selected-options{display:flex;flex-basis:100%;flex-grow:1;flex-wrap:wrap;padding:0 2px;position:relative}.vs__actions{align-items:center;display:flex;padding:var(--vs-actions-padding)}.vs--searchable .vs__dropdown-toggle{cursor:text}.vs--unsearchable .vs__dropdown-toggle{cursor:pointer}.vs--open .vs__dropdown-toggle{border-bottom-color:transparent;border-bottom-left-radius:0;border-bottom-right-radius:0}.vs__open-indicator{fill:var(--vs-controls-color);transform:scale(var(--vs-controls-size));transition:transform var(--vs-transition-duration) var(--vs-transition-timing-function);transition-timing-function:var(--vs-transition-timing-function)}.vs--open .vs__open-indicator{transform:rotate(180deg) scale(var(--vs-controls-size))}.vs--loading .vs__open-indicator{opacity:0}.vs__clear{fill:var(--vs-controls-color);background-color:transparent;border:0;cursor:pointer;margin-right:8px;padding:0}.vs__dropdown-menu{background:var(--vs-dropdown-bg);border:var(--vs-border-width) var(--vs-border-style) var(--vs-border-color);border-radius:0 0 var(--vs-border-radius) var(--vs-border-radius);border-top-style:none;box-shadow:var(--vs-dropdown-box-shadow);box-sizing:border-box;color:var(--vs-dropdown-color);display:block;left:0;list-style:none;margin:0;max-height:var(--vs-dropdown-max-height);min-width:var(--vs-dropdown-min-width);overflow-y:auto;padding:5px 0;position:absolute;text-align:left;top:calc(100% - var(--vs-border-width));width:100%;z-index:var(--vs-dropdown-z-index)}.vs__no-options{text-align:center}.vs__dropdown-option{clear:both;color:var(--vs-dropdown-option-color);cursor:pointer;display:block;line-height:1.42857143;padding:var(--vs-dropdown-option-padding);white-space:nowrap}.vs__dropdown-option--highlight{background:var(--vs-dropdown-option--active-bg);color:var(--vs-dropdown-option--active-color)}.vs__dropdown-option--deselect{background:var(--vs-dropdown-option--deselect-bg);color:var(--vs-dropdown-option--deselect-color)}.vs__dropdown-option--disabled{background:var(--vs-state-disabled-bg);color:var(--vs-state-disabled-color);cursor:var(--vs-state-disabled-cursor)}.vs__selected{align-items:center;background-color:var(--vs-selected-bg);border:var(--vs-selected-border-width) var(--vs-selected-border-style) var(--vs-selected-border-color);border-radius:var(--vs-border-radius);color:var(--vs-selected-color);display:flex;line-height:var(--vs-line-height);margin:4px 2px 0;padding:0 .25em;z-index:0}.vs__deselect{fill:var(--vs-controls-color);-webkit-appearance:none;-moz-appearance:none;appearance:none;background:none;border:0;cursor:pointer;display:inline-flex;margin-left:4px;padding:0;text-shadow:var(--vs-controls--deselect-text-shadow)}.vs--single .vs__selected{background-color:transparent;border-color:transparent}.vs--single.vs--loading .vs__selected,.vs--single.vs--open .vs__selected{opacity:.4;position:absolute}.vs--single.vs--searching .vs__selected{display:none}.vs__search::-webkit-search-cancel-button{display:none}.vs__search::-ms-clear,.vs__search::-webkit-search-decoration,.vs__search::-webkit-search-results-button,.vs__search::-webkit-search-results-decoration{display:none}.vs__search,.vs__search:focus{-webkit-appearance:none;-moz-appearance:none;appearance:none;background:none;border:1px solid transparent;border-left:none;box-shadow:none;color:var(--vs-search-input-color);flex-grow:1;font-size:var(--vs-font-size);line-height:var(--vs-line-height);margin:4px 0 0;max-width:100%;outline:none;padding:0 7px;width:0;z-index:1}.vs__search::-moz-placeholder{color:var(--vs-search-input-placeholder-color)}.vs__search::placeholder{color:var(--vs-search-input-placeholder-color)}.vs--unsearchable .vs__search{opacity:1}.vs--unsearchable:not(.vs--disabled) .vs__search{cursor:pointer}.vs--single.vs--searching:not(.vs--open):not(.vs--loading) .vs__search{opacity:.2}.vs__spinner{align-self:center;animation:vSelectSpinner 1.1s linear infinite;border:.9em solid hsla(0,0%,39%,.1);border-left-color:rgba(60,60,60,.45);font-size:5px;opacity:0;overflow:hidden;text-indent:-9999em;transform:translateZ(0) scale(var(--vs-controls--spinner-size,var(--vs-controls-size)));transition:opacity .1s}.vs__spinner,.vs__spinner:after{border-radius:50%;height:5em;transform:scale(var(--vs-controls--spinner-size,var(--vs-controls-size)));width:5em}.vs--loading .vs__spinner{opacity:1}</style><style>.autocomplete-input{background-color:#eee;background-image:url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNjY2IiBzdHJva2Utd2lkdGg9IjIiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCI+PGNpcmNsZSBjeD0iMTEiIGN5PSIxMSIgcj0iOCIvPjxwYXRoIGQ9Im0yMSAyMS00LTQiLz48L3N2Zz4=");background-position:12px;background-repeat:no-repeat;border:1px solid #eee;border-radius:8px;box-sizing:border-box;flex:1;font-size:16px;line-height:1.5;padding:12px 12px 12px 48px;position:relative;width:100%}.autocomplete-input:focus,.autocomplete-input[aria-expanded=true]{background-color:#fff;border-color:rgba(0,0,0,.12);box-shadow:0 2px 2px rgba(0,0,0,.16);outline:none}[data-position=below] .autocomplete-input[aria-expanded=true]{border-bottom-color:transparent;border-radius:8px 8px 0 0}[data-position=above] .autocomplete-input[aria-expanded=true]{border-radius:0 0 8px 8px;border-top-color:transparent;z-index:2}.autocomplete[data-loading=true]:after{animation:rotate 1s linear infinite;border:3px solid rgba(0,0,0,.12);border-radius:100%;border-right-color:rgba(0,0,0,.48);content:"";height:20px;position:absolute;right:12px;top:50%;transform:translateY(-50%);width:20px}.autocomplete-result-list{background:#fff;border:1px solid rgba(0,0,0,.12);box-shadow:0 2px 2px rgba(0,0,0,.16);box-sizing:border-box;list-style:none;margin:0;max-height:296px;overflow-y:auto;padding:0}[data-position=below] .autocomplete-result-list{border-radius:0 0 8px 8px;border-top-color:transparent;margin-top:-1px;padding-bottom:8px}[data-position=above] .autocomplete-result-list{border-bottom-color:transparent;border-radius:8px 8px 0 0;margin-bottom:-1px;padding-top:8px}.autocomplete-result{background-image:url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjY2NjIiBzdHJva2Utd2lkdGg9IjIiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCI+PGNpcmNsZSBjeD0iMTEiIGN5PSIxMSIgcj0iOCIvPjxwYXRoIGQ9Im0yMSAyMS00LTQiLz48L3N2Zz4=");background-position:12px;background-repeat:no-repeat;cursor:default;padding:12px 12px 12px 48px}.autocomplete-result:hover,.autocomplete-result[aria-selected=true]{background-color:rgba(0,0,0,.06)}@keyframes rotate{0%{transform:translateY(-50%) rotate(0deg)}to{transform:translateY(-50%) rotate(359deg)}}</style><style>#import-table td[data-v-03022ced],#import-table th[data-v-03022ced]{min-width:200px}#import-table .feedback-validation[data-v-03022ced]{font-size:16px;min-width:60px!important;padding-left:0!important;padding-right:0!important;width:100px!important}</style><style>.popper{background-color:#fafafa;border:1px solid #ebebeb;border-radius:3px;box-shadow:0 0 6px 0 #3a3a3a;color:#212121;display:inline-block;font-size:14px;font-weight:400;padding:2px;position:absolute;text-align:center;width:auto;z-index:200000}.popper .popper__arrow{border-style:solid;height:0;margin:5px;position:absolute;width:0}.popper[x-placement^=top]{margin-bottom:5px}.popper[x-placement^=top] .popper__arrow{border-color:#fafafa transparent transparent;border-width:5px 5px 0;bottom:-5px;left:calc(50% - 5px);margin-bottom:0;margin-top:0}.popper[x-placement^=bottom]{margin-top:5px}.popper[x-placement^=bottom] .popper__arrow{border-color:transparent transparent #fafafa;border-width:0 5px 5px;left:calc(50% - 5px);margin-bottom:0;margin-top:0;top:-5px}.popper[x-placement^=right]{margin-left:5px}.popper[x-placement^=right] .popper__arrow{border-color:transparent #fafafa transparent transparent;border-width:5px 5px 5px 0;left:-5px;margin-left:0;margin-right:0;top:calc(50% - 5px)}.popper[x-placement^=left]{margin-right:5px}.popper[x-placement^=left] .popper__arrow{border-color:transparent transparent transparent #fafafa;border-width:5px 0 5px 5px;margin-left:0;margin-right:0;right:-5px;top:calc(50% - 5px)}</style><style>.swiper-container{list-style:none;margin-left:auto;margin-right:auto;overflow:hidden;padding:0;position:relative;z-index:1}.swiper-container-no-flexbox .swiper-slide{float:left}.swiper-container-vertical>.swiper-wrapper{-webkit-box-orient:vertical;-webkit-box-direction:normal;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column}.swiper-wrapper{-webkit-box-sizing:content-box;box-sizing:content-box;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;height:100%;position:relative;-webkit-transition-property:-webkit-transform;transition-property:-webkit-transform;transition-property:transform;transition-property:transform,-webkit-transform;width:100%;z-index:1}.swiper-container-android .swiper-slide,.swiper-wrapper{-webkit-transform:translateZ(0);transform:translateZ(0)}.swiper-container-multirow>.swiper-wrapper{-webkit-flex-wrap:wrap;-ms-flex-wrap:wrap;flex-wrap:wrap}.swiper-container-free-mode>.swiper-wrapper{margin:0 auto;-webkit-transition-timing-function:ease-out;transition-timing-function:ease-out}.swiper-slide{-ms-flex-negative:0;-webkit-flex-shrink:0;flex-shrink:0;height:100%;position:relative;-webkit-transition-property:-webkit-transform;transition-property:-webkit-transform;transition-property:transform;transition-property:transform,-webkit-transform;width:100%}.swiper-slide-invisible-blank{visibility:hidden}.swiper-container-autoheight,.swiper-container-autoheight .swiper-slide{height:auto}.swiper-container-autoheight .swiper-wrapper{-webkit-box-align:start;-ms-flex-align:start;-webkit-align-items:flex-start;align-items:flex-start;-webkit-transition-property:height,-webkit-transform;transition-property:height,-webkit-transform;transition-property:transform,height;transition-property:transform,height,-webkit-transform}.swiper-container-3d{-webkit-perspective:1200px;perspective:1200px}.swiper-container-3d .swiper-cube-shadow,.swiper-container-3d .swiper-slide,.swiper-container-3d .swiper-slide-shadow-bottom,.swiper-container-3d .swiper-slide-shadow-left,.swiper-container-3d .swiper-slide-shadow-right,.swiper-container-3d .swiper-slide-shadow-top,.swiper-container-3d .swiper-wrapper{-webkit-transform-style:preserve-3d;transform-style:preserve-3d}.swiper-container-3d .swiper-slide-shadow-bottom,.swiper-container-3d .swiper-slide-shadow-left,.swiper-container-3d .swiper-slide-shadow-right,.swiper-container-3d .swiper-slide-shadow-top{height:100%;left:0;pointer-events:none;position:absolute;top:0;width:100%;z-index:10}.swiper-container-3d .swiper-slide-shadow-left{background-image:-webkit-gradient(linear,right top,left top,from(rgba(0,0,0,.5)),to(transparent));background-image:-webkit-linear-gradient(right,rgba(0,0,0,.5),transparent);background-image:linear-gradient(270deg,rgba(0,0,0,.5),transparent)}.swiper-container-3d .swiper-slide-shadow-right{background-image:-webkit-gradient(linear,left top,right top,from(rgba(0,0,0,.5)),to(transparent));background-image:-webkit-linear-gradient(left,rgba(0,0,0,.5),transparent);background-image:linear-gradient(90deg,rgba(0,0,0,.5),transparent)}.swiper-container-3d .swiper-slide-shadow-top{background-image:-webkit-gradient(linear,left bottom,left top,from(rgba(0,0,0,.5)),to(transparent));background-image:-webkit-linear-gradient(bottom,rgba(0,0,0,.5),transparent);background-image:linear-gradient(0deg,rgba(0,0,0,.5),transparent)}.swiper-container-3d .swiper-slide-shadow-bottom{background-image:-webkit-gradient(linear,left top,left bottom,from(rgba(0,0,0,.5)),to(transparent));background-image:-webkit-linear-gradient(top,rgba(0,0,0,.5),transparent);background-image:linear-gradient(180deg,rgba(0,0,0,.5),transparent)}.swiper-container-wp8-horizontal,.swiper-container-wp8-horizontal>.swiper-wrapper{-ms-touch-action:pan-y;touch-action:pan-y}.swiper-container-wp8-vertical,.swiper-container-wp8-vertical>.swiper-wrapper{-ms-touch-action:pan-x;touch-action:pan-x}.swiper-button-next,.swiper-button-prev{background-position:50%;background-repeat:no-repeat;background-size:27px 44px;cursor:pointer;height:44px;margin-top:-22px;position:absolute;top:50%;width:27px;z-index:10}.swiper-button-next.swiper-button-disabled,.swiper-button-prev.swiper-button-disabled{cursor:auto;opacity:.35;pointer-events:none}.swiper-button-prev,.swiper-container-rtl .swiper-button-next{background-image:url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 27 44'%3E%3Cpath d='M0 22 22 0l2.1 2.1L4.2 22l19.9 19.9L22 44 0 22z' fill='%23007aff'/%3E%3C/svg%3E");left:10px;right:auto}.swiper-button-next,.swiper-container-rtl .swiper-button-prev{background-image:url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 27 44'%3E%3Cpath d='M27 22 5 44l-2.1-2.1L22.8 22 2.9 2.1 5 0l22 22z' fill='%23007aff'/%3E%3C/svg%3E");left:auto;right:10px}.swiper-button-prev.swiper-button-white,.swiper-container-rtl .swiper-button-next.swiper-button-white{background-image:url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 27 44'%3E%3Cpath d='M0 22 22 0l2.1 2.1L4.2 22l19.9 19.9L22 44 0 22z' fill='%23fff'/%3E%3C/svg%3E")}.swiper-button-next.swiper-button-white,.swiper-container-rtl .swiper-button-prev.swiper-button-white{background-image:url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 27 44'%3E%3Cpath d='M27 22 5 44l-2.1-2.1L22.8 22 2.9 2.1 5 0l22 22z' fill='%23fff'/%3E%3C/svg%3E")}.swiper-button-prev.swiper-button-black,.swiper-container-rtl .swiper-button-next.swiper-button-black{background-image:url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 27 44'%3E%3Cpath d='M0 22 22 0l2.1 2.1L4.2 22l19.9 19.9L22 44 0 22z'/%3E%3C/svg%3E")}.swiper-button-next.swiper-button-black,.swiper-container-rtl .swiper-button-prev.swiper-button-black{background-image:url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 27 44'%3E%3Cpath d='M27 22 5 44l-2.1-2.1L22.8 22 2.9 2.1 5 0l22 22z'/%3E%3C/svg%3E")}.swiper-button-lock{display:none}.swiper-pagination{position:absolute;text-align:center;-webkit-transform:translateZ(0);transform:translateZ(0);-webkit-transition:opacity .3s;transition:opacity .3s;z-index:10}.swiper-pagination.swiper-pagination-hidden{opacity:0}.swiper-container-horizontal>.swiper-pagination-bullets,.swiper-pagination-custom,.swiper-pagination-fraction{bottom:10px;left:0;width:100%}.swiper-pagination-bullets-dynamic{font-size:0;overflow:hidden}.swiper-pagination-bullets-dynamic .swiper-pagination-bullet{position:relative;-webkit-transform:scale(.33);-ms-transform:scale(.33);transform:scale(.33)}.swiper-pagination-bullets-dynamic .swiper-pagination-bullet-active,.swiper-pagination-bullets-dynamic .swiper-pagination-bullet-active-main{-webkit-transform:scale(1);-ms-transform:scale(1);transform:scale(1)}.swiper-pagination-bullets-dynamic .swiper-pagination-bullet-active-prev{-webkit-transform:scale(.66);-ms-transform:scale(.66);transform:scale(.66)}.swiper-pagination-bullets-dynamic .swiper-pagination-bullet-active-prev-prev{-webkit-transform:scale(.33);-ms-transform:scale(.33);transform:scale(.33)}.swiper-pagination-bullets-dynamic .swiper-pagination-bullet-active-next{-webkit-transform:scale(.66);-ms-transform:scale(.66);transform:scale(.66)}.swiper-pagination-bullets-dynamic .swiper-pagination-bullet-active-next-next{-webkit-transform:scale(.33);-ms-transform:scale(.33);transform:scale(.33)}.swiper-pagination-bullet{background:#000;border-radius:100%;display:inline-block;height:8px;opacity:.2;width:8px}button.swiper-pagination-bullet{-webkit-appearance:none;-moz-appearance:none;appearance:none;border:none;-webkit-box-shadow:none;box-shadow:none;margin:0;padding:0}.swiper-pagination-clickable .swiper-pagination-bullet{cursor:pointer}.swiper-pagination-bullet-active{background:#007aff;opacity:1}.swiper-container-vertical>.swiper-pagination-bullets{right:10px;top:50%;-webkit-transform:translate3d(0,-50%,0);transform:translate3d(0,-50%,0)}.swiper-container-vertical>.swiper-pagination-bullets .swiper-pagination-bullet{display:block;margin:6px 0}.swiper-container-vertical>.swiper-pagination-bullets.swiper-pagination-bullets-dynamic{top:50%;-webkit-transform:translateY(-50%);-ms-transform:translateY(-50%);transform:translateY(-50%);width:8px}.swiper-container-vertical>.swiper-pagination-bullets.swiper-pagination-bullets-dynamic .swiper-pagination-bullet{display:inline-block;-webkit-transition:top .2s,-webkit-transform .2s;transition:top .2s,-webkit-transform .2s;transition:transform .2s,top .2s;transition:transform .2s,top .2s,-webkit-transform .2s}.swiper-container-horizontal>.swiper-pagination-bullets .swiper-pagination-bullet{margin:0 4px}.swiper-container-horizontal>.swiper-pagination-bullets.swiper-pagination-bullets-dynamic{left:50%;-webkit-transform:translateX(-50%);-ms-transform:translateX(-50%);transform:translateX(-50%);white-space:nowrap}.swiper-container-horizontal>.swiper-pagination-bullets.swiper-pagination-bullets-dynamic .swiper-pagination-bullet{-webkit-transition:left .2s,-webkit-transform .2s;transition:left .2s,-webkit-transform .2s;transition:transform .2s,left .2s;transition:transform .2s,left .2s,-webkit-transform .2s}.swiper-container-horizontal.swiper-container-rtl>.swiper-pagination-bullets-dynamic .swiper-pagination-bullet{-webkit-transition:right .2s,-webkit-transform .2s;transition:right .2s,-webkit-transform .2s;transition:transform .2s,right .2s;transition:transform .2s,right .2s,-webkit-transform .2s}.swiper-pagination-progressbar{background:rgba(0,0,0,.25);position:absolute}.swiper-pagination-progressbar .swiper-pagination-progressbar-fill{background:#007aff;height:100%;left:0;position:absolute;top:0;-webkit-transform:scale(0);-ms-transform:scale(0);transform:scale(0);-webkit-transform-origin:left top;-ms-transform-origin:left top;transform-origin:left top;width:100%}.swiper-container-rtl .swiper-pagination-progressbar .swiper-pagination-progressbar-fill{-webkit-transform-origin:right top;-ms-transform-origin:right top;transform-origin:right top}.swiper-container-horizontal>.swiper-pagination-progressbar,.swiper-container-vertical>.swiper-pagination-progressbar.swiper-pagination-progressbar-opposite{height:4px;left:0;top:0;width:100%}.swiper-container-horizontal>.swiper-pagination-progressbar.swiper-pagination-progressbar-opposite,.swiper-container-vertical>.swiper-pagination-progressbar{height:100%;left:0;top:0;width:4px}.swiper-pagination-white .swiper-pagination-bullet-active{background:#fff}.swiper-pagination-progressbar.swiper-pagination-white{background:hsla(0,0%,100%,.25)}.swiper-pagination-progressbar.swiper-pagination-white .swiper-pagination-progressbar-fill{background:#fff}.swiper-pagination-black .swiper-pagination-bullet-active{background:#000}.swiper-pagination-progressbar.swiper-pagination-black{background:rgba(0,0,0,.25)}.swiper-pagination-progressbar.swiper-pagination-black .swiper-pagination-progressbar-fill{background:#000}.swiper-pagination-lock{display:none}.swiper-scrollbar{background:rgba(0,0,0,.1);border-radius:10px;position:relative;-ms-touch-action:none}.swiper-container-horizontal>.swiper-scrollbar{bottom:3px;height:5px;left:1%;position:absolute;width:98%;z-index:50}.swiper-container-vertical>.swiper-scrollbar{height:98%;position:absolute;right:3px;top:1%;width:5px;z-index:50}.swiper-scrollbar-drag{background:rgba(0,0,0,.5);border-radius:10px;height:100%;left:0;position:relative;top:0;width:100%}.swiper-scrollbar-cursor-drag{cursor:move}.swiper-scrollbar-lock{display:none}.swiper-zoom-container{-webkit-box-pack:center;-ms-flex-pack:center;-webkit-box-align:center;-ms-flex-align:center;-webkit-align-items:center;align-items:center;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;height:100%;-webkit-justify-content:center;justify-content:center;text-align:center;width:100%}.swiper-zoom-container>canvas,.swiper-zoom-container>img,.swiper-zoom-container>svg{max-height:100%;max-width:100%;-o-object-fit:contain;object-fit:contain}.swiper-slide-zoomed{cursor:move}.swiper-lazy-preloader{-webkit-animation:swiper-preloader-spin 1s steps(12) infinite;animation:swiper-preloader-spin 1s steps(12) infinite;height:42px;left:50%;margin-left:-21px;margin-top:-21px;position:absolute;top:50%;-webkit-transform-origin:50%;-ms-transform-origin:50%;transform-origin:50%;width:42px;z-index:10}.swiper-lazy-preloader:after{background-image:url("data:image/svg+xml;charset=utf-8,%3Csvg viewBox='0 0 120 120' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'%3E%3Cdefs%3E%3Cpath id='a' stroke='%236c6c6c' stroke-width='11' stroke-linecap='round' d='M60 7v20'/%3E%3C/defs%3E%3Cuse xlink:href='%23a' opacity='.27'/%3E%3Cuse xlink:href='%23a' opacity='.27' transform='rotate(30 60 60)'/%3E%3Cuse xlink:href='%23a' opacity='.27' transform='rotate(60 60 60)'/%3E%3Cuse xlink:href='%23a' opacity='.27' transform='rotate(90 60 60)'/%3E%3Cuse xlink:href='%23a' opacity='.27' transform='rotate(120 60 60)'/%3E%3Cuse xlink:href='%23a' opacity='.27' transform='rotate(150 60 60)'/%3E%3Cuse xlink:href='%23a' opacity='.37' transform='rotate(180 60 60)'/%3E%3Cuse xlink:href='%23a' opacity='.46' transform='rotate(210 60 60)'/%3E%3Cuse xlink:href='%23a' opacity='.56' transform='rotate(240 60 60)'/%3E%3Cuse xlink:href='%23a' opacity='.66' transform='rotate(270 60 60)'/%3E%3Cuse xlink:href='%23a' opacity='.75' transform='rotate(300 60 60)'/%3E%3Cuse xlink:href='%23a' opacity='.85' transform='rotate(330 60 60)'/%3E%3C/svg%3E");background-position:50%;background-repeat:no-repeat;background-size:100%;content:"";display:block;height:100%;width:100%}.swiper-lazy-preloader-white:after{background-image:url("data:image/svg+xml;charset=utf-8,%3Csvg viewBox='0 0 120 120' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'%3E%3Cdefs%3E%3Cpath id='a' stroke='%23fff' stroke-width='11' stroke-linecap='round' d='M60 7v20'/%3E%3C/defs%3E%3Cuse xlink:href='%23a' opacity='.27'/%3E%3Cuse xlink:href='%23a' opacity='.27' transform='rotate(30 60 60)'/%3E%3Cuse xlink:href='%23a' opacity='.27' transform='rotate(60 60 60)'/%3E%3Cuse xlink:href='%23a' opacity='.27' transform='rotate(90 60 60)'/%3E%3Cuse xlink:href='%23a' opacity='.27' transform='rotate(120 60 60)'/%3E%3Cuse xlink:href='%23a' opacity='.27' transform='rotate(150 60 60)'/%3E%3Cuse xlink:href='%23a' opacity='.37' transform='rotate(180 60 60)'/%3E%3Cuse xlink:href='%23a' opacity='.46' transform='rotate(210 60 60)'/%3E%3Cuse xlink:href='%23a' opacity='.56' transform='rotate(240 60 60)'/%3E%3Cuse xlink:href='%23a' opacity='.66' transform='rotate(270 60 60)'/%3E%3Cuse xlink:href='%23a' opacity='.75' transform='rotate(300 60 60)'/%3E%3Cuse xlink:href='%23a' opacity='.85' transform='rotate(330 60 60)'/%3E%3C/svg%3E")}@-webkit-keyframes swiper-preloader-spin{to{-webkit-transform:rotate(1turn);transform:rotate(1turn)}}@keyframes swiper-preloader-spin{to{-webkit-transform:rotate(1turn);transform:rotate(1turn)}}.swiper-container .swiper-notification{left:0;opacity:0;pointer-events:none;position:absolute;top:0;z-index:-1000}.swiper-container-fade.swiper-container-free-mode .swiper-slide{-webkit-transition-timing-function:ease-out;transition-timing-function:ease-out}.swiper-container-fade .swiper-slide{pointer-events:none;-webkit-transition-property:opacity;transition-property:opacity}.swiper-container-fade .swiper-slide .swiper-slide{pointer-events:none}.swiper-container-fade .swiper-slide-active,.swiper-container-fade .swiper-slide-active .swiper-slide-active{pointer-events:auto}.swiper-container-cube{overflow:visible}.swiper-container-cube .swiper-slide{-webkit-backface-visibility:hidden;backface-visibility:hidden;height:100%;pointer-events:none;-webkit-transform-origin:0 0;-ms-transform-origin:0 0;transform-origin:0 0;visibility:hidden;width:100%;z-index:1}.swiper-container-cube .swiper-slide .swiper-slide{pointer-events:none}.swiper-container-cube.swiper-container-rtl .swiper-slide{-webkit-transform-origin:100% 0;-ms-transform-origin:100% 0;transform-origin:100% 0}.swiper-container-cube .swiper-slide-active,.swiper-container-cube .swiper-slide-active .swiper-slide-active{pointer-events:auto}.swiper-container-cube .swiper-slide-active,.swiper-container-cube .swiper-slide-next,.swiper-container-cube .swiper-slide-next+.swiper-slide,.swiper-container-cube .swiper-slide-prev{pointer-events:auto;visibility:visible}.swiper-container-cube .swiper-slide-shadow-bottom,.swiper-container-cube .swiper-slide-shadow-left,.swiper-container-cube .swiper-slide-shadow-right,.swiper-container-cube .swiper-slide-shadow-top{-webkit-backface-visibility:hidden;backface-visibility:hidden;z-index:0}.swiper-container-cube .swiper-cube-shadow{background:#000;bottom:0;-webkit-filter:blur(50px);filter:blur(50px);height:100%;left:0;opacity:.6;position:absolute;width:100%;z-index:0}.swiper-container-flip{overflow:visible}.swiper-container-flip .swiper-slide{-webkit-backface-visibility:hidden;backface-visibility:hidden;pointer-events:none;z-index:1}.swiper-container-flip .swiper-slide .swiper-slide{pointer-events:none}.swiper-container-flip .swiper-slide-active,.swiper-container-flip .swiper-slide-active .swiper-slide-active{pointer-events:auto}.swiper-container-flip .swiper-slide-shadow-bottom,.swiper-container-flip .swiper-slide-shadow-left,.swiper-container-flip .swiper-slide-shadow-right,.swiper-container-flip .swiper-slide-shadow-top{-webkit-backface-visibility:hidden;backface-visibility:hidden;z-index:0}.swiper-container-coverflow .swiper-wrapper{-ms-perspective:1200px}</style><style>.modal-mask[data-v-3f78f595]{-webkit-box-align:center;-ms-flex-align:center;-webkit-box-pack:center;-ms-flex-pack:center;box-align:center;box-pack:center;align-items:center;background-color:rgba(0,0,0,.8);-webkit-box-sizing:border-box;box-sizing:border-box;color:#fff;display:-webkit-box;display:-ms-flexbox;display:flex;height:100%;justify-content:center;left:0;padding:10px;position:fixed;top:0;-webkit-transition:opacity .3s ease;transition:opacity .3s ease;width:100%;z-index:9998}.modal-enter[data-v-3f78f595],.modal-leave-active[data-v-3f78f595]{opacity:0}.modal-enter .modal-container[data-v-3f78f595],.modal-leave-active .modal-container[data-v-3f78f595]{-webkit-transform:scale(1.1);transform:scale(1.1)}.swiper-container[data-v-3f78f595]{background-color:#000}.swiper-slide[data-v-3f78f595]{background-position:50%;background-size:cover}.swiper-button-next.swiper-button-disabled[data-v-3f78f595],.swiper-button-prev.swiper-button-disabled[data-v-3f78f595]{opacity:0}*[data-v-3f78f595]{-webkit-box-sizing:border-box;box-sizing:border-box}.vue-lightbox-content[data-v-3f78f595]{margin-bottom:60px;max-width:calc(100vw - 30px);position:relative}.vue-lightbox-header[data-v-3f78f595]{-webkit-box-pack:justify;-ms-flex-pack:justify;display:-webkit-box;display:-ms-flexbox;display:flex;height:40px;justify-content:space-between}.vue-lightbox-close[data-v-3f78f595]{background:none;border:none;cursor:pointer;height:40px;margin-right:-10px;outline:none;padding:10px;position:relative;top:0;vertical-align:bottom;width:40px}.vue-lightbox-figure[data-v-3f78f595]{display:block;margin:0;position:relative}.vue-lightbox-figure .swiper-slide[data-v-3f78f595]{margin:auto}img.vue-lightbox-modal-image[data-v-3f78f595]{cursor:pointer;display:block;height:auto;margin:0 auto;max-height:calc(100vh - 140px);max-width:100%;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none}.vue-lightbox-info[data-v-3f78f595]{background-color:rgba(0,0,0,.7);bottom:0;color:#fff;font-family:Helvetica Neue,Helvetica,Arial,sans-serif;height:40px;position:absolute;text-align:center;visibility:initial;width:100%}.vue-lightbox-info h4[data-v-3f78f595]{font-size:18px;font-weight:500;margin-bottom:10px;margin-top:10px}.vue-lightbox-footer[data-v-3f78f595]{-webkit-box-pack:justify;-ms-flex-pack:justify;-webkit-box-sizing:border-box;box-sizing:border-box;color:#fff;cursor:auto;display:-webkit-box;display:-ms-flexbox;display:flex;justify-content:space-between;left:0;line-height:1.3;padding:5px 0}.vue-lightbox-footer-info[data-v-3f78f595]{-webkit-box-flex:1;display:block;-ms-flex:1 1 0px;flex:1 1 0}.vue-lightbox-footer-count[data-v-3f78f595]{color:hsla(0,0%,100%,.75);font-size:.85em;padding-left:1em}.vue-lightbox-thumbnail-wrapper[data-v-3f78f595]{bottom:10px;height:50px;left:0;margin:0 auto;position:absolute;right:0;text-align:center;top:auto}.vue-lightbox-thumbnail[data-v-3f78f595]{bottom:10px;display:inline-block;height:50px;padding:0 50px;position:relative;text-align:center;white-space:nowrap;width:300px}.vue-lightbox-thumbnail .swiper-container[data-v-3f78f595]{background:transparent}.vue-lightbox-thumbnail-arrow[data-v-3f78f595]{background:none;border:none;border-radius:4px;cursor:pointer;height:50px;margin-top:-23px;outline:none;padding:10px;position:absolute;top:50%;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;width:30px}.vue-lightbox-thumbnail-left[data-v-3f78f595]{left:10px}.vue-lightbox-thumbnail-right[data-v-3f78f595]{right:10px}.vue-lightbox-modal-thumbnail[data-v-3f78f595],.vue-lightbox-modal-thumbnail-active[data-v-3f78f595]{background-position:50%;background-size:cover;border-radius:2px;cursor:pointer;display:inline-block;float:left;height:50px;margin:2px;overflow:hidden;width:50px}.vue-lightbox-modal-thumbnail[data-v-3f78f595]{-webkit-box-shadow:inset 0 0 0 1px hsla(0,0%,100%,.2);box-shadow:inset 0 0 0 1px hsla(0,0%,100%,.2)}.swiper-slide-active .vue-lightbox-modal-thumbnail[data-v-3f78f595]{-webkit-box-shadow:inset 0 0 0 2px #fff;box-shadow:inset 0 0 0 2px #fff}.vue-lightbox-arrow[data-v-3f78f595]{background:none;border:none;border-radius:4px;cursor:pointer;height:120px;margin-top:-60px;outline:none;padding:10px;position:absolute;top:50%;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;width:40px}.vue-lightbox-left[data-v-3f78f595]{left:10px}.vue-lightbox-right[data-v-3f78f595]{right:10px}@media (min-width:1200px){.vue-lightbox-content[data-v-3f78f595]{max-width:1024px}}@media (min-width:768px){.vue-lightbox-arrow[data-v-3f78f595]{width:70px}}@media (min-width:500px){.vue-lightbox-thumbnail-arrow[data-v-3f78f595]{width:40px}}</style><style>.text-small[data-v-6ff5a0de]{font-size:11px}.position-relative[data-v-6ff5a0de]{position:relative}.position-absolute[data-v-6ff5a0de]{position:absolute}.text-center[data-v-6ff5a0de]{text-align:center}.text-primary[data-v-6ff5a0de]{color:#2fa3e6}.display-flex[data-v-6ff5a0de]{display:-webkit-box;display:-ms-flexbox;display:flex}.flex-column[data-v-6ff5a0de]{-webkit-box-orient:vertical;-webkit-box-direction:normal;-ms-flex-direction:column;flex-direction:column}.flex-wrap[data-v-6ff5a0de]{-ms-flex-wrap:wrap;flex-wrap:wrap}.justify-content-center[data-v-6ff5a0de]{-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center}.justify-content-between[data-v-6ff5a0de]{-webkit-box-pack:justify;-ms-flex-pack:justify;justify-content:space-between}.justify-content-end[data-v-6ff5a0de]{-webkit-box-pack:end;-ms-flex-pack:end;justify-content:flex-end}.align-items-center[data-v-6ff5a0de]{-webkit-box-align:center;-ms-flex-align:center;align-items:center}.full-width[data-v-6ff5a0de]{width:100%}.full-height[data-v-6ff5a0de]{height:100%}.cursor-pointer[data-v-6ff5a0de]{cursor:pointer}.centered[data-v-6ff5a0de]{display:block;left:50%;position:absolute;top:50%;-webkit-transform:translate(-50%,-50%);transform:translate(-50%,-50%)}.image-container[data-v-6ff5a0de]{background-color:#fff;border:1px dashed #d6d6d6;border-radius:4px;height:180px;width:190px}.image-center[data-v-6ff5a0de]{height:100%;width:100%}.image-icon-drag[data-v-6ff5a0de]{fill:#c9c8c8;height:50px;width:50px}.drag-text[data-v-6ff5a0de]{color:#777;font-weight:400;line-height:1.5;padding-top:5px}.browse-text[data-v-6ff5a0de]{color:#206ec5;font-size:86%;text-decoration:none}.image-input[data-v-6ff5a0de]{bottom:0;left:0;opacity:0;overflow:hidden;top:0}.image-input label[data-v-6ff5a0de]{display:block}.drag-upload-cover[data-v-6ff5a0de]{background:#fcfeff;border:2px dashed #268ddd;bottom:0;font-size:20px;font-weight:400;left:0;margin:5px;opacity:.9;right:0;top:0;z-index:1}.icon-drag-drop[data-v-6ff5a0de]{fill:#2fa3e6;height:50px;width:50px}.drop-text-here[data-v-6ff5a0de]{line-height:1.5;margin:0}.display-none[data-v-6ff5a0de]{display:none}.image-list[data-v-6ff5a0de]{border:1px solid #d6d6d6}.preview-image[data-v-6ff5a0de]{border-radius:15px;-webkit-box-sizing:border-box;box-sizing:border-box;height:140px;padding:5px}.image-overlay[data-v-6ff5a0de]{background:rgba(0,0,0,.7);border-radius:5px;opacity:0;-webkit-transition:all .3s ease-in-out 0s;transition:all .3s ease-in-out 0s;z-index:10}.image-overlay-details[data-v-6ff5a0de]{opacity:0;position:absolute;top:50%;-webkit-transform:translateY(-50%);transform:translateY(-50%);z-index:11}.icon-overlay[data-v-6ff5a0de]{fill:#fff;height:40px;width:40px}.preview-image:hover .image-overlay[data-v-6ff5a0de],.preview-image:hover .image-overlay-details[data-v-6ff5a0de]{opacity:1}.img-responsive[data-v-6ff5a0de]{display:block;height:auto;max-width:100%}.show-img[data-v-6ff5a0de]{display:block;max-height:100px;max-width:140px;vertical-align:middle}.image-bottom[data-v-6ff5a0de]{bottom:0;-webkit-box-sizing:border-box;box-sizing:border-box;height:40px;left:0;padding:5px 10px}.image-primary[data-v-6ff5a0de]{background-color:#e3edf7;border-radius:4px;font-size:11px;margin-right:5px;padding:3px 7px}.image-icon-primary[data-v-6ff5a0de]{height:10px;margin-right:2px;width:10px}.image-icon-delete[data-v-6ff5a0de]{fill:#222;height:14px;width:14px}.image-edit[data-v-6ff5a0de]{margin-right:10px}.image-icon-edit[data-v-6ff5a0de]{fill:#222;height:14px;width:14px}.image-list-container[data-v-6ff5a0de]{margin-top:10px;max-width:190px;min-height:50px}.image-list-container .image-list-item[data-v-6ff5a0de]{border:1px solid #d6d6d6;border-radius:4px;height:32px;width:32px}.image-list-container .image-list-item[data-v-6ff5a0de]:not(:last-child){margin-bottom:5px;margin-right:5px}.image-list-container .image-list-item .show-img[data-v-6ff5a0de]{max-height:17px;max-width:25px}.image-list-container .image-highlight[data-v-6ff5a0de]{border:1px solid #2fa3e7}.add-image-svg[data-v-6ff5a0de]{fill:#222;height:12px;width:12px}.input-add-image[data-v-6ff5a0de]{bottom:0;left:0;opacity:0;overflow:hidden;top:0;z-index:11}.input-add-image label[data-v-6ff5a0de]{display:block}.image-icon-info[data-v-6ff5a0de]{fill:#222;height:14px;width:14px}.mark-text-primary[data-v-6ff5a0de]{color:#034694}.popper-custom[data-v-6ff5a0de]{background:#000;border:none;-webkit-box-shadow:none;box-shadow:none;color:#fff;font-size:12px;padding:10px;text-align:left}</style><style>.popper-custom .popper__arrow{border-color:#000 transparent transparent!important}</style><style>.flag-icon,.flag-icon-background{background-position:50%;background-repeat:no-repeat;background-size:contain}.flag-icon{display:inline-block;line-height:1em;position:relative;width:1.33333333em}.flag-icon:before{content:"\00a0"}.flag-icon.flag-icon-squared{width:1em}.flag-icon-ad{background-image:url(/images/vendor/flag-icon-css/flags/4x3/ad.svg?ca31a793a936aace4d628fb6cacacdb9)}.flag-icon-ad.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/ad.svg?4e6818265b038b774e92c98b548e64c0)}.flag-icon-ae{background-image:url(/images/vendor/flag-icon-css/flags/4x3/ae.svg?d6dbe72b1c0c91eb290d8de1d1464d0a)}.flag-icon-ae.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/ae.svg?70d0c456552e044fba7916e8f13e76ea)}.flag-icon-af{background-image:url(/images/vendor/flag-icon-css/flags/4x3/af.svg?3edf6ac55b1034f0d28cce8ffb568ac7)}.flag-icon-af.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/af.svg?1c6658c2ea9508435fa3c22c313ff9dd)}.flag-icon-ag{background-image:url(/images/vendor/flag-icon-css/flags/4x3/ag.svg?02bcf9e64b55190e587d40b45904065b)}.flag-icon-ag.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/ag.svg?c1a8f4de272eb5d5964d0bca2552c37a)}.flag-icon-ai{background-image:url(/images/vendor/flag-icon-css/flags/4x3/ai.svg?bf2bb51d67f3de45a12b57ea87a1e3dc)}.flag-icon-ai.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/ai.svg?5d494fc607400d8c11c3e23783b38355)}.flag-icon-al{background-image:url(/images/vendor/flag-icon-css/flags/4x3/al.svg?0c8f35616f3b4b85efa8b003b12f0d7c)}.flag-icon-al.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/al.svg?86d9a39d338c16f400818ac57d9d0885)}.flag-icon-am{background-image:url(/images/vendor/flag-icon-css/flags/4x3/am.svg?0d5a20b88add27ad82af6f80446e9842)}.flag-icon-am.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/am.svg?1ca356bbb2de15ec18ddcc1cfed62847)}.flag-icon-ao{background-image:url(/images/vendor/flag-icon-css/flags/4x3/ao.svg?12686c0e54f1c7dade6a3ebdc6257588)}.flag-icon-ao.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/ao.svg?18a0fbe03cc5a890b7c213ca726b9678)}.flag-icon-aq{background-image:url(/images/vendor/flag-icon-css/flags/4x3/aq.svg?f30ea4ab70f763cf650fd6ec23f9f2b6)}.flag-icon-aq.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/aq.svg?4fc98efbdebd65938d14fd98439aa017)}.flag-icon-ar{background-image:url(/images/vendor/flag-icon-css/flags/4x3/ar.svg?a6308b511c3a2d2227fa22d77c1fff30)}.flag-icon-ar.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/ar.svg?56f01add79604fd88a74a0fc121b5b87)}.flag-icon-as{background-image:url(/images/vendor/flag-icon-css/flags/4x3/as.svg?6799736fbb80fd1bddbc4dbfea24feaf)}.flag-icon-as.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/as.svg?cf35c4479c97315880dc9b2eb259319b)}.flag-icon-at{background-image:url(/images/vendor/flag-icon-css/flags/4x3/at.svg?5309bda704bf6ba0cfb8a15b9658433a)}.flag-icon-at.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/at.svg?cade06b2a264aaa2558c3962c149a704)}.flag-icon-au{background-image:url(/images/vendor/flag-icon-css/flags/4x3/au.svg?94a2e0cd6c36e044c482710e6666a72c)}.flag-icon-au.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/au.svg?d8cbaad8b2310cf7e17442d491b10486)}.flag-icon-aw{background-image:url(/images/vendor/flag-icon-css/flags/4x3/aw.svg?de558b83521f73d7337eb1c5d8a70245)}.flag-icon-aw.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/aw.svg?f6ec5a962bdc3414c3f7451842433196)}.flag-icon-ax{background-image:url(/images/vendor/flag-icon-css/flags/4x3/ax.svg?10c85636250faa8673a922d00369b636)}.flag-icon-ax.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/ax.svg?84b40d6bf360f3a0da41e7303f0ba4ad)}.flag-icon-az{background-image:url(/images/vendor/flag-icon-css/flags/4x3/az.svg?c03b04167198f809a2c501553614bbac)}.flag-icon-az.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/az.svg?b685312e3bbe25dc448b45618c99490c)}.flag-icon-ba{background-image:url(/images/vendor/flag-icon-css/flags/4x3/ba.svg?1d0373f7dca222babc03684f5a416467)}.flag-icon-ba.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/ba.svg?6f76da08b2ed31ec0fd5fa63e3f4b75b)}.flag-icon-bb{background-image:url(/images/vendor/flag-icon-css/flags/4x3/bb.svg?46ccdb98b09fb56324f886475e559ec3)}.flag-icon-bb.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/bb.svg?ce8190938341170ebec1bf43ca999f51)}.flag-icon-bd{background-image:url(/images/vendor/flag-icon-css/flags/4x3/bd.svg?7a30395b2f93bfd130e14ffa5a5065da)}.flag-icon-bd.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/bd.svg?29abbae7e798681c33e637ff203c0e2d)}.flag-icon-be{background-image:url(/images/vendor/flag-icon-css/flags/4x3/be.svg?ae873fc082ea79d67af9bb1979f5c29c)}.flag-icon-be.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/be.svg?584d2a3ff14e653bb22aa6a46b8069fb)}.flag-icon-bf{background-image:url(/images/vendor/flag-icon-css/flags/4x3/bf.svg?ee6777409fbfbd1fc2326f97672037c6)}.flag-icon-bf.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/bf.svg?a0697cd783c05a37c5093abc962d3190)}.flag-icon-bg{background-image:url(/images/vendor/flag-icon-css/flags/4x3/bg.svg?a7d1a4f049fa79946b67a6e5a2a1c65c)}.flag-icon-bg.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/bg.svg?aa63aa72ec006dc7a6af51904eb8ef13)}.flag-icon-bh{background-image:url(/images/vendor/flag-icon-css/flags/4x3/bh.svg?92f2a89e21cbc16190c571b8d6e9e489)}.flag-icon-bh.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/bh.svg?d0436d0be069e32dc837608a0941bab5)}.flag-icon-bi{background-image:url(/images/vendor/flag-icon-css/flags/4x3/bi.svg?b1421422e30f6e34abf436d199b2e958)}.flag-icon-bi.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/bi.svg?aa8e3ffc467fc5cdf9cccdbe286c5606)}.flag-icon-bj{background-image:url(/images/vendor/flag-icon-css/flags/4x3/bj.svg?b0825519a8b4028c26d1c19e8ed418ff)}.flag-icon-bj.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/bj.svg?328bc662f5f4247b417d8bd2509697dd)}.flag-icon-bl{background-image:url(/images/vendor/flag-icon-css/flags/4x3/bl.svg?42145fe6a1251343a271ad7aeea64e90)}.flag-icon-bl.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/bl.svg?64d62940863a8e888e798688a641c724)}.flag-icon-bm{background-image:url(/images/vendor/flag-icon-css/flags/4x3/bm.svg?d459fce0b62e27fc5d04653ecbacacd3)}.flag-icon-bm.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/bm.svg?b66fbda5766d21b7afdaf7b55d0ebc83)}.flag-icon-bn{background-image:url(/images/vendor/flag-icon-css/flags/4x3/bn.svg?bd6ba1f4d7aa1e46b6e10389f8bca067)}.flag-icon-bn.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/bn.svg?dcf92219f4698c34c864e115618c9360)}.flag-icon-bo{background-image:url(/images/vendor/flag-icon-css/flags/4x3/bo.svg?134662950791c2ba51c66093a0f0be61)}.flag-icon-bo.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/bo.svg?d18ef8e4572adfbc6f3e97bbf737e747)}.flag-icon-bq{background-image:url(/images/vendor/flag-icon-css/flags/4x3/bq.svg?606dd5875941d39f7c12d4dde86cc04e)}.flag-icon-bq.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/bq.svg?56a8eaed36f618f1a0c54ccb4573860e)}.flag-icon-br{background-image:url(/images/vendor/flag-icon-css/flags/4x3/br.svg?ed4137cfd44daa13ea498a942f08cd1b)}.flag-icon-br.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/br.svg?982a3b577796cc15326ffb5cd1f5af53)}.flag-icon-bs{background-image:url(/images/vendor/flag-icon-css/flags/4x3/bs.svg?e6d66fa2d415babf0b2abd41d5b48c02)}.flag-icon-bs.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/bs.svg?6d51c666f25a3cc44b13e1aab2533424)}.flag-icon-bt{background-image:url(/images/vendor/flag-icon-css/flags/4x3/bt.svg?cf9596dedd2478ca2fd0f758eef1010f)}.flag-icon-bt.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/bt.svg?48d7291640afe3dada24f40f1c996af1)}.flag-icon-bv{background-image:url(/images/vendor/flag-icon-css/flags/4x3/bv.svg?ad7cca2596d6d9a95ba559f7bc2150d4)}.flag-icon-bv.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/bv.svg?fef2fc113c7bdfe18a2beb0b5f16e460)}.flag-icon-bw{background-image:url(/images/vendor/flag-icon-css/flags/4x3/bw.svg?84fd039a0d9309eea30a23fafa4d19ce)}.flag-icon-bw.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/bw.svg?3e6fc9f41addf6e20443187ac3e861fe)}.flag-icon-by{background-image:url(/images/vendor/flag-icon-css/flags/4x3/by.svg?f59e5e2a62b34fa8f392d75c60e385ab)}.flag-icon-by.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/by.svg?aff3158e0eb4008c582009ffa80c48de)}.flag-icon-bz{background-image:url(/images/vendor/flag-icon-css/flags/4x3/bz.svg?bdc3e89f02c74252734cfe17d9bef2a9)}.flag-icon-bz.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/bz.svg?73089ddb0e1ff5a15e4e846aa1709903)}.flag-icon-ca{background-image:url(/images/vendor/flag-icon-css/flags/4x3/ca.svg?35dd01991458aa7271c4f772aad11f8e)}.flag-icon-ca.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/ca.svg?33a9f69ef0fded0301f3de7d42a587e0)}.flag-icon-cc{background-image:url(/images/vendor/flag-icon-css/flags/4x3/cc.svg?29a6a20c83da130db09761469345bb66)}.flag-icon-cc.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/cc.svg?bc89abfd5c276fc2db7b0396c891bc88)}.flag-icon-cd{background-image:url(/images/vendor/flag-icon-css/flags/4x3/cd.svg?f5e1294f8e517b15a527719d091ee9e1)}.flag-icon-cd.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/cd.svg?b5930509395a9e2e88983b6e13d15f55)}.flag-icon-cf{background-image:url(/images/vendor/flag-icon-css/flags/4x3/cf.svg?542a8c123b3c19f53fbc0c95b3b32ed6)}.flag-icon-cf.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/cf.svg?b76072bd60584d047dd19553f5305ea3)}.flag-icon-cg{background-image:url(/images/vendor/flag-icon-css/flags/4x3/cg.svg?6c02ddb7f4311a74692cb1ba1ba218bd)}.flag-icon-cg.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/cg.svg?242ffce625364b9fc2df79b290fec296)}.flag-icon-ch{background-image:url(/images/vendor/flag-icon-css/flags/4x3/ch.svg?ab7dda100b5bbf81412c71bb4b772834)}.flag-icon-ch.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/ch.svg?cd82f1bd179250432724ae0670988131)}.flag-icon-ci{background-image:url(/images/vendor/flag-icon-css/flags/4x3/ci.svg?92d4ba02727e231ec072ee5b88bf716a)}.flag-icon-ci.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/ci.svg?34147624583aa265823f90df709ec146)}.flag-icon-ck{background-image:url(/images/vendor/flag-icon-css/flags/4x3/ck.svg?749147077a09d8f95e03ea62a8aa3d1b)}.flag-icon-ck.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/ck.svg?aa585998b7c4cf811a9b5c35e096ef99)}.flag-icon-cl{background-image:url(/images/vendor/flag-icon-css/flags/4x3/cl.svg?7635ca9790694127711254f8270ceb45)}.flag-icon-cl.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/cl.svg?f6e198b7246a41581257af9a8c67cadb)}.flag-icon-cm{background-image:url(/images/vendor/flag-icon-css/flags/4x3/cm.svg?217204e81f8ef50081515caea8dfab03)}.flag-icon-cm.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/cm.svg?8ba1901dc25cb0a8a41b6061598ba0d6)}.flag-icon-cn{background-image:url(/images/vendor/flag-icon-css/flags/4x3/cn.svg?98d6f169ac7a66efed4d5df8ff3c910b)}.flag-icon-cn.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/cn.svg?7bd73c73045e936f77704eb86e7658db)}.flag-icon-co{background-image:url(/images/vendor/flag-icon-css/flags/4x3/co.svg?36a0e0e10fe4d2b22f42538d24b8f224)}.flag-icon-co.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/co.svg?7dd18389cb74b0585646f38bc42d7545)}.flag-icon-cr{background-image:url(/images/vendor/flag-icon-css/flags/4x3/cr.svg?f3b91dfaac3611a2bb56653e64e770c6)}.flag-icon-cr.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/cr.svg?79a1512a51e209c1fa99418a8f098b74)}.flag-icon-cu{background-image:url(/images/vendor/flag-icon-css/flags/4x3/cu.svg?f33777307068cda04f1e8de4b846e75b)}.flag-icon-cu.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/cu.svg?0cd43a07a932962403f947175cc765be)}.flag-icon-cv{background-image:url(/images/vendor/flag-icon-css/flags/4x3/cv.svg?5779e00be9a36ac84200aa9c0bc345dd)}.flag-icon-cv.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/cv.svg?cec36e11610eb181019d6e9bd3e07f65)}.flag-icon-cw{background-image:url(/images/vendor/flag-icon-css/flags/4x3/cw.svg?81ac7a6fc60f33b11f8d2f45976e7eb1)}.flag-icon-cw.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/cw.svg?ce5edd6edc19273f4673592a77ad2327)}.flag-icon-cx{background-image:url(/images/vendor/flag-icon-css/flags/4x3/cx.svg?d4d3fe794c045f3157254fcad2c8d4c7)}.flag-icon-cx.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/cx.svg?15a4d0445be88cc0205ebd80357c94c0)}.flag-icon-cy{background-image:url(/images/vendor/flag-icon-css/flags/4x3/cy.svg?254506ce880e90b3c0cd2596a2a3920f)}.flag-icon-cy.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/cy.svg?bdb28a90d3a0bbe9b9bebe986ed204de)}.flag-icon-cz{background-image:url(/images/vendor/flag-icon-css/flags/4x3/cz.svg?c0c9d9a505678e515514bdbe8575e48c)}.flag-icon-cz.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/cz.svg?35da24ee02e443761bba7d11a57577e8)}.flag-icon-de{background-image:url(/images/vendor/flag-icon-css/flags/4x3/de.svg?888f6bdce53030a6e80f35b799e05b3c)}.flag-icon-de.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/de.svg?e5b6eff3dd5717d7ec47f8837f649973)}.flag-icon-dj{background-image:url(/images/vendor/flag-icon-css/flags/4x3/dj.svg?189ca57c7abd43199551fef2c36bdc7d)}.flag-icon-dj.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/dj.svg?b9c13f96b40013b6794e48eecc051f20)}.flag-icon-dk{background-image:url(/images/vendor/flag-icon-css/flags/4x3/dk.svg?fc98a12960b87d3b9e0758443d54cf84)}.flag-icon-dk.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/dk.svg?54a9d51d194e2a62a8c29220eacd3a25)}.flag-icon-dm{background-image:url(/images/vendor/flag-icon-css/flags/4x3/dm.svg?13b72fbecbdf1ccf78091f0f2819b5a9)}.flag-icon-dm.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/dm.svg?89e9bc15570e32aaf58d7fc334f36b71)}.flag-icon-do{background-image:url(/images/vendor/flag-icon-css/flags/4x3/do.svg?b9b509413af90ea6f5773e2889e18ad1)}.flag-icon-do.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/do.svg?aadafa905aa978f337afb93b57e26042)}.flag-icon-dz{background-image:url(/images/vendor/flag-icon-css/flags/4x3/dz.svg?a4060b64ec782b9d491bf8836040c311)}.flag-icon-dz.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/dz.svg?f2045402a84a8cd6f44774685ba28b5c)}.flag-icon-ec{background-image:url(/images/vendor/flag-icon-css/flags/4x3/ec.svg?9f4a6c3a4146a5ce960c258c1eae941b)}.flag-icon-ec.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/ec.svg?c35ac1e031a1b0d15a1c47eac3e003ef)}.flag-icon-ee{background-image:url(/images/vendor/flag-icon-css/flags/4x3/ee.svg?e8920bf0542ed7d1e49b5132952f5304)}.flag-icon-ee.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/ee.svg?cfa469c9370fd094639cb4ba88dbbc1f)}.flag-icon-eg{background-image:url(/images/vendor/flag-icon-css/flags/4x3/eg.svg?cc70ccd77020873ecbb9ee4d4f69e58c)}.flag-icon-eg.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/eg.svg?5d7ea40f0a98cf31df4c74e34c6bc04f)}.flag-icon-eh{background-image:url(/images/vendor/flag-icon-css/flags/4x3/eh.svg?362f24810003916e23644fbc7b66d8bf)}.flag-icon-eh.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/eh.svg?818ebb2120411159f0ea1db962e64421)}.flag-icon-er{background-image:url(/images/vendor/flag-icon-css/flags/4x3/er.svg?8186bf8d55de0b12503b34248027f2af)}.flag-icon-er.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/er.svg?cee4e6b1998f34617aa46d0f369b94b6)}.flag-icon-es{background-image:url(/images/vendor/flag-icon-css/flags/4x3/es.svg?5399741c6f0109f01162f09fd448e079)}.flag-icon-es.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/es.svg?942d2dd937ee45aadc6f27f8c92a6119)}.flag-icon-et{background-image:url(/images/vendor/flag-icon-css/flags/4x3/et.svg?af379dccd7cf32303aac3486093a4b6a)}.flag-icon-et.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/et.svg?8e565b598fbd75d3d21639fd87f74925)}.flag-icon-fi{background-image:url(/images/vendor/flag-icon-css/flags/4x3/fi.svg?6147315aa1e35f139e8db08e033f3941)}.flag-icon-fi.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/fi.svg?87640d6664c0abf95e9b30580522b4c4)}.flag-icon-fj{background-image:url(/images/vendor/flag-icon-css/flags/4x3/fj.svg?897bc8adca0bbd54b558a2019031d28f)}.flag-icon-fj.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/fj.svg?c5373bc1af88b4bcbdee1e02153a9987)}.flag-icon-fk{background-image:url(/images/vendor/flag-icon-css/flags/4x3/fk.svg?eb650a35194366974b1355359c4d8555)}.flag-icon-fk.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/fk.svg?4c73d0450a16c94156c362b9f94f0b59)}.flag-icon-fm{background-image:url(/images/vendor/flag-icon-css/flags/4x3/fm.svg?feb0dd190dfb09c78184e2129eefa70b)}.flag-icon-fm.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/fm.svg?2a7ec9a42e7d6b7d431c953626cde6b7)}.flag-icon-fo{background-image:url(/images/vendor/flag-icon-css/flags/4x3/fo.svg?be7dab642db4b6fac975ebbd720aa357)}.flag-icon-fo.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/fo.svg?004abd278ea2eb329c51f5ca384f7d01)}.flag-icon-fr{background-image:url(/images/vendor/flag-icon-css/flags/4x3/fr.svg?da032352a4efd19ac25aa1cb0c2da3cd)}.flag-icon-fr.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/fr.svg?6c3ca007bebd2dff9fc8acf1c31c5afb)}.flag-icon-ga{background-image:url(/images/vendor/flag-icon-css/flags/4x3/ga.svg?656c7fedf6bc69dd79d16b65bff7037d)}.flag-icon-ga.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/ga.svg?44cfa6ef3d1c5f62d26dd8d958eae96b)}.flag-icon-gb{background-image:url(/images/vendor/flag-icon-css/flags/4x3/gb.svg?a063eb2f1d9579017098c5afb1e850e3)}.flag-icon-gb.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/gb.svg?c29f2b772b5b83007a3307276161bb46)}.flag-icon-gd{background-image:url(/images/vendor/flag-icon-css/flags/4x3/gd.svg?f881a0d2ea7719d39685fb72b12121c6)}.flag-icon-gd.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/gd.svg?71f68a5b8208cdf6234073b4bff12f91)}.flag-icon-ge{background-image:url(/images/vendor/flag-icon-css/flags/4x3/ge.svg?0d56bacc20b37fdcbbca0ca6071d6331)}.flag-icon-ge.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/ge.svg?4bc65ccf19160b54d73d4af559de8015)}.flag-icon-gf{background-image:url(/images/vendor/flag-icon-css/flags/4x3/gf.svg?317ee07d2728c97b15f01e5e22b532f8)}.flag-icon-gf.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/gf.svg?c0dcbfef2b6a5ac75d4a8920754a75d9)}.flag-icon-gg{background-image:url(/images/vendor/flag-icon-css/flags/4x3/gg.svg?2645dca345466de0c97ffa7d6ea951dc)}.flag-icon-gg.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/gg.svg?2cc5f5189f23bfce623b740fdc67ead3)}.flag-icon-gh{background-image:url(/images/vendor/flag-icon-css/flags/4x3/gh.svg?e14d619d2991f5eb26416f4046613894)}.flag-icon-gh.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/gh.svg?51180bece865d9feeb98bd1cb91ba46e)}.flag-icon-gi{background-image:url(/images/vendor/flag-icon-css/flags/4x3/gi.svg?edc0a90556507b115001570dd08a645e)}.flag-icon-gi.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/gi.svg?344648c04d989ea7d0957fbe5e2d4463)}.flag-icon-gl{background-image:url(/images/vendor/flag-icon-css/flags/4x3/gl.svg?5482d73939a64c274602796bcf4589f6)}.flag-icon-gl.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/gl.svg?b9bb3aa61d7157ebd7535e0fe66ac9b9)}.flag-icon-gm{background-image:url(/images/vendor/flag-icon-css/flags/4x3/gm.svg?f42f77707f1ab37d7bb19078db7936e5)}.flag-icon-gm.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/gm.svg?46bec36c79ececa9a758d889abfabf25)}.flag-icon-gn{background-image:url(/images/vendor/flag-icon-css/flags/4x3/gn.svg?be503e12b5bb96bc525bbe8141a5f91c)}.flag-icon-gn.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/gn.svg?d57c83640b77df88902b8d0c01e35111)}.flag-icon-gp{background-image:url(/images/vendor/flag-icon-css/flags/4x3/gp.svg?ec5c714d6742bfeb8be24bee5683dc93)}.flag-icon-gp.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/gp.svg?5896e949d5c9810ff13c20f8b285647c)}.flag-icon-gq{background-image:url(/images/vendor/flag-icon-css/flags/4x3/gq.svg?8094747272b38dab18712c943b73d4cd)}.flag-icon-gq.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/gq.svg?6579b4b16dff0ab8e16bda9702e5fb49)}.flag-icon-gr{background-image:url(/images/vendor/flag-icon-css/flags/4x3/gr.svg?eac01dcd2c839b33cb54cc0b62e62f22)}.flag-icon-gr.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/gr.svg?5480c7c9b3c31d8579d70d6218b16f26)}.flag-icon-gs{background-image:url(/images/vendor/flag-icon-css/flags/4x3/gs.svg?0216ae6087986fe857aef8a9fb56d77b)}.flag-icon-gs.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/gs.svg?ff23b3eca6b0e8bf9a7ea45bf47e628d)}.flag-icon-gt{background-image:url(/images/vendor/flag-icon-css/flags/4x3/gt.svg?a3fb60698fc52d78477df7c2a0c568c5)}.flag-icon-gt.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/gt.svg?c4ec06d93fa3945dc4a5fa759cb75d79)}.flag-icon-gu{background-image:url(/images/vendor/flag-icon-css/flags/4x3/gu.svg?127e67ee10729427919d7d89dba598b3)}.flag-icon-gu.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/gu.svg?b0009474885a729f6e039fbba4150cbd)}.flag-icon-gw{background-image:url(/images/vendor/flag-icon-css/flags/4x3/gw.svg?40e7b7d27af3f239f2913c48c1f1ebf8)}.flag-icon-gw.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/gw.svg?5d7e5d20476e96e2f76d894a894eedb2)}.flag-icon-gy{background-image:url(/images/vendor/flag-icon-css/flags/4x3/gy.svg?507baf962a6d394365ea1dfe1007b4c4)}.flag-icon-gy.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/gy.svg?55fe67473c4b7e1d63feafcad26bafc5)}.flag-icon-hk{background-image:url(/images/vendor/flag-icon-css/flags/4x3/hk.svg?a4e9643c21d3a2e3f519de0b5c8802d9)}.flag-icon-hk.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/hk.svg?1eb36876408074ac37856a4f9e5bae0c)}.flag-icon-hm{background-image:url(/images/vendor/flag-icon-css/flags/4x3/hm.svg?6837577b2861110dc1006e05e70155b7)}.flag-icon-hm.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/hm.svg?9a25dd694f13a21cf5074922307c5f4a)}.flag-icon-hn{background-image:url(/images/vendor/flag-icon-css/flags/4x3/hn.svg?9140ac8170526aebca9f5b27fb5d6907)}.flag-icon-hn.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/hn.svg?8e1134e5130a0341e976aa30990679b2)}.flag-icon-hr{background-image:url(/images/vendor/flag-icon-css/flags/4x3/hr.svg?08dfb4c1440307bc11aea776ddd09fb7)}.flag-icon-hr.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/hr.svg?1574acf8c559b60912811e204d4be9a1)}.flag-icon-ht{background-image:url(/images/vendor/flag-icon-css/flags/4x3/ht.svg?c42053a84a02ae87fc5ed2cbfd43c26d)}.flag-icon-ht.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/ht.svg?5fd55b7bfd3b949fa4b49e7dd7e3d9ed)}.flag-icon-hu{background-image:url(/images/vendor/flag-icon-css/flags/4x3/hu.svg?5b5c4c8373e5f208d3acd819489dc0cc)}.flag-icon-hu.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/hu.svg?9f41982655454b0091353938aa279810)}.flag-icon-id{background-image:url(/images/vendor/flag-icon-css/flags/4x3/id.svg?915dbe7cfc0e2733a808c5143e631df5)}.flag-icon-id.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/id.svg?f6d0e03c304f06de913cd5a452b3b2f2)}.flag-icon-ie{background-image:url(/images/vendor/flag-icon-css/flags/4x3/ie.svg?a3d22622729fbbb14da9196895f69f03)}.flag-icon-ie.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/ie.svg?793ac951707d82ed318d823f702d47d8)}.flag-icon-il{background-image:url(/images/vendor/flag-icon-css/flags/4x3/il.svg?3dba417ae18611c0f9c6bc37f86595c5)}.flag-icon-il.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/il.svg?a30dcc6e7de8a94e71ec503cfc47b797)}.flag-icon-im{background-image:url(/images/vendor/flag-icon-css/flags/4x3/im.svg?d70438cbae06b6ff5aac7456917d158c)}.flag-icon-im.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/im.svg?b7ec5e981260b50cf3277e50a3d709ad)}.flag-icon-in{background-image:url(/images/vendor/flag-icon-css/flags/4x3/in.svg?ff7549f7f779430e01aa3a5a1b7ead64)}.flag-icon-in.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/in.svg?47c9639e0e302fd00a43bb2669ead477)}.flag-icon-io{background-image:url(/images/vendor/flag-icon-css/flags/4x3/io.svg?51e37fc19eeea15825cce05e2ae8c7c6)}.flag-icon-io.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/io.svg?dd268477a0d98b30acca655e8fed7e47)}.flag-icon-iq{background-image:url(/images/vendor/flag-icon-css/flags/4x3/iq.svg?fccaaef97d971ff7c84e772a97e90f8e)}.flag-icon-iq.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/iq.svg?6c440f1628ae077672bf1ec59fab7faa)}.flag-icon-ir{background-image:url(/images/vendor/flag-icon-css/flags/4x3/ir.svg?7ffbb75e40eb98fe7410b40734412cda)}.flag-icon-ir.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/ir.svg?63ab499d8d6dc2ae925ad7f6592e8388)}.flag-icon-is{background-image:url(/images/vendor/flag-icon-css/flags/4x3/is.svg?542a47fe6652001b3dfdab820016e4cf)}.flag-icon-is.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/is.svg?fa365b4a8b08ccc4f866dd4bda8e8d22)}.flag-icon-it{background-image:url(/images/vendor/flag-icon-css/flags/4x3/it.svg?fd6a03b76b2a20eb3aea6309ba32dad3)}.flag-icon-it.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/it.svg?e3b5b571e882e35c6fa17f13a23bbd2a)}.flag-icon-je{background-image:url(/images/vendor/flag-icon-css/flags/4x3/je.svg?428ee52a62f1f269fac441b2466b381a)}.flag-icon-je.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/je.svg?2e1c62b3548c0276af44cf7872bbd4f0)}.flag-icon-jm{background-image:url(/images/vendor/flag-icon-css/flags/4x3/jm.svg?d3cc5212b7096dd7cbaee2e9728a4a2f)}.flag-icon-jm.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/jm.svg?f0713d344513d9d14284db0bc27a7072)}.flag-icon-jo{background-image:url(/images/vendor/flag-icon-css/flags/4x3/jo.svg?fd70ed53d23fa7996a84a869205980a2)}.flag-icon-jo.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/jo.svg?edc26c443611fc43d57210274fad0230)}.flag-icon-jp{background-image:url(/images/vendor/flag-icon-css/flags/4x3/jp.svg?e88bdf022faaac9c6aab5baf00bab934)}.flag-icon-jp.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/jp.svg?6b7497f15d8b68947c433faa3f868457)}.flag-icon-ke{background-image:url(/images/vendor/flag-icon-css/flags/4x3/ke.svg?142690140c31e8c7eedf0c1a25dd4efd)}.flag-icon-ke.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/ke.svg?7b6e16f14da8c465d0c46d1b6582fa48)}.flag-icon-kg{background-image:url(/images/vendor/flag-icon-css/flags/4x3/kg.svg?1b7cb64f53991640f77b044c106f5f54)}.flag-icon-kg.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/kg.svg?ad800fbdf162b2194c41109a763e0d08)}.flag-icon-kh{background-image:url(/images/vendor/flag-icon-css/flags/4x3/kh.svg?9c4fe4438e93cf02afaa93b82d2c7d99)}.flag-icon-kh.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/kh.svg?db8edfed04707f58379a9d673aa7d0cb)}.flag-icon-ki{background-image:url(/images/vendor/flag-icon-css/flags/4x3/ki.svg?b15f1c5f7d485491a59457a65e015535)}.flag-icon-ki.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/ki.svg?b5d51cf39df016cfca98b3840713bdf9)}.flag-icon-km{background-image:url(/images/vendor/flag-icon-css/flags/4x3/km.svg?fb930327745992be4eca3364ccc29766)}.flag-icon-km.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/km.svg?4fb5c60d977cdce0c8bbb6359527c128)}.flag-icon-kn{background-image:url(/images/vendor/flag-icon-css/flags/4x3/kn.svg?a41408223acfe9dd6b66cd22e2d002b9)}.flag-icon-kn.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/kn.svg?035ea8e73dcd9287c4f3fd369bc96ab8)}.flag-icon-kp{background-image:url(/images/vendor/flag-icon-css/flags/4x3/kp.svg?190eda65c04aaef16c5d28f1098766c4)}.flag-icon-kp.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/kp.svg?5db0bfa7d1c4a4f12534f7046f428f16)}.flag-icon-kr{background-image:url(/images/vendor/flag-icon-css/flags/4x3/kr.svg?69cc2723c3244b005bc051bdc8580006)}.flag-icon-kr.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/kr.svg?c652c7b635b9c2b5d56472f97ff89c06)}.flag-icon-kw{background-image:url(/images/vendor/flag-icon-css/flags/4x3/kw.svg?ec2cbfd83734469d03da89ae77443127)}.flag-icon-kw.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/kw.svg?3d4d88cfd586892b63d7575d933dcf02)}.flag-icon-ky{background-image:url(/images/vendor/flag-icon-css/flags/4x3/ky.svg?4c51dd9a6b8316706d90fb974d528fd1)}.flag-icon-ky.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/ky.svg?26f3373b75f905fabbcbb6078520e188)}.flag-icon-kz{background-image:url(/images/vendor/flag-icon-css/flags/4x3/kz.svg?0b7cc5e4ae1cd812cb22e20c6561cc9c)}.flag-icon-kz.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/kz.svg?a8b78e86463b840e0d119b7d30b33932)}.flag-icon-la{background-image:url(/images/vendor/flag-icon-css/flags/4x3/la.svg?fff694e728b9b0f0a1fa480195f71b75)}.flag-icon-la.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/la.svg?c558afec7e6d4e10fca04d332b3768c3)}.flag-icon-lb{background-image:url(/images/vendor/flag-icon-css/flags/4x3/lb.svg?c4293ad7d99789b123a3f9844033adc1)}.flag-icon-lb.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/lb.svg?f2e6a2e121ed01ddfbcd383db252048a)}.flag-icon-lc{background-image:url(/images/vendor/flag-icon-css/flags/4x3/lc.svg?ab0355788cfb2e14fee5085e0f2e52de)}.flag-icon-lc.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/lc.svg?d95265b28b72c8907c78e44f2c73d369)}.flag-icon-li{background-image:url(/images/vendor/flag-icon-css/flags/4x3/li.svg?67956510ad59f57af33093938726104f)}.flag-icon-li.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/li.svg?654968067e66cca13cd61200df5fd3d1)}.flag-icon-lk{background-image:url(/images/vendor/flag-icon-css/flags/4x3/lk.svg?e31bd4522b8de69169abb9c844de50ec)}.flag-icon-lk.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/lk.svg?69d501e7d2872d46f4fe009eb9180482)}.flag-icon-lr{background-image:url(/images/vendor/flag-icon-css/flags/4x3/lr.svg?4a32c68ca8a95c56f4c8cfca522a3d13)}.flag-icon-lr.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/lr.svg?4cf680b33070b690eb8ede668a6a9b77)}.flag-icon-ls{background-image:url(/images/vendor/flag-icon-css/flags/4x3/ls.svg?a497d746a55018cd5f58fafaa6d6866d)}.flag-icon-ls.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/ls.svg?a9440b7fbc30c7b44c3777199be2314a)}.flag-icon-lt{background-image:url(/images/vendor/flag-icon-css/flags/4x3/lt.svg?18f279c12753cfb88ffaf1dd66662f07)}.flag-icon-lt.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/lt.svg?a28c264002b055a36103c76b6811f55a)}.flag-icon-lu{background-image:url(/images/vendor/flag-icon-css/flags/4x3/lu.svg?ea32843f342611313a040555e7e5c0ca)}.flag-icon-lu.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/lu.svg?9f59bed182102edf5141ad20f51faf0e)}.flag-icon-lv{background-image:url(/images/vendor/flag-icon-css/flags/4x3/lv.svg?ae523190f36e2f04b9a08f3ea137701d)}.flag-icon-lv.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/lv.svg?b54b0a57bac7e35354e8b633f1cb3a81)}.flag-icon-ly{background-image:url(/images/vendor/flag-icon-css/flags/4x3/ly.svg?0b0f3f3b3e5a038701bd78bdaad90a94)}.flag-icon-ly.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/ly.svg?b02c74678ec1d445a3278185b57a8527)}.flag-icon-ma{background-image:url(/images/vendor/flag-icon-css/flags/4x3/ma.svg?1147dd897a2b167632af221184319354)}.flag-icon-ma.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/ma.svg?6d9acf1989a3c28c7a236e8ca8d356a4)}.flag-icon-mc{background-image:url(/images/vendor/flag-icon-css/flags/4x3/mc.svg?40c202f79e0a848930a236518ce5d2cd)}.flag-icon-mc.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/mc.svg?ba857e61e9784d542e87af62104f5213)}.flag-icon-md{background-image:url(/images/vendor/flag-icon-css/flags/4x3/md.svg?a829fc4868897053147bfc9fd32a6f62)}.flag-icon-md.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/md.svg?3c40de435115935ac46aa8660645b892)}.flag-icon-me{background-image:url(/images/vendor/flag-icon-css/flags/4x3/me.svg?c76494939c9c9edb3784672876ee8438)}.flag-icon-me.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/me.svg?f18fdf3eed98033afb7b78968e302f67)}.flag-icon-mf{background-image:url(/images/vendor/flag-icon-css/flags/4x3/mf.svg?b8f1a4ef0f6f26d0848454a4b29a42de)}.flag-icon-mf.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/mf.svg?b2f9987dbfc76957c7acd60627e1c2de)}.flag-icon-mg{background-image:url(/images/vendor/flag-icon-css/flags/4x3/mg.svg?b6fef7e6f7df43304fab8394565703df)}.flag-icon-mg.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/mg.svg?9c179afa9a14e6c6d6418be9649b6780)}.flag-icon-mh{background-image:url(/images/vendor/flag-icon-css/flags/4x3/mh.svg?aa0c01100fc344a6608625482768eda8)}.flag-icon-mh.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/mh.svg?31263480172a126353544a1ca1d8d0dc)}.flag-icon-mk{background-image:url(/images/vendor/flag-icon-css/flags/4x3/mk.svg?c5e8b09d4e81ebd0c41c9c801e25ca88)}.flag-icon-mk.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/mk.svg?0811b040ea673512ada5a9b80c5b9a7c)}.flag-icon-ml{background-image:url(/images/vendor/flag-icon-css/flags/4x3/ml.svg?5204de404d88281e5c79f58d213b631f)}.flag-icon-ml.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/ml.svg?0ef5116bc159f2f8d033041119fd38a9)}.flag-icon-mm{background-image:url(/images/vendor/flag-icon-css/flags/4x3/mm.svg?8ac531e1a069c5abec5e2fb2a84e8439)}.flag-icon-mm.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/mm.svg?2ddb3c8b6c4a6917e9f62c24fca9eabd)}.flag-icon-mn{background-image:url(/images/vendor/flag-icon-css/flags/4x3/mn.svg?88f9e99a5733804b690e6f58ac87e2cf)}.flag-icon-mn.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/mn.svg?96fe6b077294c5b34eb4eb5b46edf96a)}.flag-icon-mo{background-image:url(/images/vendor/flag-icon-css/flags/4x3/mo.svg?c31ad393b9be2177b000e7964439baee)}.flag-icon-mo.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/mo.svg?3454c02ca52469ab46cd73584274d474)}.flag-icon-mp{background-image:url(/images/vendor/flag-icon-css/flags/4x3/mp.svg?4ac904225c98259e84958251d2df383a)}.flag-icon-mp.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/mp.svg?4b173ce7062312cde95d9a4212578e2d)}.flag-icon-mq{background-image:url(/images/vendor/flag-icon-css/flags/4x3/mq.svg?68b83ca57cebe252aec5176e03566564)}.flag-icon-mq.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/mq.svg?a0067ab9a12cedcd447b13747e942dc7)}.flag-icon-mr{background-image:url(/images/vendor/flag-icon-css/flags/4x3/mr.svg?fe0c99da894753ceb49e732aba102701)}.flag-icon-mr.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/mr.svg?90b044479e4dc8257adda7a4f0bbcceb)}.flag-icon-ms{background-image:url(/images/vendor/flag-icon-css/flags/4x3/ms.svg?1e01db4943c166d0d99d1e94dd19a455)}.flag-icon-ms.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/ms.svg?88a8b4177f0db47849fe2eb30caa0e4e)}.flag-icon-mt{background-image:url(/images/vendor/flag-icon-css/flags/4x3/mt.svg?8bb217f8dbf3757be544dc17e8085a68)}.flag-icon-mt.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/mt.svg?a63f527d3c2c3885bc5057be53922160)}.flag-icon-mu{background-image:url(/images/vendor/flag-icon-css/flags/4x3/mu.svg?fac1d9e56b6fc4d70f6b8d8a1dc084df)}.flag-icon-mu.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/mu.svg?13bb07885aeb515bdec8a1aa69ccba69)}.flag-icon-mv{background-image:url(/images/vendor/flag-icon-css/flags/4x3/mv.svg?cca45d07fdeb8b51efedfaf9a2419441)}.flag-icon-mv.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/mv.svg?1c36cf0ddd782098a12901175e7a7b31)}.flag-icon-mw{background-image:url(/images/vendor/flag-icon-css/flags/4x3/mw.svg?47096f61604dcc35a736701cb9a349d5)}.flag-icon-mw.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/mw.svg?947e87f22f3eb27d70f735e32393b7a8)}.flag-icon-mx{background-image:url(/images/vendor/flag-icon-css/flags/4x3/mx.svg?2c3e6269a1d360cc4372866b585dee1f)}.flag-icon-mx.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/mx.svg?da57f4af684f9e8c7fbca08c533153c8)}.flag-icon-my{background-image:url(/images/vendor/flag-icon-css/flags/4x3/my.svg?07a2b954a852d400cf1becc7e434fc96)}.flag-icon-my.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/my.svg?d39816cdb5d304f7071056b164441061)}.flag-icon-mz{background-image:url(/images/vendor/flag-icon-css/flags/4x3/mz.svg?437e5e7e8baee752f62430cfad587572)}.flag-icon-mz.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/mz.svg?44d9c5ca45e9e3665776b92d94cab007)}.flag-icon-na{background-image:url(/images/vendor/flag-icon-css/flags/4x3/na.svg?341c9a95c15f7724623d8b434e987de4)}.flag-icon-na.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/na.svg?a6489bdf3b11cf2817b96e4c26cb77d3)}.flag-icon-nc{background-image:url(/images/vendor/flag-icon-css/flags/4x3/nc.svg?8964e9d288bee6d017d014e889164003)}.flag-icon-nc.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/nc.svg?d38cb96a67c7e5ab25d90033295ca8a4)}.flag-icon-ne{background-image:url(/images/vendor/flag-icon-css/flags/4x3/ne.svg?63d98e604e2655fa7560f6728dde5a24)}.flag-icon-ne.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/ne.svg?fb4570598be93578a4568f9b4d94b5d9)}.flag-icon-nf{background-image:url(/images/vendor/flag-icon-css/flags/4x3/nf.svg?491e2cb1ed059769ee6c4a67c9056bbb)}.flag-icon-nf.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/nf.svg?b318b51b830d9f5f8404a8d1d0fff020)}.flag-icon-ng{background-image:url(/images/vendor/flag-icon-css/flags/4x3/ng.svg?63d11526ba189073cf88f42ecfe286f5)}.flag-icon-ng.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/ng.svg?e6413d3781678ea94e5613a8df12cff2)}.flag-icon-ni{background-image:url(/images/vendor/flag-icon-css/flags/4x3/ni.svg?a6a663fc3a131ea0338a0320a620dd91)}.flag-icon-ni.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/ni.svg?c9e542cdc749193cb1d4527b4dfb84be)}.flag-icon-nl{background-image:url(/images/vendor/flag-icon-css/flags/4x3/nl.svg?90d37ba2f87b97413d721c8cc8116ef5)}.flag-icon-nl.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/nl.svg?340f4109d1ab47b6aa8be4bd76d49c44)}.flag-icon-no{background-image:url(/images/vendor/flag-icon-css/flags/4x3/no.svg?ebc5cbbf9191fccacfa64b0c0117d7eb)}.flag-icon-no.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/no.svg?75c2c58c386fe873e206ee2553679b4f)}.flag-icon-np{background-image:url(/images/vendor/flag-icon-css/flags/4x3/np.svg?376ba69ac7efe6dd021eaba9314708dd)}.flag-icon-np.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/np.svg?ace198998bac3241b11d4c8fa7e04296)}.flag-icon-nr{background-image:url(/images/vendor/flag-icon-css/flags/4x3/nr.svg?7203adcc9109f98a90ceae14ea730793)}.flag-icon-nr.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/nr.svg?a7fe3560951a355328369145ec09f6eb)}.flag-icon-nu{background-image:url(/images/vendor/flag-icon-css/flags/4x3/nu.svg?e0ebb0a0c1c386928744b3d3c84c2b15)}.flag-icon-nu.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/nu.svg?a60461b01b2c78609042d8a7e778a5c6)}.flag-icon-nz{background-image:url(/images/vendor/flag-icon-css/flags/4x3/nz.svg?80de009680b35194008b5613e9d167c7)}.flag-icon-nz.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/nz.svg?7961d9cf25200dd7fbfb03880d0bb534)}.flag-icon-om{background-image:url(/images/vendor/flag-icon-css/flags/4x3/om.svg?a4165f8b917d1cf2a30646d05faced4c)}.flag-icon-om.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/om.svg?056b3102c74e1b1197c7c0aee8cca4f1)}.flag-icon-pa{background-image:url(/images/vendor/flag-icon-css/flags/4x3/pa.svg?c57742ff6c56050ca89902da2bf95659)}.flag-icon-pa.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/pa.svg?1319a08f09a1c4fc215eb83c2c2226b3)}.flag-icon-pe{background-image:url(/images/vendor/flag-icon-css/flags/4x3/pe.svg?bfc1b7612f46b109eaa9990bc4dadff5)}.flag-icon-pe.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/pe.svg?5051d6bf74d5991b7c66f75302b01f4c)}.flag-icon-pf{background-image:url(/images/vendor/flag-icon-css/flags/4x3/pf.svg?ced522d0c623c1ed205ea0158f9357db)}.flag-icon-pf.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/pf.svg?0fcfd580247beac6423d1d000e43f54a)}.flag-icon-pg{background-image:url(/images/vendor/flag-icon-css/flags/4x3/pg.svg?26ccc1adfdea63a62cec5d4df71185fe)}.flag-icon-pg.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/pg.svg?2ff7e7d296ef5ff2e175c3f82c2bc667)}.flag-icon-ph{background-image:url(/images/vendor/flag-icon-css/flags/4x3/ph.svg?ac201247831436678b2e7477f2e2ecd3)}.flag-icon-ph.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/ph.svg?54a0a71676f3e067ee333f783cc40e7d)}.flag-icon-pk{background-image:url(/images/vendor/flag-icon-css/flags/4x3/pk.svg?60cd1fcc109cbd09784d198776a5ac92)}.flag-icon-pk.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/pk.svg?577eb2d4d1c27a7dd52b03540612e257)}.flag-icon-pl{background-image:url(/images/vendor/flag-icon-css/flags/4x3/pl.svg?72ad527630e5a5340bfa1ac07ea28c27)}.flag-icon-pl.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/pl.svg?589cf89cd8e0d4ba004a4dc931463df7)}.flag-icon-pm{background-image:url(/images/vendor/flag-icon-css/flags/4x3/pm.svg?3177972a5fba1b438ed40f38f4b28e53)}.flag-icon-pm.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/pm.svg?68eb0617662d5f71655cfa30c389c040)}.flag-icon-pn{background-image:url(/images/vendor/flag-icon-css/flags/4x3/pn.svg?3a7ee56fbb32fb4524086f6306f3699f)}.flag-icon-pn.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/pn.svg?35a3a02fae83b674fec1a87189355a76)}.flag-icon-pr{background-image:url(/images/vendor/flag-icon-css/flags/4x3/pr.svg?f3e7609efc8f44b5b2986a1d694eb102)}.flag-icon-pr.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/pr.svg?00f681ed96fef0597aa95a44812f6b22)}.flag-icon-ps{background-image:url(/images/vendor/flag-icon-css/flags/4x3/ps.svg?5f0171cf87f7834bb4062065c5990d7c)}.flag-icon-ps.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/ps.svg?1ff52afa4ab2aa9b271562ce7fadb165)}.flag-icon-pt{background-image:url(/images/vendor/flag-icon-css/flags/4x3/pt.svg?a0d9acfb1c2a4e986423773ec1658517)}.flag-icon-pt.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/pt.svg?4082bfb9ef5259e8b67780c59d219201)}.flag-icon-pw{background-image:url(/images/vendor/flag-icon-css/flags/4x3/pw.svg?c7ab5051febfb1b8c4fda29b674f9593)}.flag-icon-pw.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/pw.svg?177a477f3cb644da8632a312d8f0c171)}.flag-icon-py{background-image:url(/images/vendor/flag-icon-css/flags/4x3/py.svg?5779800eac3b4129d1137d5621031711)}.flag-icon-py.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/py.svg?8b7bf5120a92ad2e1046535fdbbef191)}.flag-icon-qa{background-image:url(/images/vendor/flag-icon-css/flags/4x3/qa.svg?d9ba99e670733eb59fa09200579e141d)}.flag-icon-qa.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/qa.svg?9d96db3628839ee7b2d945306f79109a)}.flag-icon-re{background-image:url(/images/vendor/flag-icon-css/flags/4x3/re.svg?9cd28549edb07c04561ca4e2f1a09788)}.flag-icon-re.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/re.svg?ee67e77c52c7bb0181b4b36007948d6d)}.flag-icon-ro{background-image:url(/images/vendor/flag-icon-css/flags/4x3/ro.svg?10df4fddff9f7332c736c2cea7b91c5e)}.flag-icon-ro.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/ro.svg?a1043ac5cd81e70c639b8c873fa4e07c)}.flag-icon-rs{background-image:url(/images/vendor/flag-icon-css/flags/4x3/rs.svg?a06ce391e44f88818594eac50cd72e7c)}.flag-icon-rs.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/rs.svg?91b2e2224bbf5aa333ad5bd416e99d9a)}.flag-icon-ru{background-image:url(/images/vendor/flag-icon-css/flags/4x3/ru.svg?b15eaf603b43f783e20552d2fbce614b)}.flag-icon-ru.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/ru.svg?fa3ca0b9aa5a017dc3a71419e7b0972e)}.flag-icon-rw{background-image:url(/images/vendor/flag-icon-css/flags/4x3/rw.svg?1d3a2837fd88af6dbbaf42e4ed207b60)}.flag-icon-rw.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/rw.svg?69f73bb9664e16a272ba84543c9f3c01)}.flag-icon-sa{background-image:url(/images/vendor/flag-icon-css/flags/4x3/sa.svg?04d0731eccf0867160fe2681ab5ff256)}.flag-icon-sa.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/sa.svg?a843d8c761d1bcb204aa6696e766f3fe)}.flag-icon-sb{background-image:url(/images/vendor/flag-icon-css/flags/4x3/sb.svg?c4f275867785f7b9da7f22d12d8bb036)}.flag-icon-sb.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/sb.svg?194f33c88dd318b7289e7df3ec6ff7af)}.flag-icon-sc{background-image:url(/images/vendor/flag-icon-css/flags/4x3/sc.svg?ca4d15445e80eaf27701d4d7f364016a)}.flag-icon-sc.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/sc.svg?07bc7148f241ef1edc87c54aa5fa0e9a)}.flag-icon-sd{background-image:url(/images/vendor/flag-icon-css/flags/4x3/sd.svg?43885ad7472d8493cb686aebf7fa26b5)}.flag-icon-sd.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/sd.svg?c00a8e4821b3ab89adb39207069ecc85)}.flag-icon-se{background-image:url(/images/vendor/flag-icon-css/flags/4x3/se.svg?7c4e34cc7d59651cea5d59d876a7b262)}.flag-icon-se.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/se.svg?a099a957db46af8c30f2666d4d32c793)}.flag-icon-sg{background-image:url(/images/vendor/flag-icon-css/flags/4x3/sg.svg?ea25cc8306d5c50f6f9ca3a6d33cc79a)}.flag-icon-sg.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/sg.svg?15dcabd5b20a20acf15f6ed3c7215a79)}.flag-icon-sh{background-image:url(/images/vendor/flag-icon-css/flags/4x3/sh.svg?51e2a5b4e26e4356fd3ec63d5e376b85)}.flag-icon-sh.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/sh.svg?4d310917ee83d7bd8ab74809dcacb0a8)}.flag-icon-si{background-image:url(/images/vendor/flag-icon-css/flags/4x3/si.svg?ca179ac4c194b1ae22aedd05885711fa)}.flag-icon-si.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/si.svg?462284ebcec6ab57ae59b2a99d716228)}.flag-icon-sj{background-image:url(/images/vendor/flag-icon-css/flags/4x3/sj.svg?ed3091f90ca33e68a478a2e9591a3a0f)}.flag-icon-sj.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/sj.svg?600ff9ebbcef94f01d9655315091ece4)}.flag-icon-sk{background-image:url(/images/vendor/flag-icon-css/flags/4x3/sk.svg?ea01c9d3ae7b2a623a53bf1bfad50039)}.flag-icon-sk.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/sk.svg?747d53f4060149b56df87cfb62f24044)}.flag-icon-sl{background-image:url(/images/vendor/flag-icon-css/flags/4x3/sl.svg?5b42385a9d1c7c1c0845cb2174dd8ffe)}.flag-icon-sl.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/sl.svg?8a10faabc0236da54a18069335fcc2f6)}.flag-icon-sm{background-image:url(/images/vendor/flag-icon-css/flags/4x3/sm.svg?9be0b31804b75d372956172364e792b8)}.flag-icon-sm.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/sm.svg?2feea9ac84e5060ce32b52152b7c3ce8)}.flag-icon-sn{background-image:url(/images/vendor/flag-icon-css/flags/4x3/sn.svg?4cebb6bcfdc50dabee8f696520fb2888)}.flag-icon-sn.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/sn.svg?2127f978c8419829f133cf7f77071488)}.flag-icon-so{background-image:url(/images/vendor/flag-icon-css/flags/4x3/so.svg?cb850010c79a4a5e80e1390ceec088d5)}.flag-icon-so.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/so.svg?abd24f5291343b56f4a9a8ae76f6105d)}.flag-icon-sr{background-image:url(/images/vendor/flag-icon-css/flags/4x3/sr.svg?8a55c8800af3f3ef29dac47ee5e08e3e)}.flag-icon-sr.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/sr.svg?a2d5152d4941c22f32ee5f9c7942ce99)}.flag-icon-ss{background-image:url(/images/vendor/flag-icon-css/flags/4x3/ss.svg?b514a452c753222edb7442e11fb18a1b)}.flag-icon-ss.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/ss.svg?776cc05a7f06908638698393285433c4)}.flag-icon-st{background-image:url(/images/vendor/flag-icon-css/flags/4x3/st.svg?b6fe2ffad19ccf2a26688e9046f97cb2)}.flag-icon-st.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/st.svg?31589775a054127c834be5bd3e6e877e)}.flag-icon-sv{background-image:url(/images/vendor/flag-icon-css/flags/4x3/sv.svg?727fdda95d0726a2f8555c9d23c11a1d)}.flag-icon-sv.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/sv.svg?d2689d9dc4699ddef73874f78ba9275d)}.flag-icon-sx{background-image:url(/images/vendor/flag-icon-css/flags/4x3/sx.svg?4c1191e8b14455ea4c37c85ab515eef2)}.flag-icon-sx.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/sx.svg?9d5dd5f9161e6831d605f2df6a6ff8f9)}.flag-icon-sy{background-image:url(/images/vendor/flag-icon-css/flags/4x3/sy.svg?0f554814ab873be016129d01a160a8b1)}.flag-icon-sy.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/sy.svg?6aaab03b000f5b808d9d3c9b22a951f0)}.flag-icon-sz{background-image:url(/images/vendor/flag-icon-css/flags/4x3/sz.svg?39530ef0f606019c0c8ee2bb5e4e82fb)}.flag-icon-sz.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/sz.svg?5e362aa32ff77991782cb5d8a60506dc)}.flag-icon-tc{background-image:url(/images/vendor/flag-icon-css/flags/4x3/tc.svg?ff2766b3075c3d42c445693827b4f158)}.flag-icon-tc.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/tc.svg?654f7323dde330d05400747ea24b94d5)}.flag-icon-td{background-image:url(/images/vendor/flag-icon-css/flags/4x3/td.svg?e8da56cbebbb3dde41445e84af75d4f3)}.flag-icon-td.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/td.svg?9c97dc0e35e6413692c3da685e317576)}.flag-icon-tf{background-image:url(/images/vendor/flag-icon-css/flags/4x3/tf.svg?a9e5f1da0851049e758841f33ce21939)}.flag-icon-tf.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/tf.svg?8d05468a38368a0b073577dc3bc27f76)}.flag-icon-tg{background-image:url(/images/vendor/flag-icon-css/flags/4x3/tg.svg?b43eae00ae1ff50f3c5494d93d654f17)}.flag-icon-tg.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/tg.svg?3e0d0ecae2b25005d773f73f3be5a22b)}.flag-icon-th{background-image:url(/images/vendor/flag-icon-css/flags/4x3/th.svg?7af9785ea63515b716b24f80e5c85089)}.flag-icon-th.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/th.svg?81f11216306b3581ad582a90e6870364)}.flag-icon-tj{background-image:url(/images/vendor/flag-icon-css/flags/4x3/tj.svg?6c2162b3efdb36b87d7e7862826f496c)}.flag-icon-tj.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/tj.svg?bf3afdf3e320398121fedfc4bcb28e14)}.flag-icon-tk{background-image:url(/images/vendor/flag-icon-css/flags/4x3/tk.svg?1455c0103ac60cfa8ded894c201e32e7)}.flag-icon-tk.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/tk.svg?fc6ec3620b3b4268a5b479fcf83fbeac)}.flag-icon-tl{background-image:url(/images/vendor/flag-icon-css/flags/4x3/tl.svg?7d28e8d40168ce95427553d6b612d9da)}.flag-icon-tl.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/tl.svg?ca6f895f3a43f56eabea93b9da411760)}.flag-icon-tm{background-image:url(/images/vendor/flag-icon-css/flags/4x3/tm.svg?a4225f49582a3e6efb79aebf1ec1dc56)}.flag-icon-tm.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/tm.svg?aebbec68862465e96838fb34c50c5c1b)}.flag-icon-tn{background-image:url(/images/vendor/flag-icon-css/flags/4x3/tn.svg?8c354710fc62c5463e7a61db3311d60a)}.flag-icon-tn.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/tn.svg?5b18c0080026920c3acfd38c1f7aebe7)}.flag-icon-to{background-image:url(/images/vendor/flag-icon-css/flags/4x3/to.svg?349c2891172b7c5d52c92e3510669ace)}.flag-icon-to.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/to.svg?be894d62f56522a3c14654499da94270)}.flag-icon-tr{background-image:url(/images/vendor/flag-icon-css/flags/4x3/tr.svg?b3a2944bab002e3d54a93f6556dbc142)}.flag-icon-tr.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/tr.svg?4361a465facb5dc6e76b857b014cfec9)}.flag-icon-tt{background-image:url(/images/vendor/flag-icon-css/flags/4x3/tt.svg?2202ac07ae4c9dac909d0a6f023b470a)}.flag-icon-tt.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/tt.svg?cdd850a6900d4c57350317ad946df69d)}.flag-icon-tv{background-image:url(/images/vendor/flag-icon-css/flags/4x3/tv.svg?0e4df57cb9c9807e406f0727e302aea9)}.flag-icon-tv.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/tv.svg?d2359d512f1fc212c6edac59509775d9)}.flag-icon-tw{background-image:url(/images/vendor/flag-icon-css/flags/4x3/tw.svg?e09246826e565fc6c51be5399b2afbe7)}.flag-icon-tw.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/tw.svg?2a1ca9e089194fe495fca8ff2f0509bb)}.flag-icon-tz{background-image:url(/images/vendor/flag-icon-css/flags/4x3/tz.svg?dc6b0e6b7a66c83d6308040a21d7da51)}.flag-icon-tz.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/tz.svg?989068bc59ee8e56dc0c5ff190c5edc1)}.flag-icon-ua{background-image:url(/images/vendor/flag-icon-css/flags/4x3/ua.svg?bfb189806941462b4a660e5f6d945d15)}.flag-icon-ua.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/ua.svg?1013f48ff12e262ce1878c8a3a2c4761)}.flag-icon-ug{background-image:url(/images/vendor/flag-icon-css/flags/4x3/ug.svg?ea13afded4e1f51ebdd08d50db75fea3)}.flag-icon-ug.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/ug.svg?5f94cebe25dcdc50b47c90ada74d75c9)}.flag-icon-um{background-image:url(/images/vendor/flag-icon-css/flags/4x3/um.svg?ff13e83804d6e8c8e0a95a434dc2151f)}.flag-icon-um.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/um.svg?1ba09c7c44472f9de87c6ceec7621156)}.flag-icon-us{background-image:url(/images/vendor/flag-icon-css/flags/4x3/us.svg?6721ec1703d6c70217dc28e47ba046ee)}.flag-icon-us.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/us.svg?e0150e99dfb2b3b6cb0fa3dee8e5faa2)}.flag-icon-uy{background-image:url(/images/vendor/flag-icon-css/flags/4x3/uy.svg?acae891c26de107e0055142af37d5db0)}.flag-icon-uy.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/uy.svg?6cdf73a4c8db0526a6b0c4c1c599e544)}.flag-icon-uz{background-image:url(/images/vendor/flag-icon-css/flags/4x3/uz.svg?768aad8665624dc7dbe906fd821b965f)}.flag-icon-uz.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/uz.svg?562cdaf4fe9e79edd39912d23acaa770)}.flag-icon-va{background-image:url(/images/vendor/flag-icon-css/flags/4x3/va.svg?92d8e5deb8a06804acc9d464b86082b3)}.flag-icon-va.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/va.svg?8a8af6adf7ed744e79d85e0cdc50d3a3)}.flag-icon-vc{background-image:url(/images/vendor/flag-icon-css/flags/4x3/vc.svg?7ede03d79eb30e0b9e39c97dae62b8f3)}.flag-icon-vc.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/vc.svg?cd4d4bc77b198dda0f40efe264fbdc99)}.flag-icon-ve{background-image:url(/images/vendor/flag-icon-css/flags/4x3/ve.svg?16965260962de6c0cc266e2b2932265c)}.flag-icon-ve.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/ve.svg?3a0ada183ef2e1cf48b000551cde390c)}.flag-icon-vg{background-image:url(/images/vendor/flag-icon-css/flags/4x3/vg.svg?6522df4ca6b807d31bf137493066b03e)}.flag-icon-vg.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/vg.svg?bdf80cd419704aa592018a517b642f86)}.flag-icon-vi{background-image:url(/images/vendor/flag-icon-css/flags/4x3/vi.svg?ddcb2a05ad0cafc4d624fb5b1a7b20d2)}.flag-icon-vi.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/vi.svg?33f8359db781198169f9402a1dec528a)}.flag-icon-vn{background-image:url(/images/vendor/flag-icon-css/flags/4x3/vn.svg?dc5c01120d8c744071c7624b5ec63450)}.flag-icon-vn.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/vn.svg?c06ead49eb65087ade8797a83db46c99)}.flag-icon-vu{background-image:url(/images/vendor/flag-icon-css/flags/4x3/vu.svg?b3180467e2c843cb399a6b893a6b60c1)}.flag-icon-vu.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/vu.svg?824ff41c0c1ae867f8d63c3437631212)}.flag-icon-wf{background-image:url(/images/vendor/flag-icon-css/flags/4x3/wf.svg?b1cd4b7cbf8e0ed52a029c692f525fab)}.flag-icon-wf.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/wf.svg?cd857ddf281b3850adc97e82623c233a)}.flag-icon-ws{background-image:url(/images/vendor/flag-icon-css/flags/4x3/ws.svg?e3d730a023004cd1c4c48ae82c231654)}.flag-icon-ws.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/ws.svg?55ccdcf08b0ef3c4d4fc6b8a44fcc5b2)}.flag-icon-ye{background-image:url(/images/vendor/flag-icon-css/flags/4x3/ye.svg?67becdbb6b9c41ee1d8c4140fd5958c1)}.flag-icon-ye.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/ye.svg?963e65f0f78391d3d8247e7288368826)}.flag-icon-yt{background-image:url(/images/vendor/flag-icon-css/flags/4x3/yt.svg?9e7546c6fbbba992e773ddc53080d618)}.flag-icon-yt.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/yt.svg?16c24fa76cfc8efe16082fac6639f92e)}.flag-icon-za{background-image:url(/images/vendor/flag-icon-css/flags/4x3/za.svg?ec2f0f1e801da0e00cbd7ee1fea84508)}.flag-icon-za.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/za.svg?124a451dc72b2dd7815b265e7678018a)}.flag-icon-zm{background-image:url(/images/vendor/flag-icon-css/flags/4x3/zm.svg?c9457bd128c84512d2c4b9cafeee1339)}.flag-icon-zm.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/zm.svg?6b8020db95a279639f4fd2bfff26f3ff)}.flag-icon-zw{background-image:url(/images/vendor/flag-icon-css/flags/4x3/zw.svg?f4d026d62b64ba5d54f7975212d2f9f6)}.flag-icon-zw.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/zw.svg?8941a67083d78e4081fc395a6e70ee45)}.flag-icon-es-ct{background-image:url(/images/vendor/flag-icon-css/flags/4x3/es-ct.svg?4a8f7a70be8381d17082f39890792bb2)}.flag-icon-es-ct.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/es-ct.svg?45d2d25e60991c8cbdc6e125cdeaf8de)}.flag-icon-eu{background-image:url(/images/vendor/flag-icon-css/flags/4x3/eu.svg?537d37f4bea4bf5f85d8a0e5433b306d)}.flag-icon-eu.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/eu.svg?a178c2d5022004eca2a8feca711ab665)}.flag-icon-gb-eng{background-image:url(/images/vendor/flag-icon-css/flags/4x3/gb-eng.svg?c79b0bfc6d43f890a4994446d6d95f2b)}.flag-icon-gb-eng.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/gb-eng.svg?67715a321be7b5f2b0ba57fcceb911a7)}.flag-icon-gb-nir{background-image:url(/images/vendor/flag-icon-css/flags/4x3/gb-nir.svg?58c5571943fe23fc6e02ae996e534f12)}.flag-icon-gb-nir.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/gb-nir.svg?2ee6387222698b20e4ec49f93f0dfaa6)}.flag-icon-gb-sct{background-image:url(/images/vendor/flag-icon-css/flags/4x3/gb-sct.svg?98ff327f4bcf8b90343c77a84b1be5dd)}.flag-icon-gb-sct.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/gb-sct.svg?644fc29edaa1c60228318860b5f4f2e8)}.flag-icon-gb-wls{background-image:url(/images/vendor/flag-icon-css/flags/4x3/gb-wls.svg?9c138db83115bbf972fe953bec6004c6)}.flag-icon-gb-wls.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/gb-wls.svg?3facef5abbf8665ea6301df542c38dde)}.flag-icon-un{background-image:url(/images/vendor/flag-icon-css/flags/4x3/un.svg?31da6099b952c8ddfb542cf8143c7a4b)}.flag-icon-un.flag-icon-squared{background-image:url(/images/vendor/flag-icon-css/flags/1x1/un.svg?de98f1acba15432e8fabd0d7afe87e70)}</style><style type="text/css">.ps{overflow:hidden!important;overflow-anchor:none;-ms-overflow-style:none;touch-action:auto;-ms-touch-action:auto}.ps__rail-x{height:15px;bottom:0}.ps__rail-x,.ps__rail-y{display:none;opacity:0;transition:background-color .2s linear,opacity .2s linear;-webkit-transition:background-color .2s linear,opacity .2s linear;position:absolute}.ps__rail-y{width:15px;right:0}.ps--active-x>.ps__rail-x,.ps--active-y>.ps__rail-y{display:block;background-color:transparent}.ps--focus>.ps__rail-x,.ps--focus>.ps__rail-y,.ps--scrolling-x>.ps__rail-x,.ps--scrolling-y>.ps__rail-y,.ps:hover>.ps__rail-x,.ps:hover>.ps__rail-y{opacity:.6}.ps .ps__rail-x.ps--clicking,.ps .ps__rail-x:focus,.ps .ps__rail-x:hover,.ps .ps__rail-y.ps--clicking,.ps .ps__rail-y:focus,.ps .ps__rail-y:hover{background-color:#eee;opacity:.9}.ps__thumb-x{transition:background-color .2s linear,height .2s ease-in-out;-webkit-transition:background-color .2s linear,height .2s ease-in-out;height:6px;bottom:2px}.ps__thumb-x,.ps__thumb-y{background-color:#aaa;border-radius:6px;position:absolute}.ps__thumb-y{transition:background-color .2s linear,width .2s ease-in-out;-webkit-transition:background-color .2s linear,width .2s ease-in-out;width:6px;right:2px}.ps__rail-x.ps--clicking .ps__thumb-x,.ps__rail-x:focus>.ps__thumb-x,.ps__rail-x:hover>.ps__thumb-x{background-color:#999;height:11px}.ps__rail-y.ps--clicking .ps__thumb-y,.ps__rail-y:focus>.ps__thumb-y,.ps__rail-y:hover>.ps__thumb-y{background-color:#999;width:11px}@supports (-ms-overflow-style:none){.ps{overflow:auto!important}}@media (-ms-high-contrast:none),screen and (-ms-high-contrast:active){.ps{overflow:auto!important}}</style><style type="text/css">.ps-container{position:relative}</style><style type="text/css">
.popper {
  width: auto;
  background-color: #fafafa;
  color: #212121;
  text-align: center;
  padding: 2px;
  display: inline-block;
  border-radius: 3px;
  position: absolute;
  font-size: 14px;
  font-weight: normal;
  border: 1px #ebebeb solid;
  z-index: 200000;
  -moz-box-shadow: rgb(58, 58, 58) 0 0 6px 0;
  -webkit-box-shadow: rgb(58, 58, 58) 0 0 6px 0;
  box-shadow: rgb(58, 58, 58) 0 0 6px 0;
}
.popper .popper__arrow {
  width: 0;
  height: 0;
  border-style: solid;
  position: absolute;
  margin: 5px;
}
.popper[x-placement^="top"] {
  margin-bottom: 5px;
}
.popper[x-placement^="top"] .popper__arrow {
  border-width: 5px 5px 0 5px;
  border-color: #fafafa transparent transparent transparent;
  bottom: -5px;
  left: calc(50% - 5px);
  margin-top: 0;
  margin-bottom: 0;
}
.popper[x-placement^="bottom"] {
  marg  in-top: 5px;
}
.popper[x-placement^="bottom"] .popper__arrow {
    border-width: 0 5px 5px 5px;
    border-color: transparent transparent #fafafa transparent;
    top: -5px;
    left: calc(50% - 5px);
    margin-top: 0;
    margin-bottom: 0;
}
.popper[x-placement^="right"] {
    margin-left: 5px;
}
.popper[x-placement^="right"] .popper__arrow {
    border-width: 5px 5px 5px 0;
    border-color: transparent #fafafa transparent transparent;
    left: -5px;
    top: calc(50% - 5px);
    margin-left: 0;
    margin-right: 0;
}
.popper[x-placement^="left"] {
    margin-right: 5px;
}
.popper[x-placement^="left"] .popper__arrow {
    border-width: 5px 0 5px 5px;
    border-color: transparent transparent transparent #fafafa;
    right: -5px;
    top: calc(50% - 5px);
    margin-left: 0;
    margin-right: 0;
}
</style>
</head>

<body class="  text-left">
   <noscript>
      <strong>
      We're sorry but Invento doesn't work properly without JavaScript
      enabled. Please enable it to continue.</strong
         >
   </noscript>
   <!-- built files will be auto injected -->
   <div class="loading_wrap" id="loading_wrap" style="display: none;">
      <div class="loader_logo">
         <img src="/images/logo.png" class="" alt="logo">
      </div>
      <div class="loading"></div>
   </div>
   <div>
   <div data-v-558582d2=""></div>
   <div>
   <div class="app-admin-wrap layout-sidebar-large clearfix">
   <div class="main-header">
      <div class="logo"><a href="/app/dashboard/main" aria-current="page" class="router-link-exact-active open"><img src="/images/logo-default.png" alt="" width="60" height="60"></a></div>
      <div class="menu-toggle">
         <div></div>
         <div></div>
         <div></div>
      </div>
      <div style="margin: auto;"></div>
      <div class="header-part-right">
         <div class="mr-3">
            <div class="b-overlay-wrap position-relative d-inline-block btn-loader">
               <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-primary ripple btn-sm"><i class="i-Brush" style="font-size: 12px;"></i>
               Logout
               </button><!---->
               </form>
            </div>
         </div>
         <div class="mr-3">
            <div class="dropdown b-dropdown btn-group" id="__BVID__24">
               <!----><button aria-haspopup="menu" aria-expanded="false" type="button" class="btn dropdown-toggle btn-link btn-lg text-decoration-none dropdown-toggle-no-caret" id="__BVID__24__BV_toggle_"><small><i class="i-Shop-4 mr-2"></i> <strong>
               Bantayan
               </strong></small></button>
               <ul role="menu" tabindex="-1" class="dropdown-menu" aria-labelledby="__BVID__24__BV_toggle_">
                  <li role="presentation"><a role="menuitem" href="#" target="_self" class="dropdown-item active">
                     Bantayan
                     </a>
                  </li>
               </ul>
            </div>
         </div>
         <!----> <i class="i-Full-Screen header-icon d-none d-sm-inline-block"></i> 
         <div class="dropdown">
            <div id="dropdown-1" class="dropdown b-dropdown m-md-2 badge-top-container d-none d-sm-inline-block btn-group">
               <!---->
               <button id="dropdown-1__BV_toggle_" aria-haspopup="menu" aria-expanded="false" type="button" class="btn dropdown-toggle btn-link text-decoration-none dropdown-toggle-no-caret">
                  <!----> <i class="i-Bell text-muted header-icon"></i>
               </button>
               <ul role="menu" tabindex="-1" aria-labelledby="dropdown-1__BV_toggle_" class="dropdown-menu">
                  <section class="ps-container dropdown-menu-right rtl-ps-none notification-dropdown ps scroll open">
                     <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                        <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                     </div>
                     <div class="ps__rail-y" style="top: 0px; right: 0px;">
                        <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                     </div>
                  </section>
               </ul>
            </div>
         </div>
         <div class="dropdown">
            <div id="dropdown-1" class="dropdown b-dropdown m-md-2 user col align-self-end d-md-block btn-group">
               <!----><button id="dropdown-1__BV_toggle_" aria-haspopup="menu" aria-expanded="false" type="button" class="btn dropdown-toggle btn-link text-decoration-none dropdown-toggle-no-caret"><img src="/images/avatar/no_avatar.png" id="userDropdown" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
               <ul role="menu" tabindex="-1" aria-labelledby="dropdown-1__BV_toggle_" class="dropdown-menu">
                  <div aria-labelledby="userDropdown" class="dropdown-menu-right">
                     <div class="dropdown-header"><i class="i-Lock-User mr-1"></i> <span>John</span></div>
                     <a href="/app/profile" class="dropdown-item">Profile</a> <a href="/app/log-histories" class="dropdown-item">Log History</a> <!----> <a href="#" class="dropdown-item">Logout</a>
                  </div>
               </ul>
            </div>
         </div>
      </div>
   </div>
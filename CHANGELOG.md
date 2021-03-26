# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/en/1.0.0/)
and this project adheres to [Semantic Versioning](http://semver.org/spec/v2.0.0.html).

## [Unreleased]

```
2021-03-26 17:49:15 Added: Donate button.
2021-03-25 02:36:07 Fixed: Typos
```

## 2021-03-25 00:49:31 [Version 1.4.0]

```
2021-03-25 00:27:38 Added: Donate button.
2021-03-24 23:25:42 Changed: Renamed `index.php` to `index.html`.
2021-03-24 23:06:16 Added: `moonwalk` theme.
2021-01-03 21:03:18 Added: favimage
2020-09-11 22:28:38 Fixed: xyzzy/qrpicture#10 - Lower requested palette size if insufficient colours available
2020-09-10 12:33:45 Changed: Lost+Found
2020-09-10 12:27:33 Changed: Reformat CSS (no code change)
2020-09-10 12:24:56 Fixed: 'tail' layout and tweaked theme
```

## 2020-09-08 18:22:54 [Version 1.3.0]

Enabled octree to create initial palette for better colour results.

NOTE:	When upgrading from v1.2.0 you need to manually upgrade the database table:
	`alter table queue add numcolour int not null default 0 after outlinenr;` 

```
2020-09-08 18:17:51 Lost+Found.
2020-09-08 18:10:44 Fixed xyzzy/qrpicture#9 - Enable octree for initial palette.
2020-09-08 17:49:45 Fixed xyzzy/qrpicture#8 - Escape quotes in payload text.
2020-09-08 16:15:59 Fixed xyzzy/qrpicture#7 - Add `numColour`.
```

## 2020-09-03 01:22:40 [Version 1.2.0]

Redesigned html/css from scratch for highly responsive mobile/desktop friendly site.

```
2020-09-03 01:15:27 Redesigned html/css from scratch and updates js accordingly.
2020-09-03 01:12:38 Reformat javascript and replace `var` with `let`.
2020-09-03 00:43:20 Fix asset and repository names.
```

## 2020-08-18 22:58:45 [Version 1.1.0]

Feedback from AWS launch.
Most notably worker processes need to be manually started.

```
2020-08-18 22:38:58 Updated to mootools-1.6.0.
2020-08-18 15:50:49 Comment updates.
2020-08-18 15:49:02 Tune and cleanup index.php + qrpicture.js.
2020-08-18 15:46:02 Reformat `index.php`, no code change.
2020-08-18 15:43:01 Standalone worker process + database locking.
2020-08-18 15:42:04 Added missing site files.
2020-08-18 15:38:15 Introduce config.php for site settings.
2020-08-18 15:37:31 Updated README.md
2020-08-18 15:36:44 Updated database schema.
2020-08-18 15:02:40 Allow site access for search engines.
2020-08-13 21:39:01 Minor post-release fixups.
```

## 2020-08-13 21:01:10 Version 1.0.0

```
2020-08-12 10:53:55 Initial commit.
2020-08-13 21:01:10 Reconstructed most of the functionality from backups.
```

[Unreleased]: https://github.com/xyzzy/qrpicture/compare/v1.4.0...HEAD
[Version 1.4.0]: https://github.com/xyzzy/qrpicture/compare/v1.3.0...v1.4.0
[Version 1.3.0]: https://github.com/xyzzy/qrpicture/compare/v1.2.0...v1.3.0
[Version 1.2.0]: https://github.com/xyzzy/qrpicture/compare/v1.1.0...v1.2.0
[Version 1.1.0]: https://github.com/xyzzy/qrpicture/compare/v1.0.0...v1.1.0

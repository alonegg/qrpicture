ACLOCAL_AMFLAGS = -I m4
EXTRA_DIST = \
	LICENSE.txt CHANGELOG.md INSTALL.md README.md \
	.gitignore \
	config.php \
	qrpicture.sql \
	$(SITEFILES) $(SITEFILES_ASSETS) $(SITEFILES_BIN) $(SITEFILES_IMAGES)

SITEFILES = \
	www.qrpicture.com/config.php \
	www.qrpicture.com/index.html \
	www.qrpicture.com/qrcode-mask-93x93.png \
	www.qrpicture.com/qrscq-mask-93x93.png \
	www.qrpicture.com/MooTools-Core-1.6.0.js \
	www.qrpicture.com/MooTools-More-1.6.0.js \
	www.qrpicture.com/qrpicture.css \
	www.qrpicture.com/qrpicture.js \
	www.qrpicture.com/robots.txt \
	www.qrpicture.com/status.php \
	www.qrpicture.com/submit.php \
	www.qrpicture.com/worker.php \
	www.qrpicture.com/worker.sh

SITEFILES_ASSETS = \
	www.qrpicture.com/assets/eVpdGC-186x186.png \
	www.qrpicture.com/assets/favicon-32.png \
	www.qrpicture.com/assets/favicon-152.png \
	www.qrpicture.com/assets/favicon-192.png \
	www.qrpicture.com/assets/index.html \
	www.qrpicture.com/assets/opencollective-icon.svg \
	www.qrpicture.com/assets/outline0-97x97.png \
	www.qrpicture.com/assets/outline1-97x97.png \
	www.qrpicture.com/assets/outline2-97x97.png \
	www.qrpicture.com/assets/outline3-97x97.png \
	www.qrpicture.com/assets/outline4-97x97.png \
	www.qrpicture.com/assets/outline5-97x97.png \
	www.qrpicture.com/assets/p2G4MC-186x186.png \
	www.qrpicture.com/assets/qrAwesome.anim.col.210x210.gif \
	www.qrpicture.com/assets/qrSpiral.anim.col.210x210.gif \
	www.qrpicture.com/assets/qrpicture-420x420.jpg

SITEFILES_BIN = \
	www.qrpicture.com/bin/index.html

SITEFILES_IMAGES = \
	www.qrpicture.com/images/index.html

bin_PROGRAMS = qrwork qrscq

qrwork_SOURCES = qrwork.cc
qrwork_LDADD = -lgd

qrscq_SOURCES = qrscq.cc
qrscq_LDADD = -lgd

install-data-hook:
	install -d $(prefix) $(prefix)/assets $(prefix)/bin
	if test ! -e "$(prefix)/images"; then install -d -m 775 $(prefix)/images; fi
	cd $(top_srcdir); install $(SITEFILES) $(prefix)
	cd $(top_srcdir); install $(SITEFILES_ASSETS) $(prefix)/assets
	cd $(top_srcdir); install $(SITEFILES_BIN) $(prefix)/bin
	cd $(top_srcdir); if test ! -e "$(prefix)/images"; then install $(SITEFILES_IMAGES) $(prefix)/images; fi
	if test ! -e "$(prefix)/config.php"; then install "$(top_srcdir)/config.php" "$(prefix)/config.php"; fi

uninstall-local:
	$(RM) $(addprefix $(prefix)/, $(subst www.qrpicture.com/,,$(SITEFILES)))
	$(RM) $(addprefix $(prefix)/, $(subst www.qrpicture.com/,,$(SITEFILES_ASSETS)))
	$(RM) $(addprefix $(prefix)/, $(subst www.qrpicture.com/,,$(SITEFILES_BIN)))

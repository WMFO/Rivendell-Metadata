#Makefile for Import Logger
#Bash scripts aren't compiled, but used for install
#Suggested usage: git pull
# sudo make install

INSTALLDIR = /srv/www/htdocs/rivendell
OWNER = root:root
MOD = 644
FILES = credentials.php resultstable.php index.php

.PHONY: all install uninstall

all:
	@echo "make: nothing to build for bash scripts"
	@echo "make: suggested usage: sudo make install"

install: $(addprefix $(INSTALLDIR)/, $(FILES))

$(INSTALLDIR)/%.php: %.php
	@mkdir -p $(INSTALLDIR)
	@cp $< $@
	@chown $(OWNER) $@
	@chmod $(MOD) $@

uninstall:
	$(RM) $(INSTALLDIR)/$(FILE)

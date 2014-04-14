# ~/.bashrc: executed by bash(1) for non-login shells.

# Note: PS1 and umask are already set in /etc/profile. You should not
# need this unless you want different defaults for root.
# PS1='${debian_chroot:+($debian_chroot)}\h:\w\$ '
PS1="\u [\w] > "
 umask 022

# You may uncomment the following lines if you want `ls' to be colorized:
 export LS_OPTIONS='--color=auto'
 eval "`dircolors`"
 alias ls='ls $LS_OPTIONS'
 alias ll='ls $LS_OPTIONS -l'
 alias l='ls $LS_OPTIONS -lA'

# Some more alias to avoid making mistakes:
# alias rm='rm -i'
# alias cp='cp -i'
# alias mv='mv -i'
alias ll='ls -alL'
alias la='la -la'
alias vi='vim'
alias backup-manager='backup-manager --no-burn'

echo 'Accès Shell de '`who` 'le ' `date` | mail -s `hostname` Shell Root de `who | cut -d"(" -f2 | cut -d")" -f1` ju.blancher@gmail.com
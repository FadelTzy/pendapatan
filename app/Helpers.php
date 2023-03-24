<?php

if (!function_exists('gettotalvalue')) {
    function gettotalvalue($data)
   {
       $total = 0;
       foreach ($data as $key => $value) {
           $total += $value->nilai;
       }
       return $total;
   }
}

if (!function_exists('getsumofakun')) {
     function getsumofakun($data)
    {
        $total = 0;
        foreach ($data as $key => $value) {
            $total += $value->biaya;
        }
        return $total;
    }
}
if (!function_exists('getsumofsubkom')) {
    function getsumofsubkom($data)
   {
       $total = 0;
       foreach ($data as $key => $value) {
           foreach ($value as $key => $b) {
            $total += $b->biaya;
           }
       }
       return $total;
   }
}

if (!function_exists('getsumofkom')) {
    function getsumofkom($data)
   {
       $total = 0;
       foreach ($data as $key => $value) {
           foreach ($value as $key => $b) {
                foreach ($b as $key => $c) {
                    $total += $c->biaya;
                }
            }
       }
       return $total;
   }
}
if (!function_exists('getsumofro')) {
    function getsumofro($data)
   {
       $total = 0;
       foreach ($data as $key => $value) {
           foreach ($value as $key => $b) {
                foreach ($b as $key => $c) {
                    foreach ($c as $key => $d) {
                        $total += $d->biaya;
                    }
                }
            }
       }
       return $total;
   }
}
if (!function_exists('getsumofkro')) {
    function getsumofkro($data)
   {
       $total = 0;
       foreach ($data as $key => $value) {
           foreach ($value as $key => $b) {
                foreach ($b as $key => $c) {
                    foreach ($c as $key => $d) {
                        foreach ($d as $key => $e) {
                            $total += $e->biaya;
                        }
                    }
                }
            }
       }
       return $total;
   }
}
if (!function_exists('getsumofkeg')) {
    function getsumofkeg($data)
   {

       $total = 0;
       foreach ($data as $key => $value) {
           foreach ($value as $key => $b) {
                foreach ($b as $key => $c) {
                    foreach ($c as $key => $d) {
                        foreach ($d as $key => $e) {
                            foreach ($e as $key => $f) {
                                $total += $f->biaya;
                            }
                        }
                    }
                }
            }
       }
       return $total;
   }
}

//sisa
if (!function_exists('getsumofsisaakun')) {
    function getsumofsisaakun($data)
   {
       $total = 0;
       foreach ($data as $key => $value) {
           $total += $value->sisabiaya;
       }
       return $total;
   }
}
if (!function_exists('getsumofsisasubkom')) {
   function getsumofsisasubkom($data)
  {
      $total = 0;
      foreach ($data as $key => $value) {
          foreach ($value as $key => $b) {
           $total += $b->sisabiaya;
          }
      }
      return $total;
  }
}

if (!function_exists('getsumofsisakom')) {
   function getsumofsisakom($data)
  {
      $total = 0;
      foreach ($data as $key => $value) {
          foreach ($value as $key => $b) {
               foreach ($b as $key => $c) {
                   $total += $c->sisabiaya;
               }
           }
      }
      return $total;
  }
}
if (!function_exists('getsumofsisaro')) {
   function getsumofsisaro($data)
  {
      $total = 0;
      foreach ($data as $key => $value) {
          foreach ($value as $key => $b) {
               foreach ($b as $key => $c) {
                   foreach ($c as $key => $d) {
                       $total += $d->sisabiaya;
                   }
               }
           }
      }
      return $total;
  }
}
if (!function_exists('getsumofsisakro')) {
   function getsumofsisakro($data)
  {
      $total = 0;
      foreach ($data as $key => $value) {
          foreach ($value as $key => $b) {
               foreach ($b as $key => $c) {
                   foreach ($c as $key => $d) {
                       foreach ($d as $key => $e) {
                           $total += $e->sisabiaya;
                       }
                   }
               }
           }
      }
      return $total;
  }
}
if (!function_exists('getsumofsisakeg')) {
   function getsumofsisakeg($data)
  {

      $total = 0;
      foreach ($data as $key => $value) {
          foreach ($value as $key => $b) {
               foreach ($b as $key => $c) {
                   foreach ($c as $key => $d) {
                       foreach ($d as $key => $e) {
                           foreach ($e as $key => $f) {
                               $total += $f->sisabiaya;
                           }
                       }
                   }
               }
           }
      }
      return $total;
  }
}

//lalu
if (!function_exists('getsumofspplaluakun')) {
    function getsumofspplaluakun($data)
   {
       $total = 0;
       foreach ($data as $key => $value) {
           $total += $value->spplalu;
       }
       return $total;
   }
}
if (!function_exists('getsumofspplalusubkom')) {
   function getsumofspplalusubkom($data)
  {
      $total = 0;
      foreach ($data as $key => $value) {
          foreach ($value as $key => $b) {
           $total += $b->spplalu;
          }
      }
      return $total;
  }
}

if (!function_exists('getsumofspplalukom')) {
   function getsumofspplalukom($data)
  {
      $total = 0;
      foreach ($data as $key => $value) {
          foreach ($value as $key => $b) {
               foreach ($b as $key => $c) {
                   $total += $c->spplalu;
               }
           }
      }
      return $total;
  }
}
if (!function_exists('getsumofspplaluro')) {
   function getsumofspplaluro($data)
  {
      $total = 0;
      foreach ($data as $key => $value) {
          foreach ($value as $key => $b) {
               foreach ($b as $key => $c) {
                   foreach ($c as $key => $d) {
                       $total += $d->spplalu;
                   }
               }
           }
      }
      return $total;
  }
}
if (!function_exists('getsumofspplalukro')) {
   function getsumofspplalukro($data)
  {
      $total = 0;
      foreach ($data as $key => $value) {
          foreach ($value as $key => $b) {
               foreach ($b as $key => $c) {
                   foreach ($c as $key => $d) {
                       foreach ($d as $key => $e) {
                           $total += $e->spplalu;
                       }
                   }
               }
           }
      }
      return $total;
  }
}
if (!function_exists('getsumofspplalukeg')) {
   function getsumofspplalukeg($data)
  {

      $total = 0;
      foreach ($data as $key => $value) {
          foreach ($value as $key => $b) {
               foreach ($b as $key => $c) {
                   foreach ($c as $key => $d) {
                       foreach ($d as $key => $e) {
                           foreach ($e as $key => $f) {
                               $total += $f->spplalu;
                           }
                       }
                   }
               }
           }
      }
      return $total;
  }
}


//ini
if (!function_exists('getsumofsppiniakun')) {
    function getsumofsppiniakun($data)
   {
       $total = 0;
       foreach ($data as $key => $value) {
           $total += $value->sppini;
       }
       return $total;
   }
}
if (!function_exists('getsumofsppinisubkom')) {
   function getsumofsppinisubkom($data)
  {
      $total = 0;
      foreach ($data as $key => $value) {
          foreach ($value as $key => $b) {
           $total += $b->sppini;
          }
      }
      return $total;
  }
}

if (!function_exists('getsumofsppinikom')) {
   function getsumofsppinikom($data)
  {
      $total = 0;
      foreach ($data as $key => $value) {
          foreach ($value as $key => $b) {
               foreach ($b as $key => $c) {
                   $total += $c->sppini;
               }
           }
      }
      return $total;
  }
}
if (!function_exists('getsumofsppiniro')) {
   function getsumofsppiniro($data)
  {
      $total = 0;
      foreach ($data as $key => $value) {
          foreach ($value as $key => $b) {
               foreach ($b as $key => $c) {
                   foreach ($c as $key => $d) {
                       $total += $d->sppini;
                   }
               }
           }
      }
      return $total;
  }
}
if (!function_exists('getsumofsppinikro')) {
   function getsumofsppinikro($data)
  {
      $total = 0;
      foreach ($data as $key => $value) {
          foreach ($value as $key => $b) {
               foreach ($b as $key => $c) {
                   foreach ($c as $key => $d) {
                       foreach ($d as $key => $e) {
                           $total += $e->sppini;
                       }
                   }
               }
           }
      }
      return $total;
  }
}
if (!function_exists('getsumofsppinikeg')) {
   function getsumofsppinikeg($data)
  {

      $total = 0;
      foreach ($data as $key => $value) {
          foreach ($value as $key => $b) {
               foreach ($b as $key => $c) {
                   foreach ($c as $key => $d) {
                       foreach ($d as $key => $e) {
                           foreach ($e as $key => $f) {
                               $total += $f->sppini;
                           }
                       }
                   }
               }
           }
      }
      return $total;
  }
}